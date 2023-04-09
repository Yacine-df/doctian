<?php

namespace App\Listeners;

use App\Events\Registered;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered as EventsRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogRegistrationAction
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
     * @param  \App\Events\Registered  $event
     * @return void
     */
    public function handle(EventsRegistered $event)
    {
        DB::table('logs')->insert([
            'user_id' => $event->user->id,
            'activity' => 'You Have registered',
            'created_at' => Carbon::now()
        ]);
    }
}
