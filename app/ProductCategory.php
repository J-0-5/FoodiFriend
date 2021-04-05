<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductCategory extends Model
{
    protected $table = 'product_category';

    protected $fillable = ['name', 'commerce_id', 'description', 'state'];

    public $timestamps = false;

    public function getCommerce()
    {
        return $this->belongsTo(Commerce::class, 'commerce_id');
    }

    public function scopeName($query, $name)
    {
        if (trim($name) != null) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
    }

    public function scopeCommerceId($query, $id)
    {
        if (trim($id) != null) {
            $query->where('commerce_id', $id);
        }
    }

    public function scopeState($query, $state)
    {
        if (trim($state) != null) {
            $query->where('state', $state);
        }
    }

    public function scopeFilterByCommerce($query)
    {
        if (Auth::user()->id != 1) {
            $query->where('commerce_id', Auth::user()->getCommerce->id);
        }
    }
}
