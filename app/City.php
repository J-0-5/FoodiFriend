<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $fillable = [
        'name', 'department_id'
    ];

    public $timestamps = false;

    public function getDepartament()
    {
        return $this->hasOne(Departament::class, 'id', 'department_id');
    }
}
