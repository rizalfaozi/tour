<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesubdistrictsAPIRequest;
use App\Http\Requests\API\UpdatesubdistrictsAPIRequest;
use App\Models\subdistricts;
use App\Repositories\subdistrictsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class subdistrictsController
 * @package App\Http\Controllers\API
 */

class subdistrictsAPIController extends AppBaseController
{
    /** @var  subdistrictsRepository */
    private $subdistrictsRepository;

    public function __construct(subdistrictsRepository $subdistrictsRepo)
    {
        $this->subdistrictsRepository = $subdistrictsRepo;
    }

    /**
     * Display a listing of the subdistricts.
     * GET|HEAD /subdistricts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subdistrictsRepository->pushCriteria(new RequestCriteria($request));
        $this->subdistrictsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $subdistricts = $this->subdistrictsRepository->all();

        return $this->sendResponse($subdistricts->toArray(), 'Subdistricts retrieved successfully');
    }

    /**
     * Store a newly created subdistricts in storage.
     * POST /subdistricts
     *
     * @param CreatesubdistrictsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesubdistrictsAPIRequest $request)
    {
        $input = $request->all();

        $subdistricts = $this->subdistrictsRepository->create($input);

        return $this->sendResponse($subdistricts->toArray(), 'Subdistricts saved successfully');
    }

    /**
     * Display the specified subdistricts.
     * GET|HEAD /subdistricts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var subdistricts $subdistricts */
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);

        if (empty($subdistricts)) {
            return $this->sendError('Subdistricts not found');
        }

        return $this->sendResponse($subdistricts->toArray(), 'Subdistricts retrieved successfully');
    }

    /**
     * Update the specified subdistricts in storage.
     * PUT/PATCH /subdistricts/{id}
     *
     * @param  int $id
     * @param UpdatesubdistrictsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubdistrictsAPIRequest $request)
    {
        $input = $request->all();

        /** @var subdistricts $subdistricts */
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);

        if (empty($subdistricts)) {
            return $this->sendError('Subdistricts not found');
        }

        $subdistricts = $this->subdistrictsRepository->update($input, $id);

        return $this->sendResponse($subdistricts->toArray(), 'subdistricts updated successfully');
    }

    /**
     * Remove the specified subdistricts from storage.
     * DELETE /subdistricts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var subdistricts $subdistricts */
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);

        if (empty($subdistricts)) {
            return $this->sendError('Subdistricts not found');
        }

        $subdistricts->delete();

        return $this->sendResponse($id, 'Subdistricts deleted successfully');
    }
}
