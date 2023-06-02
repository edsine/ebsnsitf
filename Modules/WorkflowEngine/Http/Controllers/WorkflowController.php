<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateWorkflowRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateWorkflowRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\WorkflowRepository;
use Illuminate\Http\Request;
use Flash;

class WorkflowController extends AppBaseController
{
    /** @var WorkflowRepository $workflowRepository*/
    private $workflowRepository;

    public function __construct(WorkflowRepository $workflowRepo)
    {
        $this->workflowRepository = $workflowRepo;
    }

    /**
     * Display a listing of the Workflow.
     */
    public function index(Request $request)
    {
        $workflows = $this->workflowRepository->paginate(10);

        return view('workflowengine::workflows.index')
            ->with('workflows', $workflows);
    }

    /**
     * Show the form for creating a new Workflow.
     */
    public function create()
    {
        return view('workflowengine::workflows.create');
    }

    /**
     * Store a newly created Workflow in storage.
     */
    public function store(CreateWorkflowRequest $request)
    {
        $input = $request->all();

        $workflow = $this->workflowRepository->create($input);

        Flash::success('Workflow saved successfully.');

        return redirect(route('workflows.index'));
    }

    /**
     * Display the specified Workflow.
     */
    public function show($id)
    {
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        return view('workflowengine::workflows.show')->with('workflow', $workflow);
    }

    /**
     * Show the form for editing the specified Workflow.
     */
    public function edit($id)
    {
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        return view('workflowengine::workflows.edit')->with('workflow', $workflow);
    }

    /**
     * Update the specified Workflow in storage.
     */
    public function update($id, UpdateWorkflowRequest $request)
    {
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        $workflow = $this->workflowRepository->update($request->all(), $id);

        Flash::success('Workflow updated successfully.');

        return redirect(route('workflows.index'));
    }

    /**
     * Remove the specified Workflow from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            Flash::error('Workflow not found');

            return redirect(route('workflows.index'));
        }

        $this->workflowRepository->delete($id);

        Flash::success('Workflow deleted successfully.');

        return redirect(route('workflows.index'));
    }
}
