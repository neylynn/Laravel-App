<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Qualify extends Model
{
    protected $fillable = [
        'qualify', 
    ];

    public function user()
    {
        return $this->belongsToMany('App\Model\Doctor');
    }
}
