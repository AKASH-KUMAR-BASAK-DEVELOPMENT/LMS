<?php

namespace Module\Permission\database\seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
          ModuleSeeder::class
        );
        $this->call(
            PermissionSeeder::class
        );
    }
}
