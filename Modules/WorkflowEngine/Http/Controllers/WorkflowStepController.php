<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateWorkflowStepRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateWorkflowStepRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\WorkflowStepRepository;
use Illuminate\Http\Request;
use Flash;

class WorkflowStepController extends AppBaseController
{
    /** @var WorkflowStepRepository $workflowStepRepository*/
    private $workflowStepRepository;

    public function __construct(WorkflowStepRepository $workflowStepRepo)
    {
        $this->workflowStepRepository = $workflowStepRepo;
    }

    /**
     * Display a listing of the WorkflowStep.
     */
    public function index(Request $request)
    {
        $workflowSteps = $this->workflowStepRepository->paginate(10);

        return view('workflowengine::workflow_steps.index')
            ->with('workflowSteps', $workflowSteps);
    }

    /**
     * Show the form for creating a new WorkflowStep.
     */
    public function create()
    {
        return view('workflowengine::workflow_steps.create');
    }

    /**
     * Store a newly created WorkflowStep in storage.
     */
    public function store(CreateWorkflowStepRequest $request)
    {
        $input = $request->all();

        $workflowStep = $this->workflowStepRepository->create($input);

        Flash::success('Workflow Step saved successfully.');

        return redirect(route('workflowSteps.index'));
    }

    /**
     * Display the specified WorkflowStep.
     */
    public function show($id)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        return view('workflowengine::workflow_steps.show')->with('workflowStep', $workflowStep);
    }

    /**
     * Show the form for editing the specified WorkflowStep.
     */
    public function edit($id)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        return view('workflowengine::workflow_steps.edit')->with('workflowStep', $workflowStep);
    }

    /**
     * Update the specified WorkflowStep in storage.
     */
    public function update($id, UpdateWorkflowStepRequest $request)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        $workflowStep = $this->workflowStepRepository->update($request->all(), $id);

        Flash::success('Workflow Step updated successfully.');

        return redirect(route('workflowSteps.index'));
    }

    /**
     * Remove the specified WorkflowStep from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        $this->workflowStepRepository->delete($id);

        Flash::success('Workflow Step deleted successfully.');

        return redirect(route('workflowSteps.index'));
    }
}
