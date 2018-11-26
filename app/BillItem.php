<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  BillItem extends Model
{
    protected $table = 'bill_items';
    protected $fillable = [
        'id', 'bill_id', 'price', 'description', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
