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

    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}

