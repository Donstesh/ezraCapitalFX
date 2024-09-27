<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Register your commands here
        \App\Console\Commands\GenerateProfit::class, // Your command
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('profit:generate')->hourly();
    }
    protected function commands()
    {
        // Load the commands in the commands directory
        $this->load(__DIR__.'/Commands');
    }
}

