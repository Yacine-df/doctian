<?php

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('testChannel', function () {
    return true;
});
Broadcast::channel('appointments.{appointmentId}', function (User $user, int $appointmentId) {
    //return (int)$user->id === (int)Appointment::findOrFail($appointmentId)->patient->user->id || (int)$user->id === (int)Appointment::findOrFail($appointmentId)->doctor->user->id;
    return true;
});