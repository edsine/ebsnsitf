<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateDepartmentRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Modules\WorkflowEngine\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Flash;

class DepartmentController extends AppBaseController
{
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(DepartmentRepository $departmentRepo, UserRepository $userRepo)
    {
        $this->departmentRepository = $departmentRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Department.
     */
    public function index(Request $request)
    {
        $departments = $this->departmentRepository->paginate(10);

        return view('workflowengine::departments.index')
            ->with('departments', $departments);
    }

    /**
     * Show the form for creating a new Department.
     */
    public function create()
    {
        $users = $this->userRepository->all()->pluck('email', 'id');
        $users->prepend('Select user', '');
        return view('workflowengine::departments.create')->with('users', $users);
    }

    /**
     * Store a newly created Department in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $departments = $this->departmentRepository->create($input);

        Flash::success('Department saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     */
    public function show($id)
    {
        $departments = $this->departmentRepository->find($id);

        if (empty($departments)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        return view('workflowengine::departments.show')->with('department', $departments);
    }

    /**
     * Show the form for editing the specified Department.
     */
    public function edit($id)
    {
        $departments = $this->departmentRepository->find($id);

        if (empty($departments)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $users = $this->userRepository->all()->pluck('email', 'id');
        $users->prepend('Select user', '');
        return view('workflowengine::departments.edit')->with(['department' => $departments, 'users' => $users]);
    }

    /**
     * Update the specified Department in storage.
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $departments = $this->departmentRepository->find($id);

        if (empty($departments)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $departments = $this->departmentRepository->update($request->all(), $id);

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
        $departments = $this->departmentRepository->find($id);

        if (empty($departments)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success('Department deleted successfully.');

        return redirect(route('departments.index'));
    }
}
