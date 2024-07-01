<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemSetting extends Command
{
    protected $signature = 'setting:seed';

    protected $description = 'Seeds All HRM Module Tables';

    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'SystemSettingTableSeeder',
        ]);


        $this->info('System setting seeded successfully!');
    }
}
