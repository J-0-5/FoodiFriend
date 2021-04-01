<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceType extends Model
{
    protected $table = 'commerce_type';

    protected $fillable = ['name', 'state'];

    public $timestamps = false;
}
