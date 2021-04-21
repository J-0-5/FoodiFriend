<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $guarded = [];

    public function getCommerce()
    {
        return $this->belongsTo(Commerce::class, 'commerce_id');
    }

    public function getCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function getOrderDetails()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != null) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
    }

    public function scopeCommerce($query, $id)
    {
        if (trim($id) != null) {
            $query->where('commerce_id', $id);
        }
    }

    public function scopeCategory($query, $id)
    {
        if (trim($id) != null) {
            $query->where('category_id', $id);
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
