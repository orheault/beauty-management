<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Client extends Model
{
    protected $primaryKey = 'idClient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idClient', 'idReferringClient', 'firstName', 'lastName', 'phoneNumber', 'registrationDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function referringClient(){
        return $this->hasOne('App/Client', 'idClient');
    }

    public function notes(){
        return $this->hasMany(  'App/Note');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'idBill', 'idBill'); // 'App/Bill'
    }
}
