<?php

namespace Modules\DocumentManager\Repositories;

use Modules\DocumentManager\Models\Folder;
use App\Repositories\BaseRepository;

class FolderRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'parent_folder_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Folder::class;
    }

}