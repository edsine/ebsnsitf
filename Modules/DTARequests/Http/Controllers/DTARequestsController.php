<?php

namespace Modules\DTARequests\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\DTARequests\Http\Requests\CreateDTARequests;
use Modules\DTARequests\Http\Requests\UpdateDTARequests;
use App\Http\Controllers\AppBaseController;
use Modules\DTARequests\Repositories\DTARequestsRepository;
use Flash;
use Modules\Shared\Repositories\BranchRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class DTARequestsController extends AppBaseController
{

    /** @var DTARequestsRepository $dtaRequestsRepository*/
    private $dtaRequestsRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    public function __construct(DTARequestsRepository $dtaRequestsRepo, BranchRepository $branchRepo)
    {
        $this->dtaRequestsRepository = $dtaRequestsRepo;
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dtarequests = $this->dtaRequestsRepository->paginate(10);

        return view('dtarequests::dtarequests.index')->with('dtarequests', $dtarequests);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('dtarequests::dtarequests.create')->with('branches', $branches);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateDTARequests $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['images'] = $fileName;
        }

        $dtarequests = $this->dtaRequestsRepository->create($input);

        Flash::success('DTA Requests saved successfully.');

        return redirect(route('dtarequests.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);
        
        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }

        return view('dtarequests::dtarequests.show')->with('dtarequests', $dtarequests);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }
        

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('dtarequests::dtarequests.edit')->with(['dtarequests' => $dtarequests, 'branches' => $branches]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateClaimsCompensationRequest $request)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
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

        $dtarequests = $this->dtaRequestsRepository->update($input, $id);

        Flash::success('DTA Requests updated successfully.');

        return redirect(route('dtarequests.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }

        $this->dtaRequestsRepository->delete($id);

        Flash::success('DTA Requests deleted successfully.');

        return redirect(route('dtarequests.index'));
    }
}