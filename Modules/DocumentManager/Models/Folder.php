<?php

namespace Modules\DocumentManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="Folder",
 *      required={"name"},
 *      @OA\Property(
 *          property="name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="parent_folder_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="",
 *          readOnly=true,
 *          nullable=true,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */ class Folder extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'folders';

    public $fillable = [
        'name',
        'description',
        'parent_folder_id',
        'branch_id',
        'department_id'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'parent_folder_id' => 'integer',
        // 'branch_id' => 'integer',
        // 'department_id' => 'integer',
    ];

    public static array $rules = [
        'name' => 'required'
    ];


    public function parentFolder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\DocumentManager\Models\Folder::class, 'parent_folder_id', 'id');
    }

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\branch::class, 'branch_id', 'id');
    }

    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Department::class, 'department_id', 'id');
    }

    public function getAllAncestors()
    {
        $ancestors = [];
        $folder = $this;

        while ($folder->parentFolder) {
            $folder = $folder->parentFolder;
            $ancestors[] = $folder;
        }

        return $ancestors;
    }

    public function getAllAncestorsPath()
    {
        $path = "";
        $folder = $this;

        while ($folder->parentFolder) {
            $folder = $folder->parentFolder;
            $path .= str_replace(' ', '', $folder->name) . "/";
        }

        return $path;
    }
}
