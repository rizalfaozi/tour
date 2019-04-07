<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecommissionsRequest;
use App\Http\Requests\UpdatecommissionsRequest;
use App\Repositories\commissionsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class commissionsController extends AppBaseController
{
    /** @var  commissionsRepository */
    private $commissionsRepository;

    public function __construct(commissionsRepository $commissionsRepo)
    {
        $this->commissionsRepository = $commissionsRepo;
    }

    /**
     * Display a listing of the commissions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->commissionsRepository->pushCriteria(new RequestCriteria($request));
        $commissions = $this->commissionsRepository->all();

        return view('commissions.index')
            ->with('commissions', $commissions);
    }

    /**
     * Show the form for creating a new commissions.
     *
     * @return Response
     */
    public function create()
    {
        return view('commissions.create');
    }

    /**
     * Store a newly created commissions in storage.
     *
     * @param CreatecommissionsRequest $request
     *
     * @return Response
     */
    public function store(CreatecommissionsRequest $request)
    {
        $input = $request->all();

        $commissions = $this->commissionsRepository->create($input);

        Flash::success('Commissions saved successfully.');

        return redirect(route('commissions.index'));
    }

    /**
     * Display the specified commissions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            Flash::error('Commissions not found');

            return redirect(route('commissions.index'));
        }

        return view('commissions.show')->with('commissions', $commissions);
    }

    /**
     * Show the form for editing the specified commissions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            Flash::error('Commissions not found');

            return redirect(route('commissions.index'));
        }

        return view('commissions.edit')->with('commissions', $commissions);
    }

    /**
     * Update the specified commissions in storage.
     *
     * @param  int              $id
     * @param UpdatecommissionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecommissionsRequest $request)
    {
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            Flash::error('Commissions not found');

            return redirect(route('commissions.index'));
        }

        $commissions = $this->commissionsRepository->update($request->all(), $id);

        Flash::success('Commissions updated successfully.');

        return redirect(route('commissions.index'));
    }

    /**
     * Remove the specified commissions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            Flash::error('Commissions not found');

            return redirect(route('commissions.index'));
        }

        $this->commissionsRepository->delete($id);

        Flash::success('Commissions deleted successfully.');

        return redirect(route('commissions.index'));
    }
}
