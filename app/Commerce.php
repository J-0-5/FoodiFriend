<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Commerce extends Model
{
    protected $table = 'commerce';

    protected $fillable = ['nit', 'user_id', 'name', 'type', 'description', 'img', 'state'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getType()
    {
        return $this->belongsTo(CommerceType::class, 'type');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != null) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
    }

    public function scopeType($query, $type)
    {
        if (trim($type) != null) {
            $query->where('type', $type);
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

    public function scopeCity($query, $city)
    {
        if (trim($city) != null) {
            $owners = User::where('city_id', $city)->get(['id']);
            $query->whereIn('user_id', $owners);
        }
    }
}
