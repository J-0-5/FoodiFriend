<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterValue extends Model
{
    protected $table = 'parameter_value';

    protected $fillable = [
        'typeParameter',
        'value'
    ];

    public $timestamps = false;
}
