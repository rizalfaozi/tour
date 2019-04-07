<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevillagesRequest;
use App\Http\Requests\UpdatevillagesRequest;
use App\Repositories\villagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class villagesController extends AppBaseController
{
    /** @var  villagesRepository */
    private $villagesRepository;

    public function __construct(villagesRepository $villagesRepo)
    {
        $this->villagesRepository = $villagesRepo;
    }

    /**
     * Display a listing of the villages.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->villagesRepository->pushCriteria(new RequestCriteria($request));
        $villages = $this->villagesRepository->all();

        return view('villages.index')
            ->with('villages', $villages);
    }

    /**
     * Show the form for creating a new villages.
     *
     * @return Response
     */
    public function create()
    {
        return view('villages.create');
    }

    /**
     * Store a newly created villages in storage.
     *
     * @param CreatevillagesRequest $request
     *
     * @return Response
     */
    public function store(CreatevillagesRequest $request)
    {
        $input = $request->all();

        $villages = $this->villagesRepository->create($input);

        Flash::success('Villages saved successfully.');

        return redirect(route('villages.index'));
    }

    /**
     * Display the specified villages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            Flash::error('Villages not found');

            return redirect(route('villages.index'));
        }

        return view('villages.show')->with('villages', $villages);
    }

    /**
     * Show the form for editing the specified villages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            Flash::error('Villages not found');

            return redirect(route('villages.index'));
        }

        return view('villages.edit')->with('villages', $villages);
    }

    /**
     * Update the specified villages in storage.
     *
     * @param  int              $id
     * @param UpdatevillagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevillagesRequest $request)
    {
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            Flash::error('Villages not found');

            return redirect(route('villages.index'));
        }

        $villages = $this->villagesRepository->update($request->all(), $id);

        Flash::success('Villages updated successfully.');

        return redirect(route('villages.index'));
    }

    /**
     * Remove the specified villages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            Flash::error('Villages not found');

            return redirect(route('villages.index'));
        }

        $this->villagesRepository->delete($id);

        Flash::success('Villages deleted successfully.');

        return redirect(route('villages.index'));
    }
}
