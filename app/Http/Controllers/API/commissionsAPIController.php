<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecommissionsAPIRequest;
use App\Http\Requests\API\UpdatecommissionsAPIRequest;
use App\Models\commissions;
use App\Repositories\commissionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class commissionsController
 * @package App\Http\Controllers\API
 */

class commissionsAPIController extends AppBaseController
{
    /** @var  commissionsRepository */
    private $commissionsRepository;

    public function __construct(commissionsRepository $commissionsRepo)
    {
        $this->commissionsRepository = $commissionsRepo;
    }

    /**
     * Display a listing of the commissions.
     * GET|HEAD /commissions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->commissionsRepository->pushCriteria(new RequestCriteria($request));
        $this->commissionsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $commissions = $this->commissionsRepository->all();

        return $this->sendResponse($commissions->toArray(), 'Commissions retrieved successfully');
    }

    /**
     * Store a newly created commissions in storage.
     * POST /commissions
     *
     * @param CreatecommissionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecommissionsAPIRequest $request)
    {
        $input = $request->all();

        $commissions = $this->commissionsRepository->create($input);

        return $this->sendResponse($commissions->toArray(), 'Commissions saved successfully');
    }

    /**
     * Display the specified commissions.
     * GET|HEAD /commissions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var commissions $commissions */
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            return $this->sendError('Commissions not found');
        }

        return $this->sendResponse($commissions->toArray(), 'Commissions retrieved successfully');
    }

    /**
     * Update the specified commissions in storage.
     * PUT/PATCH /commissions/{id}
     *
     * @param  int $id
     * @param UpdatecommissionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecommissionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var commissions $commissions */
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            return $this->sendError('Commissions not found');
        }

        $commissions = $this->commissionsRepository->update($input, $id);

        return $this->sendResponse($commissions->toArray(), 'commissions updated successfully');
    }

    /**
     * Remove the specified commissions from storage.
     * DELETE /commissions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var commissions $commissions */
        $commissions = $this->commissionsRepository->findWithoutFail($id);

        if (empty($commissions)) {
            return $this->sendError('Commissions not found');
        }

        $commissions->delete();

        return $this->sendResponse($id, 'Commissions deleted successfully');
    }
}
