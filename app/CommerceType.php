<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceType extends Model
{
    protected $table = 'commerce_type';

    protected $fillable = ['name', 'type_img', 'state'];

    public $timestamps = false;

    public function getCommerces()
    {
        return $this->hasMany(Commerce::class, 'type');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != null) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
    }

    public function scopeState($query, $state)
    {
        if (trim($state) != null) {
            $query->where('state', $state);
        }
    }
    public function scopeDate($query, $startDate, $endtDate)
    {
        if (trim($startDate) != null && trim($endtDate) != null) {
            $query->whereBetween('created_at', [$startDate, $endtDate]);
        }
    }
}
