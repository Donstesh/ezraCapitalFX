<?php

namespace App\Jobs;

use App\Models\Profit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GenerateProfitJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Generate a random profit/loss between -120.00 and 211.87
        $profitLoss = round(mt_rand(-12000, 21187) / 100, 2);

        // Create a record in the 'profits' table
        Profit::create([
            'user_id' => $this->userId,
            'profit_loss' => $profitLoss,
            // Add any additional fields that need to be populated
        ]);
    }
}
