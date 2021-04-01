<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';

    protected $fillable = ['name', 'commerce_id', 'state'];

    public $timestamps = false;

    public function getCommerce()
    {
        return $this->belongsTo(Commerce::class, 'commerce_id');
    }
}
