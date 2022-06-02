<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\Reminder;
use App\Jobs\remindJob;
use Carbon\Carbon;
use App\Models\Task;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
     //  \App\Console\Commands\Reminder::class,
    //   \App\Console\Commands\CronJob,
       
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */



    protected function schedule(Schedule $schedule)
    {

        // $schedule->call(function(){
        //     \App\Jobs\remindJob::dispatch();
        //  })

      $time = Task::where('remind_time' , now()->format('h:i'))->pluck('remind_time');
      $date = Task::where('remind_date' , now()->format('Y-m-d'))->pluck('remind_date');
       $date->format('d');
        //  $time = Carbon::createFromTimestamp($time);
    
          $cron = $time . ' * ' . ' * ' . ' * ';
    // $cron = '14 12 2 6 *';
         $schedule->job(new remindJob)->timezone('Asia/Damascus')->cron($cron);
        
     
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
