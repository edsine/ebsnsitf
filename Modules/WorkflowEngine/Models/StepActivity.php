<?php

namespace Modules\WorkflowEngine\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="StepActivity",
 *      required={"step_activity"},
 *      @OA\Property(
 *          property="step_activity",
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
 */class StepActivity extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'step_activities';

    public $fillable = [
        'step_activity'
    ];

    protected $casts = [
        'step_activity' => 'string'
    ];

    public static array $rules = [
        'step_activity' => 'required'
    ];

    
}
