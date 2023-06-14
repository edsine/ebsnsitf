<?php

namespace Modules\WorkflowEngine\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="Branch",
 *      required={"branch_name","branch_region","branch_code","highest_rank","staff_strength","managing_id","branch_email","branch_phone","branch_address"},
 *      @OA\Property(
 *          property="branch_name",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_region",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="branch_code",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="last_ecsnumber",
 *          description="",
 *          readOnly=false,
 *          nullable=true,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="highest_rank",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="staff_strength",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="managing_id",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="branch_email",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_phone",
 *          description="",
 *          readOnly=false,
 *          nullable=false,
 *          type="string",
 *      ),
 *      @OA\Property(
 *          property="branch_address",
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
 */ class Branch extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'branches';

    public $fillable = [
        'branch_name',
        'branch_region',
        'branch_code',
        'last_ecsnumber',
        'highest_rank',
        'staff_strength',
        'managing_id',
        'branch_email',
        'branch_phone',
        'branch_address'
    ];

    protected $casts = [
        'branch_name' => 'string',
        'branch_region' => 'integer',
        'branch_code' => 'string',
        'last_ecsnumber' => 'string',
        'highest_rank' => 'integer',
        'staff_strength' => 'integer',
        'managing_id' => 'integer',
        'branch_email' => 'string',
        'branch_phone' => 'string',
        'branch_address' => 'string'
    ];

    public static array $rules = [
        'branch_name' => 'required|unique:branches,branch_name',
        'branch_region' => 'required',
        'branch_code' => 'required|unique:branches,branch_code',
        'highest_rank' => 'required',
        'staff_strength' => 'required',
        'managing_id' => 'required',
        'branch_email' => 'required|unique:branches,branch_email',
        'branch_phone' => 'required|unique:branches,branch_phone',
        'branch_address' => 'required'
    ];

    public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'managing_id', 'id');
    }
}