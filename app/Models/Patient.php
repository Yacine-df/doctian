<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    use HasFactory;
    protected $guarded =[];
    protected $with = ['user','medical_record'];

    public function user(){

        return $this->morphOne(User::class, 'userable');
    }
    
    public function doctors(){

        return $this->belongsToMany(Doctor::class)->withTimestamps();

    }

    public function appointments(){

        return $this->hasMany(Appointment::class);

    }
    public function medical_record(){

        return $this->hasOne(medical_record::class);
        
    }
}
