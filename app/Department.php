<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function getCities()
    {
        return $this->hasMany(City::class, 'department_id', 'id');
    }
}
