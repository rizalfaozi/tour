<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprovincesRequest;
use App\Http\Requests\UpdateprovincesRequest;
use App\Repositories\provincesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class provincesController extends AppBaseController
{
    /** @var  provincesRepository */
    private $provincesRepository;

    public function __construct(provincesRepository $provincesRepo)
    {
        $this->provincesRepository = $provincesRepo;
    }

    /**
     * Display a listing of the provinces.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provincesRepository->pushCriteria(new RequestCriteria($request));
        $provinces = $this->provincesRepository->all();

        return view('provinces.index')
            ->with('provinces', $provinces);
    }

    /**
     * Show the form for creating a new provinces.
     *
     * @return Response
     */
    public function create()
    {
        return view('provinces.create');
    }

    /**
     * Store a newly created provinces in storage.
     *
     * @param CreateprovincesRequest $request
     *
     * @return Response
     */
    public function store(CreateprovincesRequest $request)
    {
        $input = $request->all();

        $provinces = $this->provincesRepository->create($input);

        Flash::success('Provinces saved successfully.');

        return redirect(route('provinces.index'));
    }

    /**
     * Display the specified provinces.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            Flash::error('Provinces not found');

            return redirect(route('provinces.index'));
        }

        return view('provinces.show')->with('provinces', $provinces);
    }

    /**
     * Show the form for editing the specified provinces.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            Flash::error('Provinces not found');

            return redirect(route('provinces.index'));
        }

        return view('provinces.edit')->with('provinces', $provinces);
    }

    /**
     * Update the specified provinces in storage.
     *
     * @param  int              $id
     * @param UpdateprovincesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprovincesRequest $request)
    {
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            Flash::error('Provinces not found');

            return redirect(route('provinces.index'));
        }

        $provinces = $this->provincesRepository->update($request->all(), $id);

        Flash::success('Provinces updated successfully.');

        return redirect(route('provinces.index'));
    }

    /**
     * Remove the specified provinces from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            Flash::error('Provinces not found');

            return redirect(route('provinces.index'));
        }

        $this->provincesRepository->delete($id);

        Flash::success('Provinces deleted successfully.');

        return redirect(route('provinces.index'));
    }
}
