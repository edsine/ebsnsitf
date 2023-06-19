<?php

namespace Modules\EmployerManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

 class Employer extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'employers';

    public $fillable = [
        'user_id',
        'ecs_number',
        'company_name',
        'company_email',
        'company_address',
        'company_rcnumber',
        'company_phone',
        'company_localgovt',
        'company_state',
        'business_area',
        'inspection_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'ecs_number' => 'string',
        'company_name' => 'string',
        'company_email' => 'string',
        'company_address' => 'string',
        'company_rcnumber' => 'string',
        'company_phone' => 'string',
        'company_localgovt' => 'string',
        'company_state' => 'string',
        'business_area' => 'string',
        'inspection_status' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    public static array $rules = [
        
    ];

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
