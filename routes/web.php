<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('default');
//switch languages
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);
//Patient
Route::get('/p/dashboard', function () {
    return view('auth.dashboard.patientDashboard');
})->middleware(['auth', 'verified','patient'])->name('patientDashboard');
//doctor
Route::get('/d/dashboard', function () {
    return view('auth.dashboard.doctorDashboard');
})->middleware(['auth', 'verified','doctor'])->name('doctorDashboard');
//doctor
Route::get('/d/dashboard/patients', function () {
    return view('auth.patients');
})->middleware(['auth', 'verified','doctor'])->name('patients.index');
//doctor
Route::get('/d/dashboard/patients/a', function () {
    dd('test');
    return view('auth.patients.index');
})->middleware(['auth', 'verified','doctor']);
//doctor
Route::get('/doctors', function () {
    return view('doctors.index');
});
//doctor
Route::get('/doctors/1', function () {
    return view('doctors.show');
});
Route::middleware('auth')->group(function(){
        //appointment
        Route::resource('appointments', AppointmentController::class);
        Route::get('/files',function(){
            return view('auth.files');
        });
});

require __DIR__.'/auth.php';
require __DIR__.'/personalProfile/profile.php';
require __DIR__.'/personalProfile/medicalProfile.php';