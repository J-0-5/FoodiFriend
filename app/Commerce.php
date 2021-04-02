<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commerce extends Model
{
    protected $table = 'commerce';

    protected $fillable = ['nit', 'user_id', 'name', 'type', 'description', 'state'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getType()
    {
        return $this->belongsTo(CommerceType::class, 'type');
    }

    public function scopeState($query, $state)
    {
        if (trim($state) != null) {
            $query->where('state', $state);
        }
    }
}
