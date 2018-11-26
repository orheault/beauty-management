<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'idReferringClient', 'firstName', 'lastName', 'phoneNumber', 'registrationDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function referringClient(){
        return $this->belongsTo(Client::class, 'idReferringClient')->first();
    }

    public function notes(){
        return $this->hasMany(  'App/Note');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
