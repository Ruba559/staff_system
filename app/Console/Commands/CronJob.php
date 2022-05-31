<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\RemindNotify;
use Illuminate\Support\Facades\Notification;
use App\Models\Task;
use App\Models\User;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $id = Task::where('task_date' , now()->format('Y-m-d'))->pluck('user_id');
        
        $user=  User::find($id);

        Notification::send($user , new RemindNotify());
    }
}
