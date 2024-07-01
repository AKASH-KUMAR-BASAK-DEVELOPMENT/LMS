<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Module\Permission\database\seeds\DatabaseSeeder;

class LMSSeed extends Command
{
    protected $signature = 'LMS:seed';

    protected $description = 'LMS Seeding Successfully';

    public function handle()
    {
        Artisan::call('db:seed', ['--class' => DatabaseSeeder::class]);
        $this->info("LMS seeding successfully completed.");
    }
}
