<?php

namespace App\Listeners;

use App\Events\AppointmentTaken;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SendAppointmentTakenNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AppointmentTaken  $event
     * @return void
     */
    public function handle(AppointmentTaken $event)
    {
        DB::table('logs')->insert([
            'user_id' => $event->user->id,
            'activity' => 'You Have taken a '. $event->appointment->appointment_type .' appointment at :' .$event->appointment->appointment_date. " /" .$event->appointment->appointment_time.':00',
            'created_at' => Carbon::now()
        ]);
    }
}
