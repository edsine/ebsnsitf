<?php

namespace Modules\DocumentManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="DocumentVersion",
 *      required={"version_number","document_id","document_url","created_by"},
 *      @OA\Property(
 *          property="version_number",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="document_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="document_url",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
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
 */ class DocumentVersion extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $table = 'document_versions';

    public $fillable = [
        'version_number',
        'document_id',
        'document_url',
        'created_by'
    ];

    protected $casts = [
        'version_number' => 'integer',
        'document_id' => 'integer',
        'document_url' => 'string',
        'created_by' => 'integer'
    ];

    public static array $rules = [
        'version_number' => 'required',
        'document_id' => 'required',
        'document_url' => 'required',
        'created_by' => 'required'
    ];
}
