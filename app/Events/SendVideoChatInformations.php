<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendVideoChatInformations implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $token;
    public $appID;
    public $channelName;
    public $appointment;

    public function __construct($appID,$rtcToken, $channelName, $appointment)
    {
        Log::info('worked inside chat infos');
        $this->token = $rtcToken;
        $this->appID = $appID;
        $this->channelName = $channelName;
        $this->appointment = $appointment;
        Log::info('worked inside chat infos tttt'. $this->token);
    }

    public function broadcastQueue(): string
{
    return 'default';
}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('appointments.'.$this->appointment->id);
    }
}
