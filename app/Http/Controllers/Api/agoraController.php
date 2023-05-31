<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Yasser\Agora\RtcTokenBuilder;

class agoraController extends Controller
{
    public function token(){
        $appID = env('AGORA_APP_ID');
            $appCertificate = env('AGORA_APP_CERTIFICATE');
        
            $channelName = Str::random(5);
            $user = null;
            $role = RtcTokenBuilder::RoleAttendee;
            $expireTimeInSeconds = 3600;
            $currentTimestamp = now()->getTimestamp();
            $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
        
            $rtcToken = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);
            return [
                'token' => $rtcToken,
                'channelName' => $channelName,
                'uid' => auth()->user()->id,
                'appId' => $appID
            ];
    }
}
