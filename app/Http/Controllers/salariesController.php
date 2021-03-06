<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesalariesRequest;
use App\Http\Requests\UpdatesalariesRequest;
use App\Repositories\salariesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\models\salaries;
use App\User;
use App\Models\members;
use App\Models\invoices;
use App\Models\histories;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class salariesController extends AppBaseController
{
    /** @var  salariesRepository */
    private $salariesRepository;

    public function __construct(salariesRepository $salariesRepo)
    {
        $this->salariesRepository = $salariesRepo;
    }

    /**
     * Display a listing of the salaries.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salariesRepository->pushCriteria(new RequestCriteria($request));
        $salaries = $this->salariesRepository->all();

        return view('salaries.index')
            ->with('salaries', $salaries);
    }

    /**
     * Show the form for creating a new salaries.
     *
     * @return Response
     */

    public function create()
    {
        
        $agents = User::select('id','name','type')->where('type','!=','admin')->OrderBy('id','desc')->get();
        return view('salaries.create')->with('agents',$agents);
    }

    /**
     * Store a newly created salaries in storage.
     *
     * @param CreatesalariesRequest $request
     *
     * @return Response
     */
    public function store(CreatesalariesRequest $request)
    {
        $input = $request->all();

        $salaries = $this->salariesRepository->create($input);

        Flash::success('Salaries saved successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Display the specified salaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.show')->with('salaries', $salaries);
    }

    /**
     * Show the form for editing the specified salaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);
        $agents = User::select('id','name','type')->where('type','!=','admin')->OrderBy('id','desc')->get();
        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.edit')->with(['salaries'=>$salaries,'agents'=>$agents]);
    }

    /**
     * Update the specified salaries in storage.
     *
     * @param  int              $id
     * @param UpdatesalariesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalariesRequest $request)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        $salaries = $this->salariesRepository->update($request->all(), $id);

        Flash::success('Salaries updated successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Remove the specified salaries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        $this->salariesRepository->delete($id);

        Flash::success('Salaries deleted successfully.');

        return redirect(route('salaries.index'));
    }



    public function closing(Request $request)
    {

      $closing = invoices::where(['user_id'=>$request->id,'type'=>'lunas'])->count();
      return $closing;
    }


    public function withdraw(Request $request){
        $user = Auth::user();
        $message = "<span style='text-transform:capitalize;'>$user->type <b>$user->name</b></span> meminta gaji dan komisi segera diproses"; 
        $closing = histories::create(['user_id'=>$user->id,'message'=>$message]);
         $update = salaries::where(['user_id'=>$user->id])->update(['status'=>1]);
      
        Flash::success('Withdraw anda segera akan kami proses 1x24 jam. mohon bersabar');

        return redirect(url('histories'));
    }


     public function verifikasi($user_id,$id,Request $request)
    {
         $user = User::where('id',$user_id)->select('name','type')->first();

         $message = "<span style='text-transform:capitalize;'>$user->type <b>$user->name</b></span> withdraw anda sudah kami proses segera check rekening anda"; 
     

       $closing = histories::create(['user_id'=>$user_id,'message'=>$message]);

      $verifikasi = salaries::where(['user_id'=>$user_id,'id'=>$id])->update(['status'=>2]);
       Flash::success('Withdraw anda sudah kami proses segera check rekening anda');

       return redirect(url('histories'));
    }
}
