<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
          try {
                $items = DB::table('elections')->get();
                foreach ($items as $key => $item) {
                      $dateTime = \Carbon\Carbon::parse($item->confirmDate);
                      $schedule->command('confirmRegister:sendingMail '. $item->id)
                               ->cron('* * ' . (int)$dateTime->format('d') . ' '. (int)$dateTime->format('m') .' *');
                }

          } catch (\Exception $e) {
                \Log::error("errros ". $e->getMessage(). " Line " . $e->getLine());
          }


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
