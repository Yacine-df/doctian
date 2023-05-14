<?php

namespace App\Http\Controllers;

use App\Models\medicalFile;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class medicalFileController extends Controller
{
    public function index(){
        //get all medical files that belongs to the current patient's medical record then pass this query builder
        // throw a filter function (query scope within the model) this method will perform additional queries
        $medicalFiles = medicalFile::where('medical_record_id','=', auth()->user()->userable->medical_record->id)
        ->filter(request()->query('type'))
        ->get();
        return view('auth.files', compact('medicalFiles'));

    }
    public function store(Request $request, Patient $patient){
        
        $attributes = $request->validate([
            'file_name'  => ['required', 'string'],
            'file_type'  => ['required', 'string'],
        ]);
        
        if(! $request->hasFile('file_input')){
            return back();
        }

        $file = $request->file('file_input');

        $name = 'users/'. auth()->user()->userable_id . '/' . uniqid() . '.' .  $file->extension();

        $file->storeAs('medicalRecords', $name, 'private');

        $attributes['file_url'] = $name;

        $patient->medical_record->medicalFiles()->create($attributes);
        
        return back()->with('success', 'file stored successfully');
    }

    public function show($p, $medicalFile){

        $file = medicalFile::findOrfail($medicalFile);

        $url = env('APP_URL') . Storage::url('private/medicalRecords/'.$file->file_url);

        return redirect($url);
    }

    public function destroy($p, $medicalFile){

        $file = medicalFile::findOrfail($medicalFile);

        Storage::delete('private/medicalRecords/'.$file->file_url);

        $file->delete();

        return back()->with('success', 'file deleted');
    }
}
