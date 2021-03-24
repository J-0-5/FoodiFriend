<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';
    
    protected $fillable = ['name','commerce_id'];

    //public $timestamps = false;
}
