<?php

namespace Modules\DTARequests\Repositories;

use Modules\DTARequests\Models\DTARequests;
use App\Repositories\BaseRepository;
use DB;


class DTARequestsRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'branch_id',
        'user_id',
        'images',
        'regional_manager_status',
        'head_office_status',
        'medical_team_status'
    ];
//DTARequestsRepository
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DTARequests::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }

    public function getByUserId($id)
    {
        return DB::table('dta_requests')->where('user_id', $id)->paginate(10);
    }
}
