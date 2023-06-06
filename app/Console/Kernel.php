<?php

namespace App\Console;

use App\Events\AppointmentReminder;
use App\Models\Appointment;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $appointments = Appointment::where('appointment_date', now()->format('Y-m-d'))->get();
            //->where('appointment_status', 'confirmed')
            Log::info('worked inside schedule');
            foreach ($appointments as $appointment) {
                Log::info('worked inside schedule before event');
               event(new AppointmentReminder($appointment));
           }
           
        })->everyMinute();
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
