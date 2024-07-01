<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class ProjectDeploy extends Command
{



    protected $signature = 'app:release';



    protected $description = 'Project Deploy Process After Install Composer';





    public function handle()
    {

        Artisan::call('migrate:fresh');
        $this->info('Fresh Migration Successfully!');



        Artisan::call('db:seed');
        $this->info('Seed Successfully!');



        Artisan::call('permission:seed');
        $this->info('Permission Seed Successfully!');



        Artisan::call('migrate');
        $this->info('Migration Successfully Again!');



        // Artisan::call('hospital:seed');
        // $this->info('Hospital Seed Successfully!');
    }
}
