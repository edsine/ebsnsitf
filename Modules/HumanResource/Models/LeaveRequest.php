<?php

namespace Modules\HumanResource\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
class LeaveRequest extends Model implements Auditable


{
    use HasFactory;
    use SoftDeletes;
    use AuditingAuditable;
    public $table = 'leave_request';
public $primarykey='id';
    public $fillable = [
        'staff_id',
      'leavetype_id',
        'type',
        'reasons',
       // 'date_last_leave',
        'date_start_new',
        'number_days',
        'home_address',
        'house_number',
      //  'street_name',
        //'district',
        'local_council',
        'state',
        'phone_number',
        'officer_relieve',
        'signature_path',
        'end_date',
        'approve_status',
        'supervisor_office',
        'md_hr',
        'leave_officer',
        'daystaken'

    ];

    protected $cast=[
        'staff_id'=>'integer',
        'type'=>'string',

        //'reasons'=>'string',
        //'date_last_leave'=>'string',
        'date_start_new'=>'string',
        'number_days'=>'string',
        'home_address'=>'string',
        'house_number'=>'string',
        'street_name'=>'string',
        //'district'=>'string',
        'local_council'=>'string',
        'state'=>'string',
        'phone_number'=>'integer',
        'officer_relieve'=>'string',
        'signature_path'=>'string',
        'end_date'=>'string',
        'approve_status'=>'integer',
        'supervisor_office'=>'integer',
        'md_hr'=>'string',
        'leave_officer'=>'string'
    ];
    public static array $rules=[
        // 'reasons'=>'required',
        // 'date_last_leave'=>'required',
        'daystaken'=>'required',
        'number_days'=>'required',
        'date_start_new'=>'required',
        'number_days'=>'required',
        'phone_number'=>'required',
    ];
    

// public function leavetypes(){
//     return $this->belongsTo('Modules\HumanResource\Models\LeaveType','leave_request_id','id'); 
// }

   
public function leavetype(){
    return $this->belongsTo(LeaveType::class,'leavetype_id','id');
}
    public function staff(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\Shared\Models\staff::class, 'staff_id', 'id');
    }
}
