<?php

namespace Modules\Shared\Http\Controllers;

use Modules\Shared\Http\Requests\CreateBranchRequest;
use Modules\Shared\Http\Requests\UpdateBranchRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Modules\Shared\Repositories\BranchRepository;
use Illuminate\Http\Request;
use Flash;

class BranchController extends AppBaseController
{
    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(BranchRepository $branchRepo, UserRepository $userRepo)
    {
        $this->branchRepository = $branchRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Branch.
     */
    public function index(Request $request)
    {
        $branches = $this->branchRepository->paginate(10);

        return view('shared::branches.index')
            ->with('branches', $branches);
    }

    /**
     * Show the form for creating a new Branch.
     */
    public function create()
    {
        $users = $this->userRepository->all()->pluck('email', 'id');
        $users->prepend('Select user', '');
        return view('shared::branches.create')->with('users', $users);
    }

    /**
     * Store a newly created Branch in storage.
     */
    public function store(CreateBranchRequest $request)
    {
        $input = $request->all();

        $branch = $this->branchRepository->create($input);

        Flash::success('Branch saved successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified Branch.
     */
    public function show($id)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        return view('shared::branches.show')->with('branch', $branch);
    }

    /**
     * Show the form for editing the specified Branch.
     */
    public function edit($id)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $users = $this->userRepository->all()->pluck('email', 'id');
        $users->prepend('Select user', '');
        return view('shared::branches.edit')->with(['branch' => $branch, 'users' => $users]);
    }

    /**
     * Update the specified Branch in storage.
     */
    public function update($id, UpdateBranchRequest $request)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $branch = $this->branchRepository->update($request->all(), $id);

        Flash::success('Branch updated successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified Branch from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $this->branchRepository->delete($id);

        Flash::success('Branch deleted successfully.');

        return redirect(route('branches.index'));
    }
}
