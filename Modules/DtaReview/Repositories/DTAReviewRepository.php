<?php

namespace Modules\DTAReview\Repositories;

use Modules\DTAReview\Models\DTAReview;
use App\Repositories\BaseRepository;

class DTAReviewRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'dtarequest_id',
        'comments',
        'staff_id',
        'review_status',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return DTAReview::class;
    }

    public function findByBranch($branch_id)
    {
        $query = $this->model->newQuery();

        return $query->where('branch_id', $branch_id)->get();
    }
}
