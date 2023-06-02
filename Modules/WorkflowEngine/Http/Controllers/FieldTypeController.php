<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateFieldTypeRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateFieldTypeRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\FieldTypeRepository;
use Illuminate\Http\Request;
use Flash;

class FieldTypeController extends AppBaseController
{
    /** @var FieldTypeRepository $fieldTypeRepository*/
    private $fieldTypeRepository;

    public function __construct(FieldTypeRepository $fieldTypeRepo)
    {
        $this->fieldTypeRepository = $fieldTypeRepo;
    }

    /**
     * Display a listing of the FieldType.
     */
    public function index(Request $request)
    {
        $fieldTypes = $this->fieldTypeRepository->paginate(10);

        return view('field_types.index')
            ->with('fieldTypes', $fieldTypes);
    }

    /**
     * Show the form for creating a new FieldType.
     */
    public function create()
    {
        return view('field_types.create');
    }

    /**
     * Store a newly created FieldType in storage.
     */
    public function store(CreateFieldTypeRequest $request)
    {
        $input = $request->all();

        $fieldType = $this->fieldTypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fieldTypes.singular')]));

        return redirect(route('fieldTypes.index'));
    }

    /**
     * Display the specified FieldType.
     */
    public function show($id)
    {
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            Flash::error(__('models/fieldTypes.singular').' '.__('messages.not_found'));

            return redirect(route('fieldTypes.index'));
        }

        return view('field_types.show')->with('fieldType', $fieldType);
    }

    /**
     * Show the form for editing the specified FieldType.
     */
    public function edit($id)
    {
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            Flash::error(__('models/fieldTypes.singular').' '.__('messages.not_found'));

            return redirect(route('fieldTypes.index'));
        }

        return view('field_types.edit')->with('fieldType', $fieldType);
    }

    /**
     * Update the specified FieldType in storage.
     */
    public function update($id, UpdateFieldTypeRequest $request)
    {
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            Flash::error(__('models/fieldTypes.singular').' '.__('messages.not_found'));

            return redirect(route('fieldTypes.index'));
        }

        $fieldType = $this->fieldTypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fieldTypes.singular')]));

        return redirect(route('fieldTypes.index'));
    }

    /**
     * Remove the specified FieldType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            Flash::error(__('models/fieldTypes.singular').' '.__('messages.not_found'));

            return redirect(route('fieldTypes.index'));
        }

        $this->fieldTypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fieldTypes.singular')]));

        return redirect(route('fieldTypes.index'));
    }
}
