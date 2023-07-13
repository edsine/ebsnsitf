<?php

namespace Modules\ClaimsCompensation\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ClaimsCompensation\Http\Requests\CreateClaimsCompensationRequest;
use Modules\ClaimsCompensation\Http\Requests\UpdateClaimsCompensationRequest;
use App\Http\Controllers\AppBaseController;
use Modules\ClaimsCompensation\Repositories\ClaimsCompensationRepository;
use Flash;
use Modules\Shared\Repositories\BranchRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class ClaimsCompensationController extends AppBaseController
{

    /** @var ClaimsCompensationRepository $claimscompensationRepository*/
    private $claimscompensationRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    public function __construct(ClaimsCompensationRepository $claimscompensationRepo, BranchRepository $branchRepo)
    {
        $this->claimscompensationRepository = $claimscompensationRepo;
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $claimscompensations = $this->claimscompensationRepository->paginate(10);

        return view('claimscompensation::claimscompensation.index')->with('claimscompensations', $claimscompensations);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('claimscompensation::claimscompensation.create')->with('branches', $branches);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateClaimsCompensationRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['images'] = $fileName;
        }

        $claimscompensation = $this->claimscompensationRepository->create($input);

        Flash::success('Claims Compensations saved successfully.');

        return redirect(route('claimscompensation.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $claimscompensations = $this->claimscompensationRepository->find($id);
        
        if (empty($claimscompensations)) {
            Flash::error('Claims Compensations not found');

            return redirect(route('claimscompensation.index'));
        }

        return view('claimscompensation::claimscompensation.show')->with('claimscompensations', $claimscompensations);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $claimscompensations = $this->claimscompensationRepository->find($id);

        if (empty($claimscompensations)) {
            Flash::error('Claims Compensations not found');

            return redirect(route('claimscompensation.index'));
        }
        

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('claimscompensation::claimscompensation.edit')->with(['claimscompensations' => $claimscompensations, 'branches' => $branches]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateClaimsCompensationRequest $request)
    {
        $claimscompensations = $this->claimscompensationRepository->find($id);

        if (empty($claimscompensations)) {
            Flash::error('Claims Compensations not found');

            return redirect(route('claimscompensation.index'));
        }

        $input = $request->all();

        $input['user_id'] = Auth::id();

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['images'] = $fileName;
        } else {
            // prevent images from updating db since there is no upload
            unset($input['images']);
        }

        $claimscompensations = $this->claimscompensationRepository->update($input, $id);

        Flash::success('Claims Compensations updated successfully.');

        return redirect(route('claimscompensation.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $claimscompensations = $this->claimscompensationRepository->find($id);

        if (empty($claimscompensations)) {
            Flash::error('Claims Compensations not found');

            return redirect(route('claimscompensation.index'));
        }

        $this->claimscompensationRepository->delete($id);

        Flash::success('Claims Compensations deleted successfully.');

        return redirect(route('claimscompensation.index'));
    }
}
