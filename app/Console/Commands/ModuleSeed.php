<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleSeed extends Command
{
    protected $signature = 'module:seed {name} {path?}';
    protected $description = 'Command description';

    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->argument('path');
        if ($path == '') {
            $path = $this->ask('Module Name: ');
        }
        $stub = file_get_contents(base_path('app/Console/stubs/seed.stub'));
        $stub = str_replace('classname', $name, $stub);
        $stub = str_replace('ModuleName', $path, $stub);
        $stub = str_replace('Path', $path, $stub);
        $stub = str_replace('SeedName', $name, $stub);
        $dir = "module/$path/database/seeds";
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $this->info("Creating Module $name");
        file_put_contents("$dir/$name.php", $stub);
        $this->info("Created Module $name");
    }
}
