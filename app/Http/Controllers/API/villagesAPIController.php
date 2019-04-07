<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatevillagesAPIRequest;
use App\Http\Requests\API\UpdatevillagesAPIRequest;
use App\Models\villages;
use App\Repositories\villagesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class villagesController
 * @package App\Http\Controllers\API
 */

class villagesAPIController extends AppBaseController
{
    /** @var  villagesRepository */
    private $villagesRepository;

    public function __construct(villagesRepository $villagesRepo)
    {
        $this->villagesRepository = $villagesRepo;
    }

    /**
     * Display a listing of the villages.
     * GET|HEAD /villages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->villagesRepository->pushCriteria(new RequestCriteria($request));
        $this->villagesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $villages = $this->villagesRepository->all();

        return $this->sendResponse($villages->toArray(), 'Villages retrieved successfully');
    }

    /**
     * Store a newly created villages in storage.
     * POST /villages
     *
     * @param CreatevillagesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatevillagesAPIRequest $request)
    {
        $input = $request->all();

        $villages = $this->villagesRepository->create($input);

        return $this->sendResponse($villages->toArray(), 'Villages saved successfully');
    }

    /**
     * Display the specified villages.
     * GET|HEAD /villages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var villages $villages */
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            return $this->sendError('Villages not found');
        }

        return $this->sendResponse($villages->toArray(), 'Villages retrieved successfully');
    }

    /**
     * Update the specified villages in storage.
     * PUT/PATCH /villages/{id}
     *
     * @param  int $id
     * @param UpdatevillagesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevillagesAPIRequest $request)
    {
        $input = $request->all();

        /** @var villages $villages */
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            return $this->sendError('Villages not found');
        }

        $villages = $this->villagesRepository->update($input, $id);

        return $this->sendResponse($villages->toArray(), 'villages updated successfully');
    }

    /**
     * Remove the specified villages from storage.
     * DELETE /villages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var villages $villages */
        $villages = $this->villagesRepository->findWithoutFail($id);

        if (empty($villages)) {
            return $this->sendError('Villages not found');
        }

        $villages->delete();

        return $this->sendResponse($id, 'Villages deleted successfully');
    }
}
