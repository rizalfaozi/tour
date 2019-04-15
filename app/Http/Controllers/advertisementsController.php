<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateadvertisementsRequest;
use App\Http\Requests\UpdateadvertisementsRequest;
use App\Repositories\advertisementsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Intervention\Image\ImageManagerStatic as Image;
use File;
class advertisementsController extends AppBaseController
{
    /** @var  advertisementsRepository */
    private $advertisementsRepository;

    public function __construct(advertisementsRepository $advertisementsRepo)
    {
        $this->advertisementsRepository = $advertisementsRepo;
    }

    /**
     * Display a listing of the advertisements.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->advertisementsRepository->pushCriteria(new RequestCriteria($request));
        $advertisements = $this->advertisementsRepository->all();

        return view('advertisements.index')
            ->with('advertisements', $advertisements);
    }

    /**
     * Show the form for creating a new advertisements.
     *
     * @return Response
     */
    public function create()
    {
        return view('advertisements.create');
    }

    /**
     * Store a newly created advertisements in storage.
     *
     * @param CreateadvertisementsRequest $request
     *
     * @return Response
     */
    public function store(CreateadvertisementsRequest $request)
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

        $advertisements = $this->advertisementsRepository->create($input);

        Flash::success('Advertisements saved successfully.');

        return redirect(route('advertisements.index'));
    }

    /**
     * Display the specified advertisements.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $advertisements = $this->advertisementsRepository->findWithoutFail($id);

        if (empty($advertisements)) {
            Flash::error('Advertisements not found');

            return redirect(route('advertisements.index'));
        }

        return view('advertisements.show')->with('advertisements', $advertisements);
    }

    /**
     * Show the form for editing the specified advertisements.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $advertisements = $this->advertisementsRepository->findWithoutFail($id);

        if (empty($advertisements)) {
            Flash::error('Advertisements not found');

            return redirect(route('advertisements.index'));
        }

        return view('advertisements.edit')->with('advertisements', $advertisements);
    }

    /**
     * Update the specified advertisements in storage.
     *
     * @param  int              $id
     * @param UpdateadvertisementsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateadvertisementsRequest $request)
    {
        $advertisements = $this->advertisementsRepository->findWithoutFail($id);

        if (empty($advertisements)) {
            Flash::error('Advertisements not found');

            return redirect(route('advertisements.index'));
        }

         $input['title'] = $request->title;
         $input['date_start'] = $request->date_start;
         $input['finish_date'] = $request->finish_date;  
        
        if($advertisements->photo !='') 
        {
                    
            unlink($advertisements->photo);   

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

        $advertisements = $this->advertisementsRepository->update($input, $id);

        Flash::success('Advertisements updated successfully.');

        return redirect(route('advertisements.index'));
    }

    /**
     * Remove the specified advertisements from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $advertisements = $this->advertisementsRepository->findWithoutFail($id);

        if (empty($advertisements)) {
            Flash::error('Advertisements not found');

            return redirect(route('advertisements.index'));
        }

         if($advertisements->photo !="")
        {
           unlink($advertisements->photo);  
        } 

        $this->advertisementsRepository->delete($id);

        Flash::success('Advertisements deleted successfully.');

        return redirect(route('advertisements.index'));
    }
}
