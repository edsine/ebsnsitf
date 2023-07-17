<?php

namespace Modules\HumanResource\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveType extends Model
{
    use HasFactory;

    public $table ='leave_types';
    public $primaryKey='id';
    protected $fillable = [
        'name',
        'duration'
    ];
    public static array $rules=[
         'name'=>'required',
        'duration'=>'required',
        
    ];
    
    // protected static function newFactory()
    // {
    //     return \Modules\HumanResource\Database\factories\LeaveTypeFactory::new();
    // }
}

