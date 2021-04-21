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

<<<<<<< HEAD
    public function scopeDate($query, $startDate, $endtDate)
    {
        if (trim($startDate) != null && trim($endtDate) != null) {
            $query->whereBetween('created_at', [$startDate, $endtDate]);
        }
    }
    
=======
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
>>>>>>> 8f203a33159b8ce8cd5f73af0e48287a1aaf293b
}

