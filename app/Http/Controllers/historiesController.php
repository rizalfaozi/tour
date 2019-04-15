<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatehistoriesRequest;
use App\Http\Requests\UpdatehistoriesRequest;
use App\Repositories\historiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class historiesController extends AppBaseController
{
    /** @var  historiesRepository */
    private $historiesRepository;

    public function __construct(historiesRepository $historiesRepo)
    {
        $this->historiesRepository = $historiesRepo;
    }

    /**
     * Display a listing of the histories.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historiesRepository->pushCriteria(new RequestCriteria($request));
        $histories = $this->historiesRepository->all();

        return view('histories.index')
            ->with('histories', $histories);
    }

    /**
     * Show the form for creating a new histories.
     *
     * @return Response
     */
    public function create()
    {
        return view('histories.create');
    }

    /**
     * Store a newly created histories in storage.
     *
     * @param CreatehistoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatehistoriesRequest $request)
    {
        $input = $request->all();

        $histories = $this->historiesRepository->create($input);

        Flash::success('Histories saved successfully.');

        return redirect(route('histories.index'));
    }

    /**
     * Display the specified histories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        return view('histories.show')->with('histories', $histories);
    }

    /**
     * Show the form for editing the specified histories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        return view('histories.edit')->with('histories', $histories);
    }

    /**
     * Update the specified histories in storage.
     *
     * @param  int              $id
     * @param UpdatehistoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatehistoriesRequest $request)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        $histories = $this->historiesRepository->update($request->all(), $id);

        Flash::success('Histories updated successfully.');

        return redirect(route('histories.index'));
    }

    /**
     * Remove the specified histories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $histories = $this->historiesRepository->findWithoutFail($id);

        if (empty($histories)) {
            Flash::error('Histories not found');

            return redirect(route('histories.index'));
        }

        $this->historiesRepository->delete($id);

        Flash::success('Histories deleted successfully.');

        return redirect(route('histories.index'));
    }
}
