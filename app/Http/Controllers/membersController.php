<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemembersRequest;
use App\Http\Requests\UpdatemembersRequest;
use App\Repositories\membersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\members;
use App\Criteria\membersCriteria;
use Response;
use File;
use Auth;
use DB;


class membersController extends AppBaseController
{
    /** @var  memberRepository */
    private $membersRepository;

    public function __construct(membersRepository $membersRepo)
    {
        $this->membersRepository = $membersRepo;
    }

    /**
     * Display a listing of the members.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->membersRepository->pushCriteria(new membersCriteria($request));
        $members = $this->membersRepository->all();
       
        return view('members.index')
            ->with('members', $members);
    }

    /**
     * Show the form for creating a new members.
     *
     * @return Response
     */
    public function create()
    {

        $provinsi = DB::table('provinces')->get();
        return view('members.create')->with('provinsi', $provinsi);
    }

    /**
     * Store a newly created members in storage.
     *
     * @param CreatememberRequest $request
     *
     * @return Response
     */
    public function store(CreatemembersRequest $request)
    {

        $input = $request->all();

        if($request->photo=='') 
        {
            $input['photo'] = '';      
        }else{
           
          $date = date("Y-m-d");
          $time = date("H:i:s");   
          $fileFormat = ".jpg";
          
          $dates = explode('-',$date);
          $times = explode(':',$time);
          $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];
          $fullPath = "files/photo/".$fileName.$fileFormat;

            File::makeDirectory($request->photo, 0777, true, true);

            $img = Image::make($request->photo)->save($fullPath, 60);
            $input['photo'] = $fullPath;             
        }

        $input['user_id'] = Auth::user()->id;  
        $input['type'] = 'jamaah';  
        $input['status'] = 1;  
   

        $members = $this->membersRepository->create($input);

        Flash::success('Members saved successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Display the specified members.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('members', $members);
    }

    /**
     * Show the form for editing the specified members.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);
          $provinsi = DB::table('provinces')->get();
        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        return view('members.edit')->with(['members'=>$members,'provinsi'=>$provinsi]);
    }

    /**
     * Update the specified members in storage.
     *
     * @param  int              $id
     * @param UpdatememberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemembersRequest $request)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

         $input['first_name'] = $request->first_name;
         $input['last_name'] = $request->last_name;
         $input['age'] = $request->age;
         $input['phone'] = $request->phone;
         $input['alternative_phone'] = $request->alternative_phone;
         $input['address'] = $request->address;
         $input['id_card'] = $request->id_card;
         $input['bank_account_number'] = $request->bank_account_number;
         $input['passport_number'] = $request->passport_number;
         $input['visa_number'] = $request->visa_number;
         $input['gender'] = $request->gender;
         $input['province_id'] = $request->province_id;
         $input['district_id'] = $request->district_id;
         $input['subdistrict_id'] = $request->subdistrict_id;
         $input['village_id'] = $request->village_id;

         if($members->photo !='') 
        {
                    
            unlink($members->photo);   

        }

          
            
          $date = date("Y-m-d");
          $time = date("H:i:s");   
          $fileFormat = ".jpg";
          
          $dates = explode('-',$date);
          $times = explode(':',$time);
          $fileName = $dates[0].$dates[1].$dates[2].$times[0].$times[1].$times[2];
          $fullPath = "files/photo/".$fileName.$fileFormat;

            File::makeDirectory($request->photo, 0777, true, true);

            $img = Image::make($request->photo)->save($fullPath, 60);
            $input['photo'] = $fullPath;
             
                     
        
         $input['status'] = $request->status;
        $members = $this->membersRepository->update($input, $id);

        Flash::success('Members updated successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified members from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);
        if($members->photo !="")
        {
           unlink($members->photo);  
        }    
        
        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        $this->membersRepository->delete($id);

        Flash::success('Members deleted successfully.');

        return redirect(route('members.index'));
    }


      public function kabupaten(request $request){

       $kabupaten = DB::table('districts')->where('province_id',$request->id)->get();
       return $kabupaten;

    }


     public function kecamatan(request $request){

       $kecamatan = DB::table('subdistricts')->where('district_id',$request->id)->get();
       return $kecamatan;

    }


      public function kelurahan(request $request){

       $kelurahan = DB::table('villages')->where('subdistrict_id',$request->id)->get();
       return $kelurahan;

       }


}
