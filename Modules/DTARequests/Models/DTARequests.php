<?php

namespace Modules\DTARequests\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

 class DTARequests extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'dta_requests';

    public $fillable = [
        'id',
        'dta_id',
        'staff_id',
        'branch_id',
        'department_id',
        'purpose_travel',
        'destination',
        'number_days',
        'travel_date',
        'arrival_date',
        'estimated_expenses',
        'supervisor_status',
        'hod_status',
        'md_status',
        'account_status',
        'approval_status',
        'status',
        'uploaded_doc',
    ];

    // protected $casts = [
    //     'name' => 'string',
    //     'description' => 'string',
    //     'branch_id' => 'integer',
    //     'user_id' => 'integer'
    // ];

    public static array $rules = [
        'purpose_travel' => 'required',
        'travel_date' => 'required',
        'destination' => 'required',
        'arrival_date' => 'required',
        'uploaded_doc' => 'required',

    ];

    public function branch(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\Branch::class, 'branch_id', 'id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}