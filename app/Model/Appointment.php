<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = ['doctor_id','place'];

    public function doctor()
    {
        return $this->belongsTo('App\Model\Doctor', 'doctor_id');
    }
}
