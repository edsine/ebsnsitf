<?php

namespace Modules\EmployerManager\Http\Controllers;

use Modules\EmployerManager\Http\Requests\CreateEmployerRequest;
use Modules\EmployerManager\Http\Requests\UpdateEmployerRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Modules\EmployerManager\Repositories\EmployerRepository;
use Illuminate\Http\Request;
use Flash;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;

class EmployerController extends AppBaseController
{
    /** @var EmployerRepository $employerRepository*/
    private $employerRepository;

    public function __construct(EmployerRepository $employerRepo)
    {
        $this->employerRepository = $employerRepo;
    }

    /**
     * Display a listing of the Employer.
     */
    public function index(Request $request)
    {
        $employers = $this->employerRepository->paginate(10);

        return view('employermanager::employers.index')
            ->with('employers', $employers);
    }

    /**
     * Show the form for creating a new Employer.
     */
    public function create()
    {  
        $employers = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'super-admin');
            }
        )->get();
        return view('employermanager::employers.create', compact('employers'));
    }

    /**
     * Store a newly created Employer in storage.
     */
    public function store(CreateEmployerRequest $request)
    {
        $input = $request->all();
        $input['created_by'] =  \Auth::user()->id;

        $employer = $this->employerRepository->create($input);

        Flash::success('Employer saved successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Display the specified Employer.
     */
    public function show($id)
    {
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employermanager::employers.show')->with('employer', $employer);
    }

    /**
     * Show the form for editing the specified Employer.
     */
    public function edit($id)
    {
        $employer = $this->employerRepository->find($id);
        $employers = User::whereHas(
            'roles', function ($q) {
                $q->where('name', 'super-admin');
            }
        )->get();

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employermanager::employers.edit', compact('employers'))->with('employer', $employer);
    }

    /**
     * Update the specified Employer in storage.
     */
    public function update($id, UpdateEmployerRequest $request)
    {
        $employer = $this->employerRepository->find($id);
        $employer['updated_by'] =  \Auth::user()->id;
        $employer->save();

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $employer = $this->employerRepository->update($request->all(), $id);

        Flash::success('Employer updated successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Remove the specified Employer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employer = $this->employerRepository->find($id);
        $employer['deleted_by'] = \Auth::user()->id;
        $employer->save();

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $this->employerRepository->delete($id);

        Flash::success('Employer deleted successfully.');

        return redirect(route('employers.index'));
    }

    public function employees(Request $request, $id)
    {

        $employer = $this->employerRepository->find($id);
        $employees = Employee::where('employer_id', '=', $employer->id)->paginate(10);
       
        return view('employermanager::employers.employee', compact('employer', 'employees'));
    }
    
}
