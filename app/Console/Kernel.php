<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Other commands...
        \App\Console\Commands\SyncCities::class,
        \App\Console\Commands\ClearAllCaches::class,
        \App\Console\Commands\TestQueueSystem::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Process queue jobs every minute
        $schedule->command('queue:work --stop-when-empty --timeout=50')
                 ->everyMinute()
                 ->withoutOverlapping()
                 ->runInBackground();

        // Optional: Clean up failed jobs older than 7 days
        $schedule->command('queue:prune-failed --hours=168')->daily();
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

