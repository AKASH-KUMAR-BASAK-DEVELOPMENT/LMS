<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $this->loadMigrationsFrom([
                    base_path() . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . 'LMS' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
            ]);

            $this->loadMigrationsFrom([
                    base_path() . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . 'Permission' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
            ]);
        } catch (\Exception $ex) {
        }
    }
}
