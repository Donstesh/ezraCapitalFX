<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CronCommand extends Command
{
    protected $signature = 'cron:run';
    protected $description = 'Run scheduled tasks';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Artisan::call('queue:work --queue=default --sleep=3 --tries=3');
    }
}
