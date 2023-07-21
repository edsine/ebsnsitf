<?php

namespace Modules\EmployerManager\Http\Controllers;

use Modules\EmployerManager\Http\Requests\CreateEmployeeRequest;
use Modules\EmployerManager\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\LocalGovt;
use App\Models\State;
use Modules\EmployerManager\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;

class EmployeeController extends AppBaseController
{
    /** @var EmployeeRepository $employeeRepository*/
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Display a listing of the Employee.
     */
    public function index(Request $request)
    {
        $employees = $this->employeeRepository->paginate(10);
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        return view('employermanager::employees.index', compact('state', 'local_govt','employees'));
    }

    /**
     * Show the form for creating a new Employee.
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $employer = Employer::where('user_id', $user->id)->get();
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        // $employee = Employee::where('employer_id', $employer->id)->first();
        return view('employermanager::employees.create', compact('employer','state', 'local_govt'));
    }

    public function createEmployee(Request $request, $id)
    {
        $employerData = Employer::findorFail($id);
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();
        $employer = $employerData->id;
        return view('employermanager::employees.create', compact('employer','state', 'local_govt'));
    }

    /**
     * Store a newly created Employee in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();
        $employee = $this->employeeRepository->create($input);

        Flash::success('Employee saved successfully.');

        return redirect(route('employer.employees', $employee->employer_id));
    }

    /**
     * Display the specified Employee.
     */
    public function show($id)
    {
        $employee = $this->employeeRepository->find($id);
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employermanager::employees.show', compact('state', 'local_govt', 'employee'));
    }

    /**
     * Show the form for editing the specified Employee.
     */
    public function edit($id)
    {
        $employee = $this->employeeRepository->find($id);
        $employer = $employee->employer_id;
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employermanager::employees.edit', compact('employer','state', 'local_govt'))->with('employee', $employee);
    }

    /**
     * Update the specified Employee in storage.
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee = $this->employeeRepository->update($request->all(), $id);

        Flash::success('Employee updated successfully.');

        return redirect(route('employer.employees', $employee->employer_id));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }
}
