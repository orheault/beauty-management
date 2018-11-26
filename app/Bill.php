<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'idClient', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function totalCost()
    {
        return $this->billItems()->sum('price');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function billItems()
    {
        return $this->hasMany(BillItem::class);
    }
}
