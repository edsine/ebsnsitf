<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $fillable = ['name', 'type', 'value'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
