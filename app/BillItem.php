<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  BillItem extends Model
{
    protected $primaryKey = 'idBillItem';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idBillItem', 'idBill', 'price', 'description', 'idProduct'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'idProduct', 'idProduct');
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'idBill', 'idBill');
    }
}
