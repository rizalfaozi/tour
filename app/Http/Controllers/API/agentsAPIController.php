<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateagentsAPIRequest;
use App\Http\Requests\API\UpdateagentsAPIRequest;
use App\Models\agents;
use App\Repositories\agentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class agentsController
 * @package App\Http\Controllers\API
 */

class agentsAPIController extends AppBaseController
{
    /** @var  agentsRepository */
    private $agentsRepository;

    public function __construct(agentsRepository $agentsRepo)
    {
        $this->agentsRepository = $agentsRepo;
    }

    /**
     * Display a listing of the agents.
     * GET|HEAD /agents
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->agentsRepository->pushCriteria(new RequestCriteria($request));
        $this->agentsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $agents = $this->agentsRepository->all();

        return $this->sendResponse($agents->toArray(), 'Agents retrieved successfully');
    }

    /**
     * Store a newly created agents in storage.
     * POST /agents
     *
     * @param CreateagentsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateagentsAPIRequest $request)
    {
        $input = $request->all();

        $agents = $this->agentsRepository->create($input);

        return $this->sendResponse($agents->toArray(), 'Agents saved successfully');
    }

    /**
     * Display the specified agents.
     * GET|HEAD /agents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var agents $agents */
        $agents = $this->agentsRepository->findWithoutFail($id);

        if (empty($agents)) {
            return $this->sendError('Agents not found');
        }

        return $this->sendResponse($agents->toArray(), 'Agents retrieved successfully');
    }

    /**
     * Update the specified agents in storage.
     * PUT/PATCH /agents/{id}
     *
     * @param  int $id
     * @param UpdateagentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateagentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var agents $agents */
        $agents = $this->agentsRepository->findWithoutFail($id);

        if (empty($agents)) {
            return $this->sendError('Agents not found');
        }

        $agents = $this->agentsRepository->update($input, $id);

        return $this->sendResponse($agents->toArray(), 'agents updated successfully');
    }

    /**
     * Remove the specified agents from storage.
     * DELETE /agents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var agents $agents */
        $agents = $this->agentsRepository->findWithoutFail($id);

        if (empty($agents)) {
            return $this->sendError('Agents not found');
        }

        $agents->delete();

        return $this->sendResponse($id, 'Agents deleted successfully');
    }
}
