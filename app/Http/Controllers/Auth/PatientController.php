<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PatientController extends Controller
{
    public function create(){
        return view('auth.register.patient');
    }
    public function store(Request $request){

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'famillyName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'wilaya' => ['required','string','max:255'],
            'commune' =>  ['required','string','max:255'],
            'phone' => ['required','digits_between:9,10'],
            'insurance_number' => ['required', 'numeric']
        ]);

        $patient = Patient::create([
            'insurance_number' => $request->insurance_number
        ]);

        $user = User::create([
            'name' => $request->name,
            'famillyName' => $request->famillyName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'wilaya' => $request->wilaya,
            'commune' => $request->commune,
            'phone' => $request->phone,
            'userable_id' => $patient->id,
            'userable_type' => Patient::class
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect(RouteServiceProvider::PHOME);
    }
}
