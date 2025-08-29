<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->command('medication:reminder')->everyMinute(); // Or everyFiveMinutes()
    // }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('medication:reminder')
            ->everyMinute() // For testing, change to your desired frequency in production
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/medication_reminder.log'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
