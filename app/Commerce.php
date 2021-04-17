<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
