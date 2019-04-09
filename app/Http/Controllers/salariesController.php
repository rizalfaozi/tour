<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesalariesRequest;
use App\Http\Requests\UpdatesalariesRequest;
use App\Repositories\salariesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class salariesController extends AppBaseController
{
    /** @var  salariesRepository */
    private $salariesRepository;

    public function __construct(salariesRepository $salariesRepo)
    {
        $this->salariesRepository = $salariesRepo;
    }

    /**
     * Display a listing of the salaries.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salariesRepository->pushCriteria(new RequestCriteria($request));
        $salaries = $this->salariesRepository->all();

        return view('salaries.index')
            ->with('salaries', $salaries);
    }

    /**
     * Show the form for creating a new salaries.
     *
     * @return Response
     */
    public function create()
    {
        return view('salaries.create');
    }

    /**
     * Store a newly created salaries in storage.
     *
     * @param CreatesalariesRequest $request
     *
     * @return Response
     */
    public function store(CreatesalariesRequest $request)
    {
        $input = $request->all();

        $salaries = $this->salariesRepository->create($input);

        Flash::success('Salaries saved successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Display the specified salaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.show')->with('salaries', $salaries);
    }

    /**
     * Show the form for editing the specified salaries.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        return view('salaries.edit')->with('salaries', $salaries);
    }

    /**
     * Update the specified salaries in storage.
     *
     * @param  int              $id
     * @param UpdatesalariesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalariesRequest $request)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        $salaries = $this->salariesRepository->update($request->all(), $id);

        Flash::success('Salaries updated successfully.');

        return redirect(route('salaries.index'));
    }

    /**
     * Remove the specified salaries from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salaries = $this->salariesRepository->findWithoutFail($id);

        if (empty($salaries)) {
            Flash::error('Salaries not found');

            return redirect(route('salaries.index'));
        }

        $this->salariesRepository->delete($id);

        Flash::success('Salaries deleted successfully.');

        return redirect(route('salaries.index'));
    }
}
