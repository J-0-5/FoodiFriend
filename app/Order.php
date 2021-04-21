<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function getCommerce()
    {
        return $this->belongsTo(Commerce::class, 'commerce_id');
    }

    public function scopeDate($query, $startDate, $endtDate)
    {
        if (trim($startDate) != null && trim($endtDate) != null) {
            $query->whereBetween('created_at', [$startDate, $endtDate]);
        }
    }
    
}

