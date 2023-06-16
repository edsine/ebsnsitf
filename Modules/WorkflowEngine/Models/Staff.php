<?php

namespace Modules\WorkflowEngine\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

 class Staff extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'staff';

    public $fillable = [
        'user_id',
        'department_id',
        'branch_id',
        'dash_type',
        'gender',
        'staff_id',
        'region',
        'phone',
        'profile_picture',
        'status',
        'alternative_email',
        'created_by',
        'date_approved',
        'approved_by',
        'security_key',
        'date_modified',
        'modified_by',
        'office_position',
        'position',
        'about_me',
        'total_received_email',
        'total_sent_email',
        'total_draft_email',
        'total_event',
        'my_groups',
    ];

    protected $casts = [
        'dep_unit' => 'string',
        'status' => 'integer',
    ];

    /* public static array $rules = [
        'dep_unit' => 'required|unique:departments,dep_unit',
        'status' => 'required',
    ]; */

    /* public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'managing_id', 'id');
    } */
}
