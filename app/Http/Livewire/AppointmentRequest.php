<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentRequest extends Component
{

    public $appointments;

    public function delete($id){
        $appointment = Appointment::find($id);
        $appointment->update([
            'appointment_status' => 'declined'
        ]);
    }

    public function accept($id){
        $appointment = Appointment::find($id);
        $appointment->update([
            'appointment_status' => 'accepted'
        ]);
    }

   

    public function render()
    {
        return view('livewire.appointment-request');
    }
}
