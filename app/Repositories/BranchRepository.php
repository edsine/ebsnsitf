<?php

namespace App\Repositories;

use Modules\WorkflowEngine\Models\Branch;
use App\Repositories\BaseRepository;

/**
 * Class BranchRepository
 * @package App\Repositories
*/

class BranchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'branch_name',
        'branch_region',
        'branch_code',
        'last_ecsnumber',
        'highest_rank',
        'staff_strength',
        'managing_id',
        'branch_email',
        'branch_phone',
        'branch_address'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Branch::class;
    }

}
