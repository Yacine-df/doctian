<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    
    use HasFactory;

    protected $guarded =[];

    public function user(){

        return $this->morphOne('User', 'userable');
    }
    
    public function doctors(){

        return $this->belongsToMany('Doctor');

    }

    public function appointments(){

        return $this->hasMany(Appointment::class);

    }
}
