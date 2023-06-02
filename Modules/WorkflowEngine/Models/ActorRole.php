<?php

namespace Modules\WorkflowEngine\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @OA\Schema(
 *      schema="ActorRole",
 *      required={"actor_role"},
 *      @OA\Property(
 *          property="actor_role",
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
 */class ActorRole extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'actor_roles';

    public $fillable = [
        'actor_role'
    ];

    protected $casts = [
        'actor_role' => 'string'
    ];

    public static array $rules = [
        'actor_role' => 'required'
    ];

    
}
