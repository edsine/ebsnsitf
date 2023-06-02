<?php

namespace Modules\WorkflowEngine\Repositories;

use Modules\WorkflowEngine\Models\FormField;
use App\Repositories\BaseRepository;

class FormFieldRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'form_id',
        'field_name',
        'field_type_id',
        'field_label',
        'field_options',
        'is_required'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FormField::class;
    }
}
