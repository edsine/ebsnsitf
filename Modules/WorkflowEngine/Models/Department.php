<?php

namespace Modules\WorkflowEngine\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

 class Department extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use AuditingAuditable;
    public $table = 'departments';

    public $fillable = [
        'department_unit',
        'status',
    ];

    protected $casts = [
        'department_unit' => 'string',
        'status' => 'integer',
    ];

    public static array $rules = [
        'department_unit' => 'required|unique:departments,department_unit',
        'status' => 'required',
    ];

    /* public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'managing_id', 'id');
    } */
}
