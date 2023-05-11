<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name'];

    public function qualify()
    {
        return $this->belongsToMany('App\Model\Qualify');
    }
}
