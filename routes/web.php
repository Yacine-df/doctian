<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\medicalFileController;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

    return view('auth.dashboard.patientDashboard', [
        'activities' => log::where('user_id','=', auth()->user()->id)
        ->orderByDesc('created_at')
        ->get()
    ]);

})->middleware(['auth', 'verified','patient'])->name('patientDashboard');

//doctor
Route::get('/d/dashboard', function () {
    $appointments = Appointment::with(['patient','doctor'])->where('doctor_id','=',auth()->user()->userable_id)->get();
    return view('auth.dashboard.doctorDashboard',compact('appointments'));
})->middleware(['auth', 'verified','doctor'])->name('doctorDashboard');
//doctor
Route::get('/d/dashboard/patients', function () {
    return view('auth.patients.index');
})->middleware(['auth', 'verified','doctor'])->name('patients.index');
//doctor
Route::get('/d/dashboard/patients/a', function () {
    dd('test');
    return view('auth.patients.index');
})->middleware(['auth', 'verified','doctor']);

//doctor
Route::resource('doctors', DoctorController::class)->only([
    'index','show', 'destroy','create','store'
]);

Route::middleware('auth')->group(function(){
        //appointment
        Route::resource('appointments', AppointmentController::class);
        //medicalfiles
        Route::get('/{patient}/medicalfiles',[medicalFileController::class, 'index'])->name('medicalFiles.index');
        Route::post('/{patient}/medicalfiles',[medicalFileController::class, 'store'])->name('medicalFiles.store');
        Route::get('/{patient}/medicalfiles/{medicalFile}/show',[medicalFileController::class, 'show'])->name('medicalFiles.show');
        Route::get('/{patient}/medicalfiles/{medicalFile}/delete',[medicalFileController::class, 'destroy'])->name('medicalFiles.destroy');
        
});

require __DIR__.'/auth.php';
require __DIR__.'/personalProfile/profile.php';
require __DIR__.'/personalProfile/medicalProfile.php';