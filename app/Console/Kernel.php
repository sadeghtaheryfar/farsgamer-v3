<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Form;
use App\Models\AdminForm;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         Commands\SetCronJobsCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
		$schedule->call(function () {
            $forms = Form::where('cron',Form::DAILY)->get();
			foreach ($forms as $form) {
				$phones = explode(',',$form->users);
				foreach ($phones as $phone) {
					$user = User::where('mobile',$phone)->first();
					$user->forms()->create([
						'form_title' => $form->title,
						'form_id' => $form->id,
						'status' => AdminForm::PENDING,
						'form_cron' => $form->cron_title,
					]);
				}
			}
        })->everyMinute();

		$schedule->call(function () {
            $forms = Form::where('cron',Form::WEEKLY)->get();
			foreach ($forms as $form) {
				$phones = explode(',',$form->users);
				foreach ($phones as $phone) {
					$user = User::where('mobile',$phone)->first();
					$user->forms()->create([
						'form_title' => $form->title,
						'form_id' => $form->id,
						'status' => AdminForm::PENDING,
						'form_cron' => $form->cron_title,
					]);
				}
			}
        })->weeklyOn(Schedule::FRIDAY,'00:00');

		$schedule->call(function () {
            $forms = Form::where('cron',Form::MOUNTLY)->get();
			foreach ($forms as $form) {
				$phones = explode(',',$form->users);
				foreach ($phones as $phone) {
					$user = User::where('mobile',$phone)->first();
					$user->forms()->create([
						'form_title' => $form->title,
						'form_id' => $form->id,
						'status' => AdminForm::PENDING,
						'form_cron' => $form->cron_title,
					]);
				}
			}
        })->monthlyOn(29,'00:00');


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
