<?php

namespace Modules\EmployerManager\Repositories;

use Modules\EmployerManager\Models\Employer;
use App\Repositories\BaseRepository;

class EmployerRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'user_id',
        'ecs_number',
        'company_name',
        'company_email',
        'company_address',
        'company_rcnumber',
        'company_phone',
        'company_localgovt',
        'company_state',
        'business_area',
        'inspection_status',
        'created_by',
        'updated_by'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Employer::class;
    }
}
