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
use DB;

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
        $tgl_skr = date('Ymd');
       
        $cek_kode = DB::table('invoices')
        ->select('invoice_number')
        ->where('invoice_number','like',''.$tgl_skr.'%')->get();
        if(empty($cek_kode->invoice_number))
        {

            $max = DB::table('invoices')->max('invoice_number');
            if($max ==null)
            {
                $invoice_code = $tgl_skr.'001';
            }else{
                $invoice_code = $max+1;
            }    
            
        }    

       
        
        $categories = categories::select('id','name')->where('status','1')->orderBy('id','desc')->get();

        $members = members::select('id','first_name','last_name')
        ->orderBy('id','desc')
        ->where('type','jamaah')
        ->get();
        return view('invoices.create')->with(['categories'=>$categories,'members'=> $members,'invoice_number'=>$invoice_code]);
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
        $input['invoice_number'] = $request->invoice_number;
        $input['member_id'] = $request->member_id;
        $input['user_id'] = $request->user_id;
        $input['category_id'] = $request->category_id;
        $input['price'] = $request->price;
        $input['total'] = $request->total;  
        $input['type'] = $request->type; 
        $input['status'] = $request->status; 

        if($request->bank =="")
        {
          $input['bank'] = "null";
        }else{
            $input['bank'] = $request->bank;  
        }
       
        if($request->account_number =="")
        {
          $input['account_number'] = "null";
        }else{
           $input['account_number'] = $request->account_number;   
        }

        if($request->account_name =="")
        {
          $input['account_name'] = "null";
        }else{
           $input['account_name'] = $request->account_name;   
        }  
        
        
        $input['payment'] = $request->payment; 

        $invoices = $this->invoicesRepository->create($input);

        if($request->type =="lunas")
        {
            DB::table('invoices_details')->insert(['invoice_number'=>$request->invoice_number,'member_id'=>$request->member_id,'total'=>$request->total,'category_id'=>$request->category_id,'status'=>0,'created_at'=>date("Y-m-d H:i:s")]);
        }    

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

         if($invoices->type =="lunas")
         {
            DB::table('invoices_details')->where('invoice_number',$invoices->invoice_number)->delete();
            DB::table('members')->where('id',$invoices->member_id)->update(['type'=>'jamaah']);
         } 



        Flash::success('Invoices deleted successfully.');

        return redirect(route('invoices.index'));
    }

    public function paket(request $request){
        if($request->id =="")
        {
           $total = 0;

        }else{
           $total = categories::where('id',$request->id)->first()->price;  
        }    
     
      return $total;
    }

    public function user(request $request){
      $user = members::where('id',$request->id)->first()->user_id;
      return $user;
    }
}
