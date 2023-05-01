<?php

namespace App\Providers;

use App\Events\AppointmentTaken;
use App\Events\LogedIn;
use App\Events\UpadateMedicalRecord;
use App\Listeners\LogLogedInAction;
use App\Listeners\LogRegistrationAction;
use App\Listeners\SendAppointmentTakenNotification;
use App\Listeners\UpdatedMedicalProfileNotificaiton;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            LogRegistrationAction::class
        ],
        LogedIn::class => [
            LogLogedInAction::class
        ],
        AppointmentTaken::class => [
            SendAppointmentTakenNotification::class
        ],
        UpadateMedicalRecord::class => [
            UpdatedMedicalProfileNotificaiton::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
