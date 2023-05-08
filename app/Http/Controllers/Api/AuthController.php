<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\medical_record;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request){

        $attributes = $request->validate([
            'email'    => 'required|string|email',
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($attributes)) {
            return  [
                'message' => 'credentials not matched'
            ];
        }

        $token = auth()->user()->createToken('user-token')->plainTextToken;

        $patient = Patient::find(auth()->user()->userable_id);

        $response = [
            'patient'  => new UserResource($patient),
            'token' => $token
        ];

        return response($response, 201);

    }

    public function register(Request $request){

        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'famillyName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'wilaya' => ['required','string','max:255'],
            'commune' =>  ['required','string','max:255'],
            'phone' => ['required','digits_between:9,10'],
            'insurance_number' => ['required', 'numeric']
        ]);

        
        if($request->avatar){

            $base64Image = explode(";base64,", $request->avatar);

            $explodeImage = explode("image/", $base64Image[0]);

            $imageType = $explodeImage[1];

            $image_base64 = base64_decode($base64Image[1]);

            $name = 'users/' . $attributes['name'] . '_'. $attributes['famillyName'] . '.' . $imageType;

            Storage::disk('public')->put($name, $image_base64);

            // $file = base64_decode($request->avatar);

            // $name = 'users/' . $attributes['name'] . '_'. $attributes['famillyName'] . '.' . $file->extension();

            // $file->storePubliclyAs('Public', $name);

            $attributes['avatar'] = $name;

        }

        $patient = Patient::create([
            'insurance_number' => $attributes['insurance_number']
        ]);

        $user = User::create([
            'name' => $attributes['name'],
            'famillyName' => $attributes['famillyName'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['password']),
            'wilaya' => $attributes['wilaya'],
            'commune' => $attributes['commune'],
            'phone' => $attributes['phone'],
            'userable_id' => $patient->id,
            'userable_type' => Patient::class,
            'avatar' => $attributes['avatar'] ?? null
        ]);

        medical_record::create([
            "patient_id" => $patient->id
        ]);

        $token = $user->createToken('user-token')->plainTextToken;

        $patient = Patient::find($patient->id);

        $response = [
            'patient'  => new UserResource($patient),
            'token' => $token
        ];

        return response($response, 201);

    }
    public function logout(){

        auth()->user()->tokens()->delete();
        
        return [
            'message' => 'User logged out'
        ];

    }
}
