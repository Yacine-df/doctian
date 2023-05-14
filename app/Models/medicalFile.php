<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicalFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, $type){

        $query->when($type ?? false, function($query, $type){

            $query->where('file_type','=', $type);

        });
    

    }


    public function medical_record(){

        return $this->belongsTo(medical_record::class);

    }



}
