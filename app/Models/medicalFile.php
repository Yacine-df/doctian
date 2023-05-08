<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicalFile extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function medical_record(){

        return $this->belongsTo(medical_record::class);

    }

}
