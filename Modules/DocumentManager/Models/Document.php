<?php

namespace Modules\DocumentManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="Document",
 *      required={"title","description","document_url","folder_id","created_by"},
 *      @OA\Property(
 *          property="title",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="description",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="document_url",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="folder_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="created_by",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
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
 */ class Document extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'documents';

    public $fillable = [
        'title',
        'description',
        'document_url',
        'folder_id',
        'created_by'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'document_url' => 'string',
        'folder_id' => 'integer',
        'created_by' => 'integer'
    ];

    public static array $rules = [
        'title' => 'required',
        'description' => 'required',
        'file' => 'required',
        'folder_id' => 'required',
        // 'created_by' => 'required'
    ];

    public function folder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\DocumentManager\Models\Folder::class, 'folder_id', 'id');
    }

    public function documentVersions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\Modules\DocumentManager\Models\DocumentVersion::class, 'document_id');
    }
}
