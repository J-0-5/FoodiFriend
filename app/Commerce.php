<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $table = 'commerce';

    protected $fillable = ['nit', 'user_id', 'name', 'type', 'description'];
}
