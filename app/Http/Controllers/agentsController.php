<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateagentsRequest;
use App\Http\Requests\UpdateagentsRequest;
use App\Repositories\agentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Criteria\agentsCriteria;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class agentsController extends AppBaseController
{
    /** @var  agentsRepository */
    private $agentsRepository;

    public function __construct(agentsRepository $agentsRepo)
    {
        $this->agentsRepository = $agentsRepo;
    }

    /**
     * Display a listing of the agents.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $type = $request->get('type'); 
        $this->agentsRepository->pushCriteria(new agentsCriteria($type));
        $agents = $this->agentsRepository->all();

        return view('agents.index')
            ->with(['agents'=> $agents,'type'=>$type]);
    }

    /**
     * Show the form for creating a new agents.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $type = $request->get('type'); 
        return view('agents.create')->with('type',$type);
    }

    /**
     * Store a newly created agents in storage.
     *
     * @param CreateagentsRequest $request
     *
     * @return Response
     */
    public function store(CreateagentsRequest $request)
    {
        $type = $request->get('type');  
        // $input = $request->all();
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['gender'] = $request->gender;
        $input['role_id'] = 3;
        $input['type'] = $type;
        $input['phone'] = $request->phone;
        $input['address'] = $request->address;


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


       
        $input['password'] = bcrypt($request->pasword);
        $input['status'] = $request->status;

        $agents = $this->agentsRepository->create($input);

        Flash::success('Agents saved successfully.');

        return redirect(url('agents?type='.$type));
       
    }

    /**
     * Display the specified agents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id,Request $request)
    {
        $agents = $this->agentsRepository->findWithoutFail($id);
        $type = $request->get('type');
        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        return view('agents.show')->with(['agents'=> $agents,'type'=>$type]);
    }

    /**
     * Show the form for editing the specified agents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id,Request $request)
    {
        $type = $request->get('type'); 
        $agents = $this->agentsRepository->findWithoutFail($id);

        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(url('agents?type'.$type));
        }

        return view('agents.edit')->with(['agents'=> $agents,'type'=>$type]);
    }

    /**
     * Update the specified agents in storage.
     *
     * @param  int              $id
     * @param UpdateagentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateagentsRequest $request)
    {
        $agents = $this->agentsRepository->findWithoutFail($id);

        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['gender'] = $request->gender;
        $input['role_id'] = 3;
        $input['type'] = $agents->type;
        $input['phone'] = $request->phone;
        $input['address'] = $request->address;


         if($agents->photo!='') 
        {
                    
          unlink($agents->photo);
           
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
          $agents = $this->agentsRepository->update($input, $id);
        
          Flash::success('Agents updated successfully.');

        return redirect(url('agents?type='.$agents->type));
    }

    /**
     * Remove the specified agents from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agents = $this->agentsRepository->findWithoutFail($id);
        if($agents->photo !="")
        {
               unlink($agents->photo);    
        }    
   
        if (empty($agents)) {
            Flash::error('Agents not found');

            return redirect(route('agents.index'));
        }

        $this->agentsRepository->delete($id);

        Flash::success('Agents deleted successfully.');

        return redirect(url('agents?type='.$agents->type));
    }
}
