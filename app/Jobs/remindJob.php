<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\RemindNotify;
use Illuminate\Support\Facades\Notification;
use App\Models\Task;
use App\Models\User;

class remindJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $id = Task::where('remind_date' , now()->format('Y-m-d'))->where('remind_time' , now()->format('h:i'))->pluck('user_id');
        
        $user=  User::find($id);

        Notification::send($user , new RemindNotify());
    }
}
