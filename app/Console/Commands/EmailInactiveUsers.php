<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\ReminderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class EmailInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'email send to inactive users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    $limit=Carbon::now()->subDay('7');
      $inactive_users= User::where('last_login','<',$limit)->get();

      foreach($inactive_users as $users)
      {
            $users->notify(new ReminderEmail($users));
            $this->info('emil send to '. $users->email);
      }
    }
}
