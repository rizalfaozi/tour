<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroleusersRequest;
use App\Http\Requests\UpdateroleusersRequest;
use App\Repositories\roleusersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class roleusersController extends AppBaseController
{
    /** @var  roleusersRepository */
    private $roleusersRepository;

    public function __construct(roleusersRepository $roleusersRepo)
    {
        $this->roleusersRepository = $roleusersRepo;
    }

    /**
     * Display a listing of the roleusers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->roleusersRepository->pushCriteria(new RequestCriteria($request));
        $roleusers = $this->roleusersRepository->all();

        return view('roleusers.index')
            ->with('roleusers', $roleusers);
    }

    /**
     * Show the form for creating a new roleusers.
     *
     * @return Response
     */
    public function create()
    {
        return view('roleusers.create');
    }

    /**
     * Store a newly created roleusers in storage.
     *
     * @param CreateroleusersRequest $request
     *
     * @return Response
     */
    public function store(CreateroleusersRequest $request)
    {
        $input = $request->all();

        $roleusers = $this->roleusersRepository->create($input);

        Flash::success('Roleusers saved successfully.');

        return redirect(route('roleusers.index'));
    }

    /**
     * Display the specified roleusers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $roleusers = $this->roleusersRepository->findWithoutFail($id);

        if (empty($roleusers)) {
            Flash::error('Roleusers not found');

            return redirect(route('roleusers.index'));
        }

        return view('roleusers.show')->with('roleusers', $roleusers);
    }

    /**
     * Show the form for editing the specified roleusers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roleusers = $this->roleusersRepository->findWithoutFail($id);

        if (empty($roleusers)) {
            Flash::error('Roleusers not found');

            return redirect(route('roleusers.index'));
        }

        return view('roleusers.edit')->with('roleusers', $roleusers);
    }

    /**
     * Update the specified roleusers in storage.
     *
     * @param  int              $id
     * @param UpdateroleusersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroleusersRequest $request)
    {
        $roleusers = $this->roleusersRepository->findWithoutFail($id);

        if (empty($roleusers)) {
            Flash::error('Roleusers not found');

            return redirect(route('roleusers.index'));
        }

        $roleusers = $this->roleusersRepository->update($request->all(), $id);

        Flash::success('Roleusers updated successfully.');

        return redirect(route('roleusers.index'));
    }

    /**
     * Remove the specified roleusers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $roleusers = $this->roleusersRepository->findWithoutFail($id);

        if (empty($roleusers)) {
            Flash::error('Roleusers not found');

            return redirect(route('roleusers.index'));
        }

        $this->roleusersRepository->delete($id);

        Flash::success('Roleusers deleted successfully.');

        return redirect(route('roleusers.index'));
    }
}
