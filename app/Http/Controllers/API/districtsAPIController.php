<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedistrictsAPIRequest;
use App\Http\Requests\API\UpdatedistrictsAPIRequest;
use App\Models\districts;
use App\Repositories\districtsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class districtsController
 * @package App\Http\Controllers\API
 */

class districtsAPIController extends AppBaseController
{
    /** @var  districtsRepository */
    private $districtsRepository;

    public function __construct(districtsRepository $districtsRepo)
    {
        $this->districtsRepository = $districtsRepo;
    }

    /**
     * Display a listing of the districts.
     * GET|HEAD /districts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->districtsRepository->pushCriteria(new RequestCriteria($request));
        $this->districtsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $districts = $this->districtsRepository->all();

        return $this->sendResponse($districts->toArray(), 'Districts retrieved successfully');
    }

    /**
     * Store a newly created districts in storage.
     * POST /districts
     *
     * @param CreatedistrictsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedistrictsAPIRequest $request)
    {
        $input = $request->all();

        $districts = $this->districtsRepository->create($input);

        return $this->sendResponse($districts->toArray(), 'Districts saved successfully');
    }

    /**
     * Display the specified districts.
     * GET|HEAD /districts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var districts $districts */
        $districts = $this->districtsRepository->findWithoutFail($id);

        if (empty($districts)) {
            return $this->sendError('Districts not found');
        }

        return $this->sendResponse($districts->toArray(), 'Districts retrieved successfully');
    }

    /**
     * Update the specified districts in storage.
     * PUT/PATCH /districts/{id}
     *
     * @param  int $id
     * @param UpdatedistrictsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedistrictsAPIRequest $request)
    {
        $input = $request->all();

        /** @var districts $districts */
        $districts = $this->districtsRepository->findWithoutFail($id);

        if (empty($districts)) {
            return $this->sendError('Districts not found');
        }

        $districts = $this->districtsRepository->update($input, $id);

        return $this->sendResponse($districts->toArray(), 'districts updated successfully');
    }

    /**
     * Remove the specified districts from storage.
     * DELETE /districts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var districts $districts */
        $districts = $this->districtsRepository->findWithoutFail($id);

        if (empty($districts)) {
            return $this->sendError('Districts not found');
        }

        $districts->delete();

        return $this->sendResponse($id, 'Districts deleted successfully');
    }
}
