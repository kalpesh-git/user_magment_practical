<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;

class doUserInactiveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do-user-inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Those users who have not logged in for 3 days will become inactive.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    { 
        $threeDaysAgo = Carbon::now()->subDays(3); 

        $usersToDisable = User::where('last_login', '<=', $threeDaysAgo)->get(); 

        foreach ($usersToDisable as $user) {
            $user->status = 'disabled';
            $user->save();
        }
    }
}
