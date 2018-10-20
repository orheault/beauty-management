<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Bill extends Model
{
    protected $primaryKey = 'idBill';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idBill', 'idClient', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    public function billItems()
    {
        return $this->hasMany(BillItem::class, 'idBillItem', 'idBillItem');
    }
}
