<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatememberAPIRequest;
use App\Http\Requests\API\UpdatememberAPIRequest;
use App\Models\member;
use App\Repositories\memberRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class memberController
 * @package App\Http\Controllers\API
 */

class memberAPIController extends AppBaseController
{
    /** @var  memberRepository */
    private $memberRepository;

    public function __construct(memberRepository $memberRepo)
    {
        $this->memberRepository = $memberRepo;
    }

    /**
     * Display a listing of the member.
     * GET|HEAD /members
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->memberRepository->pushCriteria(new RequestCriteria($request));
        $this->memberRepository->pushCriteria(new LimitOffsetCriteria($request));
        $members = $this->memberRepository->all();

        return $this->sendResponse($members->toArray(), 'Members retrieved successfully');
    }

    /**
     * Store a newly created member in storage.
     * POST /members
     *
     * @param CreatememberAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatememberAPIRequest $request)
    {
        $input = $request->all();

        $members = $this->memberRepository->create($input);

        return $this->sendResponse($members->toArray(), 'Member saved successfully');
    }

    /**
     * Display the specified member.
     * GET|HEAD /members/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var member $member */
        $member = $this->memberRepository->findWithoutFail($id);

        if (empty($member)) {
            return $this->sendError('Member not found');
        }

        return $this->sendResponse($member->toArray(), 'Member retrieved successfully');
    }

    /**
     * Update the specified member in storage.
     * PUT/PATCH /members/{id}
     *
     * @param  int $id
     * @param UpdatememberAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatememberAPIRequest $request)
    {
        $input = $request->all();

        /** @var member $member */
        $member = $this->memberRepository->findWithoutFail($id);

        if (empty($member)) {
            return $this->sendError('Member not found');
        }

        $member = $this->memberRepository->update($input, $id);

        return $this->sendResponse($member->toArray(), 'member updated successfully');
    }

    /**
     * Remove the specified member from storage.
     * DELETE /members/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var member $member */
        $member = $this->memberRepository->findWithoutFail($id);

        if (empty($member)) {
            return $this->sendError('Member not found');
        }

        $member->delete();

        return $this->sendResponse($id, 'Member deleted successfully');
    }
}
