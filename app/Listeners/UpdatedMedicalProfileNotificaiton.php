<?php

namespace App\Listeners;

use App\Events\UpadateMedicalRecord;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UpdatedMedicalProfileNotificaiton
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
     * @param  \App\Events\UpadateMedicalRecord  $event
     * @return void
     */
    public function handle(UpadateMedicalRecord $event)
    {
        DB::table('logs')->insert([
            'user_id' => $event->user->id,
            'activity' => 'Your medical record has been updated',
            'created_at' => Carbon::now()
        ]);
    }
}
