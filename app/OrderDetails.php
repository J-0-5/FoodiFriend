<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
