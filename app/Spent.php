<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Spent extends Model
{
    protected $primaryKey = 'idSpent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idSpent', 'total', 'description', 'spentDate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
