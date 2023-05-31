<?php

namespace App\Listeners;

use App\Events\AppointmentReminder;
use App\Events\SendVideoChatInformations;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Yasser\Agora\RtcTokenBuilder;
use Illuminate\Support\Str;

class generateVideoChatConf{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info('worked inside schedule before event listener');
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AppointmentReminder  $event
     * @return void
     */
    public function handle(AppointmentReminder $event)
    {
        Log::info('worked until here listener');
        //generate agora configuration for video chat
        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');
        $channelName = Str::random(5);
        $user = null;
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
        $rtcToken = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        event(new SendVideoChatInformations($appID,$rtcToken, $channelName, $event->appointment));
    }
}
