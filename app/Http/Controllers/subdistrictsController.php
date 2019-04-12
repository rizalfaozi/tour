<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesubdistrictsRequest;
use App\Http\Requests\UpdatesubdistrictsRequest;
use App\Repositories\subdistrictsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\districts;

class subdistrictsController extends AppBaseController
{
    /** @var  subdistrictsRepository */
    private $subdistrictsRepository;

    public function __construct(subdistrictsRepository $subdistrictsRepo)
    {
        $this->subdistrictsRepository = $subdistrictsRepo;
    }

    /**
     * Display a listing of the subdistricts.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subdistrictsRepository->pushCriteria(new RequestCriteria($request));
        $subdistricts = $this->subdistrictsRepository->all();

        return view('subdistricts.index')
            ->with('subdistricts', $subdistricts);
    }

    /**
     * Show the form for creating a new subdistricts.
     *
     * @return Response
     */
    public function create()
    {
        $districts = districts::orderBy('id','desc')->get();
        return view('subdistricts.create')->with(['districts'=>$districts]);
    }

    /**
     * Store a newly created subdistricts in storage.
     *
     * @param CreatesubdistrictsRequest $request
     *
     * @return Response
     */
    public function store(CreatesubdistrictsRequest $request)
    {
        $input = $request->all();

        $subdistricts = $this->subdistrictsRepository->create($input);

        Flash::success('Subdistricts saved successfully.');

        return redirect(route('subdistricts.index'));
    }

    /**
     * Display the specified subdistricts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);

        if (empty($subdistricts)) {
            Flash::error('Subdistricts not found');

            return redirect(route('subdistricts.index'));
        }

        return view('subdistricts.show')->with('subdistricts', $subdistricts);
    }

    /**
     * Show the form for editing the specified subdistricts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);
        $districts = districts::orderBy('id','desc')->get();
        if (empty($subdistricts)) {
            Flash::error('Subdistricts not found');

            return redirect(route('subdistricts.index'));
        }

        return view('subdistricts.edit')->with(['subdistricts'=> $subdistricts,'districts'=>$districts]);
    }

    /**
     * Update the specified subdistricts in storage.
     *
     * @param  int              $id
     * @param UpdatesubdistrictsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesubdistrictsRequest $request)
    {
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);

        if (empty($subdistricts)) {
            Flash::error('Subdistricts not found');

            return redirect(route('subdistricts.index'));
        }

        $subdistricts = $this->subdistrictsRepository->update($request->all(), $id);

        Flash::success('Subdistricts updated successfully.');

        return redirect(route('subdistricts.index'));
    }

    /**
     * Remove the specified subdistricts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subdistricts = $this->subdistrictsRepository->findWithoutFail($id);

        if (empty($subdistricts)) {
            Flash::error('Subdistricts not found');

            return redirect(route('subdistricts.index'));
        }

        $this->subdistrictsRepository->delete($id);

        Flash::success('Subdistricts deleted successfully.');

        return redirect(route('subdistricts.index'));
    }
}
