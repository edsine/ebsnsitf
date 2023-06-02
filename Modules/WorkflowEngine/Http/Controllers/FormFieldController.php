<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateFormFieldRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateFormFieldRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\FormFieldRepository;
use Illuminate\Http\Request;
use Flash;

class FormFieldController extends AppBaseController
{
    /** @var FormFieldRepository $formFieldRepository*/
    private $formFieldRepository;

    public function __construct(FormFieldRepository $formFieldRepo)
    {
        $this->formFieldRepository = $formFieldRepo;
    }

    /**
     * Display a listing of the FormField.
     */
    public function index(Request $request)
    {
        $formFields = $this->formFieldRepository->paginate(10);

        return view('workflowengine::form_fields.index')
            ->with('formFields', $formFields);
    }

    /**
     * Show the form for creating a new FormField.
     */
    public function create()
    {
        return view('workflowengine::form_fields.create');
    }

    /**
     * Store a newly created FormField in storage.
     */
    public function store(CreateFormFieldRequest $request)
    {
        $input = $request->all();

        $formField = $this->formFieldRepository->create($input);

        Flash::success('Form Field saved successfully.');

        return redirect(route('formFields.index'));
    }

    /**
     * Display the specified FormField.
     */
    public function show($id)
    {
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            Flash::error('Form Field not found');

            return redirect(route('formFields.index'));
        }

        return view('workflowengine::form_fields.show')->with('formField', $formField);
    }

    /**
     * Show the form for editing the specified FormField.
     */
    public function edit($id)
    {
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            Flash::error('Form Field not found');

            return redirect(route('formFields.index'));
        }

        return view('workflowengine::form_fields.edit')->with('formField', $formField);
    }

    /**
     * Update the specified FormField in storage.
     */
    public function update($id, UpdateFormFieldRequest $request)
    {
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            Flash::error('Form Field not found');

            return redirect(route('formFields.index'));
        }

        $formField = $this->formFieldRepository->update($request->all(), $id);

        Flash::success('Form Field updated successfully.');

        return redirect(route('formFields.index'));
    }

    /**
     * Remove the specified FormField from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            Flash::error('Form Field not found');

            return redirect(route('formFields.index'));
        }

        $this->formFieldRepository->delete($id);

        Flash::success('Form Field deleted successfully.');

        return redirect(route('formFields.index'));
    }
}
