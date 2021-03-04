<?php

namespace App\Console;

use App\Console\Commands\DeleteReadNotifications;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        DeleteReadNotifications::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:deleteReadNotifications')->everyMinute();

        // $schedule->exec('php artisan command:deleteReadNotifications')
        //     ->timezone('Asia/Baghdad')
        //     ->everyFiveMinutes();

        // $schedule->call(function () {
        //     DB::table('notifications')->where('read_at', '!=', null)->delete();
        // })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

