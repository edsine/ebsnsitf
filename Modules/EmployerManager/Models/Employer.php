<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;

class Employer extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'employers';

    public $fillable = [
        'user_id',
        'ecs_number',
        'company_name',
        'company_email',
        'company_address',
        'company_rcnumber',
        'contact_person',
        'company_localgovt',
        'company_state',
        'business_area',
        'inspection_status',
        'contact_number',
        'cac_reg_year',
        'number_of_employees',
        'status',
        'registered_date',
        'created_by',
        'updated_by',
        'deleted_by',
        'contact_'
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'ecs_number' => 'string',
        'company_name' => 'string',
        'company_email' => 'string',
        'company_address' => 'string',
        'company_rcnumber' => 'string',
        'cac_reg_year' => 'integer',
        'contact_person' => 'string',
        'contact_number' => 'string',
        'company_localgovt' => 'string',
        'number_of_employees' => 'integer',
        'status' => 'string',
        'company_state' => 'string',
        'business_area' => 'string',
        'inspection_status' => 'string',
        'registered_date' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    public static array $rules = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'user_id', 'id');
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'created_by', 'id');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'updated_by', 'id');
    }

    public function deletedBy(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Modules\EmployerManager\Models\User::class, 'deleted_by', 'id');
    }
}
