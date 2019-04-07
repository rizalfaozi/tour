<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateprovincesAPIRequest;
use App\Http\Requests\API\UpdateprovincesAPIRequest;
use App\Models\provinces;
use App\Repositories\provincesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class provincesController
 * @package App\Http\Controllers\API
 */

class provincesAPIController extends AppBaseController
{
    /** @var  provincesRepository */
    private $provincesRepository;

    public function __construct(provincesRepository $provincesRepo)
    {
        $this->provincesRepository = $provincesRepo;
    }

    /**
     * Display a listing of the provinces.
     * GET|HEAD /provinces
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->provincesRepository->pushCriteria(new RequestCriteria($request));
        $this->provincesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $provinces = $this->provincesRepository->all();

        return $this->sendResponse($provinces->toArray(), 'Provinces retrieved successfully');
    }

    /**
     * Store a newly created provinces in storage.
     * POST /provinces
     *
     * @param CreateprovincesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateprovincesAPIRequest $request)
    {
        $input = $request->all();

        $provinces = $this->provincesRepository->create($input);

        return $this->sendResponse($provinces->toArray(), 'Provinces saved successfully');
    }

    /**
     * Display the specified provinces.
     * GET|HEAD /provinces/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var provinces $provinces */
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            return $this->sendError('Provinces not found');
        }

        return $this->sendResponse($provinces->toArray(), 'Provinces retrieved successfully');
    }

    /**
     * Update the specified provinces in storage.
     * PUT/PATCH /provinces/{id}
     *
     * @param  int $id
     * @param UpdateprovincesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprovincesAPIRequest $request)
    {
        $input = $request->all();

        /** @var provinces $provinces */
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            return $this->sendError('Provinces not found');
        }

        $provinces = $this->provincesRepository->update($input, $id);

        return $this->sendResponse($provinces->toArray(), 'provinces updated successfully');
    }

    /**
     * Remove the specified provinces from storage.
     * DELETE /provinces/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var provinces $provinces */
        $provinces = $this->provincesRepository->findWithoutFail($id);

        if (empty($provinces)) {
            return $this->sendError('Provinces not found');
        }

        $provinces->delete();

        return $this->sendResponse($id, 'Provinces deleted successfully');
    }
}
