<?php

namespace App\Http\Controllers;

use App\Events\UpadateMedicalRecord;
use App\Http\Requests\MedicalRecordRequest;
use App\Models\medical_record;
use App\Models\Patient;

class MedicalProfileController extends Controller
{
    public function show(){
        return view('profile.showMedProfile');
    }
    public function update(MedicalRecordRequest $request){

        $validated = $request->safe()->except(['date_of_birth']);

        Patient::where('id','=', auth()->user()->userable_id)
        ->update($request->safe()->only(['date_of_birth']));

        medical_record::where('patient_id','=', auth()->user()->userable_id)
        ->update($validated);

        event(new UpadateMedicalRecord(auth()->user()));

        return back()->with('success', 'profile-updated');
    }
}
