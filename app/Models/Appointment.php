<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAppointmentTimeAttribute($value)
    {
        return (string)$value.':00:00';
    }

    public function doctor()
    {
      return $this->belongsTo(Doctor::class);  
    }

    public function patient()
    {
      return $this->belongsTo(Patient::class);  
    }
}
