<?php

namespace Modules\DtaReview\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dta_reviews extends Model
{
    use HasFactory;
    //
    public $primarykey='id';
    public $fillable = [
        'dtarequest_id',
        'comments',
        'staff_id',
        'review_status',
        'status'

        
    ];


    
    protected static function newFactory()
    {
        return \Modules\DtaReview\Database\factories\DtaReviewsFactory::new();
    }
}
