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

    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
