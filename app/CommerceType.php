<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceType extends Model
{
    protected $table = 'commerce_type';

    protected $fillable = ['name'];

    public $timestamps = false;
}
