<?php

namespace Modules\WorkflowEngine\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="FormField",
 *      required={},
 *      @OA\Property(
 *          property="id",
 *          description="",
 *          readOnly=true,
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
 *      ),
 *      @OA\Property(
 *          property="form_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="field_name",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="field_type_id",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="field_label",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="field_options",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="is_required",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */class FormField extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'form_fields';

    public $fillable = [
        'form_id',
        'field_name',
        'field_type_id',
        'field_label',
        'field_options',
        'is_required'
    ];

    protected $casts = [
        'id' => 'integer',
        'form_id' => 'integer',
        'field_name' => 'string',
        'field_type_id' => 'integer',
        'field_label' => 'string',
        'field_options' => 'string',
        'is_required' => 'integer'
    ];

    public static array $rules = [
        
    ];

    public function form(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\WorkflowEngine\Models\Form::class, 'form_id', 'id');
    }

    public function fieldType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\WorkflowEngine\Models\FieldType::class, 'field_type_id', 'id');
    }
}
