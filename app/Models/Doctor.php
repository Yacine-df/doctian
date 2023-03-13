<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function user(){

        return $this->morphOne('User', 'userable');
    }
    public function patients(){
        return $this->belongsToMany('Patient');
    }
}
