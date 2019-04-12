<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedistrictsRequest;
use App\Http\Requests\UpdatedistrictsRequest;
use App\Repositories\districtsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\models\provinces;

class districtsController extends AppBaseController
{
    /** @var  districtsRepository */
    private $districtsRepository;

    public function __construct(districtsRepository $districtsRepo)
    {
        $this->districtsRepository = $districtsRepo;
    }

    /**
     * Display a listing of the districts.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->districtsRepository->pushCriteria(new RequestCriteria($request));
        $districts = $this->districtsRepository->all();

        return view('districts.index')
            ->with('districts', $districts);
    }

    /**
     * Show the form for creating a new districts.
     *
     * @return Response
     */
    public function create()
    {
        $provinces = provinces::orderBy('id','desc')->get();
        return view('districts.create')->with(['provinces'=>$provinces]);
    }

    /**
     * Store a newly created districts in storage.
     *
     * @param CreatedistrictsRequest $request
     *
     * @return Response
     */
    public function store(CreatedistrictsRequest $request)
    {
        $input = $request->all();

        $districts = $this->districtsRepository->create($input);

        Flash::success('Districts saved successfully.');

        return redirect(route('districts.index'));
    }

    /**
     * Display the specified districts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $districts = $this->districtsRepository->findWithoutFail($id);
        $provinces = provinces::orderBy('id','desc')->get();
        if (empty($districts)) {
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        return view('districts.show')->with(['districts'=> $districts,'provinces'=>$provinces]);
    }

    /**
     * Show the form for editing the specified districts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $districts = $this->districtsRepository->findWithoutFail($id);
        $provinces = provinces::orderBy('id','desc')->get();
        if (empty($districts)) {
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        return view('districts.edit')->with(['districts'=> $districts,'provinces'=>$provinces]);
    }

    /**
     * Update the specified districts in storage.
     *
     * @param  int              $id
     * @param UpdatedistrictsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedistrictsRequest $request)
    {
        $districts = $this->districtsRepository->findWithoutFail($id);

        if (empty($districts)) {
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        $districts = $this->districtsRepository->update($request->all(), $id);

        Flash::success('Districts updated successfully.');

        return redirect(route('districts.index'));
    }

    /**
     * Remove the specified districts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $districts = $this->districtsRepository->findWithoutFail($id);

        if (empty($districts)) {
            Flash::error('Districts not found');

            return redirect(route('districts.index'));
        }

        $this->districtsRepository->delete($id);

        Flash::success('Districts deleted successfully.');

        return redirect(route('districts.index'));
    }
}
