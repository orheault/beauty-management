<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Note extends Model
{
    protected $primaryKey = 'idNote';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idClient', 'description', 'idNote'
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
        return $this->hasOne('App/Client');
    }
}
