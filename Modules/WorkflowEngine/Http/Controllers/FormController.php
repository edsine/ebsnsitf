<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateFormRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateFormRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\FormRepository;
use Illuminate\Http\Request;
use Flash;
use Modules\WorkflowEngine\Repositories\WorkflowRepository;

class FormController extends AppBaseController
{
    /** @var FormRepository $formRepository*/
    private $formRepository;

    /** @var WorkflowRepository $workflowRepository*/
    private $workflowRepository;

    public function __construct(FormRepository $formRepo, WorkflowRepository $workflowRepo)
    {
        $this->formRepository = $formRepo;
        $this->workflowRepository = $workflowRepo;
    }

    /**
     * Display a listing of the Form.
     */
    public function index(Request $request)
    {
        $forms = $this->formRepository->paginate(10);

        return view('workflowengine::forms.index')
            ->with('forms', $forms);
    }

    /**
     * Show the form for creating a new Form.
     */
    public function create()
    {
        $workflows = $this->workflowRepository->all()->pluck('workflow_name', 'id');
        $workflows->prepend('Select workflow', '');
        return view('workflowengine::forms.create')->with('workflows', $workflows);
    }

    /**
     * Store a newly created Form in storage.
     */
    public function store(CreateFormRequest $request)
    {
        $input = $request->all();

        $form = $this->formRepository->create($input);

        Flash::success('Form saved successfully.');

        return redirect(route('forms.index'));
    }

    /**
     * Display the specified Form.
     */
    public function show($id)
    {
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            Flash::error('Form not found');

            return redirect(route('forms.index'));
        }

        return view('workflowengine::forms.show')->with('form', $form);
    }

    /**
     * Show the form for editing the specified Form.
     */
    public function edit($id)
    {
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            Flash::error('Form not found');

            return redirect(route('forms.index'));
        }

        $workflows = $this->workflowRepository->all()->pluck('workflow_name', 'id');
        $workflows->prepend('Select workflow', '');
        return view('workflowengine::forms.edit')->with(['form' => $form, 'workflows' => $workflows]);
    }

    /**
     * Update the specified Form in storage.
     */
    public function update($id, UpdateFormRequest $request)
    {
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            Flash::error('Form not found');

            return redirect(route('forms.index'));
        }

        $form = $this->formRepository->update($request->all(), $id);

        Flash::success('Form updated successfully.');

        return redirect(route('forms.index'));
    }

    /**
     * Remove the specified Form from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            Flash::error('Form not found');

            return redirect(route('forms.index'));
        }

        $this->formRepository->delete($id);

        Flash::success('Form deleted successfully.');

        return redirect(route('forms.index'));
    }
}
