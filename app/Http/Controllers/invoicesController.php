<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinvoicesRequest;
use App\Http\Requests\UpdateinvoicesRequest;
use App\Repositories\invoicesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\categories;
use App\Models\members;


class invoicesController extends AppBaseController
{
    /** @var  invoicesRepository */
    private $invoicesRepository;

    public function __construct(invoicesRepository $invoicesRepo)
    {
        $this->invoicesRepository = $invoicesRepo;
    }

    /**
     * Display a listing of the invoices.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->invoicesRepository->pushCriteria(new RequestCriteria($request));
        $invoices = $this->invoicesRepository->all();

        return view('invoices.index')
            ->with('invoices', $invoices);
    }

    /**
     * Show the form for creating a new invoices.
     *
     * @return Response
     */
    public function create()
    {
        $categories = categories::select('id','name')->where('status','1')->orderBy('id','desc')->get();

        $members = members::select('id','first_name','last_name')->orderBy('id','desc')->get();
        return view('invoices.create')->with(['categories'=>$categories,'members'=> $members]);
    }

    /**
     * Store a newly created invoices in storage.
     *
     * @param CreateinvoicesRequest $request
     *
     * @return Response
     */
    public function store(CreateinvoicesRequest $request)
    {
        $input['member_id'] = $request->member_id;
        $input['user_id'] = $request->user_id;
        $input['category_id'] = $request->category_id;
        $input['price'] = $request->price;
        $input['total'] = $request->total;  
        $input['type'] = $request->type; 
        $input['status'] = $request->status; 

        $invoices = $this->invoicesRepository->create($input);

        Flash::success('Invoices saved successfully.');

        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified invoices.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoices = $this->invoicesRepository->findWithoutFail($id);

        if (empty($invoices)) {
            Flash::error('Invoices not found');

            return redirect(route('invoices.index'));
        }

        return view('invoices.show')->with('invoices', $invoices);
    }

    /**
     * Show the form for editing the specified invoices.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoices = $this->invoicesRepository->findWithoutFail($id);
         $categories = categories::select('id','name')->where('status','1')->orderBy('id','desc')->get();

        $members = members::select('id','first_name','last_name')->orderBy('id','desc')->get();
        if (empty($invoices)) {
            Flash::error('Invoices not found');

            return redirect(route('invoices.index'));
        }

        return view('invoices.edit')->with(['invoices'=> $invoices,'categories'=>$categories,'members'=>$members]);
    }

    /**
     * Update the specified invoices in storage.
     *
     * @param  int              $id
     * @param UpdateinvoicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinvoicesRequest $request)
    {
        $invoices = $this->invoicesRepository->findWithoutFail($id);

        if (empty($invoices)) {
            Flash::error('Invoices not found');

            return redirect(route('invoices.index'));
        }

        $invoices = $this->invoicesRepository->update($request->all(), $id);

        Flash::success('Invoices updated successfully.');

        return redirect(route('invoices.index'));
    }

    /**
     * Remove the specified invoices from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoices = $this->invoicesRepository->findWithoutFail($id);

        if (empty($invoices)) {
            Flash::error('Invoices not found');

            return redirect(route('invoices.index'));
        }

        $this->invoicesRepository->delete($id);

        Flash::success('Invoices deleted successfully.');

        return redirect(route('invoices.index'));
    }

    public function paket(request $request){
      $total = categories::where('id',$request->id)->first()->price;
      return $total;
    }

    public function user(request $request){
      $user = members::where('id',$request->id)->first()->user_id;
      return $user;
    }
}
