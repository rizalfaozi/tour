<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateschedulesRequest;
use App\Http\Requests\UpdateschedulesRequest;
use App\Repositories\schedulesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Criteria\schedulesCriteria;
use Response;
use DB;
class schedulesController extends AppBaseController
{
    /** @var  schedulesRepository */
    private $schedulesRepository;

    public function __construct(schedulesRepository $schedulesRepo)
    {
        $this->schedulesRepository = $schedulesRepo;
    }

    /**
     * Display a listing of the schedules.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->schedulesRepository->pushCriteria(new schedulesCriteria($request));
        $schedules = $this->schedulesRepository->all();

        return view('schedules.index')
            ->with('schedules', $schedules);
    }


     public function alumnus(Request $request)
    {
       
       $members = DB::table('schedules as a')
       ->join('members as b','a.member_id','=','b.id')
       ->join('users as c','b.user_id','=','c.id')
       ->select('a.id','b.id as member_id','b.age','b.id_card','b.phone','b.first_name','b.last_name','a.departure_date','a.status','a.invoice_id','c.name as agen','c.office_name')
        ->where('a.type','alumni')
       ->get();
         

        return view('members.alumnus')
            ->with('members', $members);
    }

      public function pindah_alumni($member_id,Request $request)
    {
       DB::table('members')->where('id',$member_id)->update(['type'=>'alumni']);
       DB::table('schedules')->where('member_id',$member_id)->update(['type'=>'alumni']);
        $members = DB::table('schedules as a')
       ->join('members as b','a.member_id','=','b.id')
       ->join('users as c','b.user_id','=','c.id')
       ->select('a.id','b.id as member_id','b.age','b.id_card','b.phone','b.first_name','b.last_name','a.departure_date','a.status','a.invoice_id','c.name as agen','c.office_name')
        ->where('a.type','alumni')
       ->get();
           
         Flash::success("Jama'ah Berhasil Diupdate Menjadi Alumni");   

        // return view('members.alumnus')
        //     ->with('members', $members);

          return redirect(url('schedules'));
    }


      public function pindah_jamaah($member_id,Request $request)
    {
       DB::table('members')->where('id',$member_id)->update(['type'=>'jamaah']);
       DB::table('schedules')->where('member_id',$member_id)->update(['type'=>'jamaah']);
       
        $members = DB::table('schedules as a')
       ->join('members as b','a.member_id','=','b.id')
       ->join('users as c','b.user_id','=','c.id')
       ->select('a.id','b.id as member_id','b.age','b.id_card','b.phone','b.first_name','b.last_name','a.departure_date','a.status','a.invoice_id','c.name as agen','c.office_name')
        ->where('a.type','alumni')
       ->get();
           
         Flash::success("Alumni Berhasil Diupdate Menjadi Jama'ah");   

       //  // return view('members.alumnus')
       //  //     ->with('members', $members);

         return redirect(url('alumnus'));
    }

    /**
     * Show the form for creating a new schedules.
     *
     * @return Response
     */
    public function create()
    {
        $members = DB::table('invoices_details as a')
        ->select('b.id','b.first_name','b.last_name')
        ->join('members as b','a.member_id','=','b.id')
        ->where('a.status',0)
        ->get();

        return view('schedules.create')->with(['members'=>$members]);
       
    }

    /**
     * Store a newly created schedules in storage.
     *
     * @param CreateschedulesRequest $request
     *
     * @return Response
     */
    public function store(CreateschedulesRequest $request)
    {
        $input = $request->all();
        $input['type'] = 'jamaah';
        $schedules = $this->schedulesRepository->create($input);

        Flash::success('Schedules saved successfully.');

        return redirect(route('schedules.index'));
    }

    /**
     * Display the specified schedules.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $schedules = $this->schedulesRepository->findWithoutFail($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        return view('schedules.show')->with('schedules', $schedules);
    }

    /**
     * Show the form for editing the specified schedules.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $schedules = $this->schedulesRepository->findWithoutFail($id);
         $members = DB::table('invoices_details as a')
        ->select('b.id','b.first_name','b.last_name')
        ->join('members as b','a.member_id','=','b.id')
        ->where('a.status',0)
        ->get();
        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        return view('schedules.edit')->with(['schedules'=> $schedules,'members'=>$members]);
    }

    /**
     * Update the specified schedules in storage.
     *
     * @param  int              $id
     * @param UpdateschedulesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateschedulesRequest $request)
    {
        $schedules = $this->schedulesRepository->findWithoutFail($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        $schedules = $this->schedulesRepository->update($request->all(), $id);

        Flash::success('Schedules updated successfully.');

        return redirect(route('schedules.index'));
    }

    /**
     * Remove the specified schedules from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $schedules = $this->schedulesRepository->findWithoutFail($id);

        if (empty($schedules)) {
            Flash::error('Schedules not found');

            return redirect(route('schedules.index'));
        }

        $this->schedulesRepository->delete($id);

        Flash::success('Schedules deleted successfully.');

        return redirect(route('schedules.index'));
    }

    public function reqinvoices(Request $request){

    if($request->member_id =="0")
    {
       $members = [];
    }else{    
       $members = DB::table('invoices_details as a')
        ->select('a.invoice_number','a.category_id','c.name','c.departure_date')
        ->join('members as b','a.member_id','=','b.id')
        ->join('categories as c','a.category_id','=','c.id')
        ->where('a.member_id',$request->member_id)
        ->get();
    }    
       return $members;
    }
}
