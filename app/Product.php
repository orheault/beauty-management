<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'defaultPrice', 'name', 'product_category_id'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

}
