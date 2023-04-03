<?php

namespace App\Http\Controllers;


class MedicalProfileController extends Controller
{
    public function show(){
        return view('profile.showMedProfile');
    }
}
