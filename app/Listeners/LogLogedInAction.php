<?php

namespace App\Listeners;

use App\Events\LogedIn;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogLogedInAction
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
     * @param  \App\Events\LogedIn  $event
     * @return void
     */
    public function handle(LogedIn $event)
    {
        DB::table('logs')->insert([
            'user_id' => $event->user->id,
            'activity' => 'You Have loged In',
            'created_at' => Carbon::now()
        ]);
    }
}
