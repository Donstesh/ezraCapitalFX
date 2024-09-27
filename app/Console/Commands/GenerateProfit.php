<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Profit; // Assuming you have a Profit model
use App\Models\User; // Assuming you will fetch user details
use Illuminate\Support\Facades\DB; // Use for DB operations
use Illuminate\Support\Str; // For generating unique strings

class GenerateProfit extends Command
{
    protected $signature = 'profit:generate {user_id}';

    protected $description = 'Generate profit or loss for a specific user';

    public function handle()
    {
        // Loop for 24 hours
        for ($i = 0; $i < 24; $i++) {
            // Generate random profit or loss between -200 and +121
            $profitOrLoss = rand(-200, 121);

            // Assuming you want to store the profit in the profits table
            // Replace 'user_id' with the appropriate user ID (you may want to fetch or pass user IDs dynamically)
            DB::table('profits')->insert([
                'user_id' => 1, // Replace with actual user ID logic
                'profit_loss' => $profitOrLoss,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Log the generated profit/loss for debugging
            \Log::info("Generated profit/loss: $profitOrLoss");

            // Wait for 1 hour before generating the next profit/loss
            sleep(3600); // Pause execution for 3600 seconds (1 hour)
        }

        $this->info('Profit generation completed for 24 hours.');
    }
}
