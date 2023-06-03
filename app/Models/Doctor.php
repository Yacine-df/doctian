<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];
    
    public function scopeFilter($query, array $filters){

        //inspecting the content of user using whereHas to define additional query on the query builder
        //doctor
        $query->when($filters['doctor'] ?? false, fn($query,$doctor)=>

        $query->whereHas('user', function($query) use($doctor){

            $query->where('name','like','%' . $doctor . '%');

        }));
        //famillyName
        $query->when($filters['famillyName'] ?? false, fn($query,$famillyName)=>

        $query->whereHas('user', function($query) use($famillyName){

            $query->where('famillyname','=', $famillyName);

        }));
        //wilaya
        $query->when($filters['wilaya'] ?? false, fn($query,$wilaya)=>

        $query->whereHas('user', function($query) use($wilaya){

            $query->where('wilaya','=', $wilaya);

        }));
        //seciality
        $query->when($filters['speciality'] ?? false, fn($query, $speciality)=>

            $query->where('speciality','=',$speciality)
            
        );


        }

    public function user(){

        return $this->morphOne(User::class, 'userable');
    }

    public function patients(){

        return $this->belongsToMany(Patient::class, 'doctor_patient');

    }
    public function appointments(){

        return $this->hasMany(Appointment::class);
        
    }
}
