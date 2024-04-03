<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Form;
use App\Models\AdminForm;
use App\Models\User;

class SetCronJobsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';


    /**
     * Execute the console command.
     *
     * @return int
     */

    public function __construct()
    {
        parent::__construct();
    } 

    public function handle()
    {
       
        return 0;
    }
}
