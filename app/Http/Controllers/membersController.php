<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemembersRequest;
use App\Http\Requests\UpdatemembersRequest;
use App\Repositories\membersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;


class membersController extends AppBaseController
{
    /** @var  memberRepository */
    private $membersRepository;

    public function __construct(membersRepository $membersRepo)
    {
        $this->membersRepository = $membersRepo;
    }

    /**
     * Display a listing of the members.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->membersRepository->pushCriteria(new RequestCriteria($request));
        $members = $this->membersRepository->all();

        return view('members.index')
            ->with('members', $members);
    }

    /**
     * Show the form for creating a new members.
     *
     * @return Response
     */
    public function create()
    {
        $provinsi = DB::table('provinces')->get();
        return view('members.create')->with('provinsi', $provinsi);
    }

    /**
     * Store a newly created members in storage.
     *
     * @param CreatememberRequest $request
     *
     * @return Response
     */
    public function store(CreatemembersRequest $request)
    {
        $input = $request->all();

        $members = $this->membersRepository->create($input);

        Flash::success('Members saved successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Display the specified members.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        return view('members.show')->with('members', $members);
    }

    /**
     * Show the form for editing the specified members.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        return view('members.edit')->with('members', $members);
    }

    /**
     * Update the specified members in storage.
     *
     * @param  int              $id
     * @param UpdatememberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemembersRequest $request)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        $members = $this->membersRepository->update($request->all(), $id);

        Flash::success('Members updated successfully.');

        return redirect(route('members.index'));
    }

    /**
     * Remove the specified members from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $members = $this->membersRepository->findWithoutFail($id);

        if (empty($members)) {
            Flash::error('Members not found');

            return redirect(route('members.index'));
        }

        $this->membersRepository->delete($id);

        Flash::success('Members deleted successfully.');

        return redirect(route('members.index'));
    }


      public function kabupaten(request $request){

       $kabupaten = DB::table('districts')->where('province_id',$request->id)->get();
       return $kabupaten;

    }


     public function kecamatan(request $request){

       $kecamatan = DB::table('subdistricts')->where('district_id',$request->id)->get();
       return $kecamatan;

    }


      public function kelurahan(request $request){

       $kelurahan = DB::table('villages')->where('subdistrict_id',$request->id)->get();
       return $kelurahan;

    }
}
