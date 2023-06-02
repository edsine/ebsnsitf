<?php

namespace Modules\WorkflowEngine\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="WorkflowType",
 *      required={"workflow_type"},
 *      @OA\Property(
 *          property="workflow_type",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
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
 */class WorkflowType extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'workflow_types';

    public $fillable = [
        'workflow_type'
    ];

    protected $casts = [
        'workflow_type' => 'string'
    ];

    public static array $rules = [
        'workflow_type' => 'required'
    ];

    
}
