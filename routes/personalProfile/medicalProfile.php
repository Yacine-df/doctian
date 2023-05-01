<?php

use App\Http\Controllers\MedicalProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::get('/medicalProfile',[MedicalProfileController::class,'show'])->name('medicalProfile.show');

    Route::put('/medicalProfile',[MedicalProfileController::class,'update'])->name('medicalProfile.update');

    Route::get('/d/dashboard/patients/a',function(){
        return view("auth.Medical-record-show");
    });

});


?>