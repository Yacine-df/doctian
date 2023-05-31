<?php
            $appID = env('AGORA_APP_ID');
            $appCertificate = env('AGORA_APP_CERTIFICATE');
        
            $channelName = 'test';
            $user = Auth::user()->id;
            $role = Yasser\Agora\RtcTokenBuilder::RoleAttendee;
            $expireTimeInSeconds = 3600;
            $currentTimestamp = now()->getTimestamp();
            $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;
            $rtcToken = Yasser\Agora\RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- style -->
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/agora.js'])
</head>

<body>

    <h2 class="left-align">Get started with video calling</h2>
    <div class="row">
        <div class="block">
            <button type="button" id="join">Join</button>
            <button type="button" id="leave">Leave</button>
        </div>
    </div>
</body>
