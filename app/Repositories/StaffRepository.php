<?php

namespace App\Repositories;

use Modules\WorkflowEngine\Models\Staff;
use App\Repositories\BaseRepository;

/**
 * Class StaffRepository
 * @package App\Repositories
*/

class StaffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'department_id',
        'branch_id',
        'dash_type',
        'gender',
        'staff_id',
        'region',
        'phone',
        'profile_picture',
        'status',
        'alternative_email',
        'created_by',
        'date_approved',
        'approved_by',
        'security_key',
        'date_modified',
        'modified_by',
        'office_position',
        'position',
        'about_me',
        'total_received_email',
        'total_sent_email',
        'total_draft_email',
        'total_event',
        'my_groups',
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
        return Staff::class;
    }

    public function getByUserId($id)
    {
        return Staff::where('user_id', $id)->first();
    }

}
