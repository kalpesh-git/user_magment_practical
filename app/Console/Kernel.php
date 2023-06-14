<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        Commands\doUserInactiveCommand::class,
    ];

    protected function schedule(Schedule $schedule)
    { 
        $schedule->command('do-user-inactive')->daily()->at('12:00'); 
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
