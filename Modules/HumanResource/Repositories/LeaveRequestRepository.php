<?php

namespace Modules\HumanResource\Repositories;

use Modules\HumanResource\Models\LeaveRequest;
use App\Repositories\BaseRepository;
use LeaveRequest as GlobalLeaveRequest;

class LeaveRequestRepository extends BaseRepository
{
     protected $fieldSearchable = [
    // //     'name',
    // //     'description',
    // //     'branch_id',
    // //     'user_id',
    // //     'images',
    // //     'regional_manager_status',
    //      'head_office_status',
    //      'medical_team_status'
     ];
//DTARequestsRepository
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return LeaveRequest::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }
}
