<?php

namespace Modules\Shared\Http\Controllers;

use Modules\Shared\Http\Requests\CreateDepartmentRequest;
use Modules\Shared\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\AppBaseController;
use Modules\Shared\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Flash;
use Modules\Shared\Repositories\BranchRepository;

class DepartmentController extends AppBaseController
{
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    public function __construct(DepartmentRepository $departmentRepo, BranchRepository $branchRepo)
    {
        $this->departmentRepository = $departmentRepo;
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the Department.
     */
    public function index(Request $request)
    {
        $departments = $this->departmentRepository->paginate(10);

        return view('shared::departments.index')
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new Department.
     */
    public function create()
    {
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('shared::departments.create')->with('branches', $branches);
    }

    /**
     * Store a newly created Department in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        Flash::success('Department saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     */
    public function show($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        return view('shared::departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified Department.
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('shared::departments.edit')->with(['department' => $department, 'branches' => $branches]);
    }

    /**
     * Update the specified Department in storage.
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $department = $this->departmentRepository->update($request->all(), $id);

        Flash::success('Department updated successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success('Department deleted successfully.');

        return redirect(route('departments.index'));
    }
}
