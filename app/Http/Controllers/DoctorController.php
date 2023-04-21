<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //this will filter doctors based on user table
        $doctors = Doctor::with('user')
            ->filter(request(['doctor', 'speciality', 'wilaya']))
            ->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register.doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'famillyName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'wilaya' => ['required','string','max:255'],
            'commune' =>  ['required','string','max:255'],
            'phone' => ['required','digits_between:9,10'],
            'address' => ['required', 'string'],
            'speciality' => ['required','string']
        ]);
        $doctor = Doctor::create([
            'speciality' => $request->speciality
        ]);

        $user = User::create([
            'name' => $request->name,
            'famillyName' => $request->famillyName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'wilaya' => $request->wilaya,
            'commune' => $request->commune,
            'phone' => $request->phone,
            'userable_id' => $doctor->id,
            'userable_type' => Doctor::class
        ]);

        Auth::login($user);

        event(new Registered($user));

        return redirect(RouteServiceProvider::DHOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $doctor = Doctor::with('user')->filter()->get();

        $doctor = Doctor::find($id);

        if($doctor == NULL){

            return abort(404, 'Not found');

        }

        return view("doctors.show", compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
