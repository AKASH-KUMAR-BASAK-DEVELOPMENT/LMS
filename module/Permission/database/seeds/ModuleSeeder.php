<?php

namespace Module\Permission\database\seeds;


use Illuminate\Database\Seeder;
use Module\Permission\Models\ModuleModel;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            ['id' => 1, 'name' => 'Navigations'],
            ['id' => 2, 'name' => 'Dashboard'],
            ['id' => 3, 'name' => 'Site Configuration'],
            ['id' => 4, 'name' => 'Banner'],
            ['id' => 5, 'name' => 'Student Enrollment'],
            ['id' => 6, 'name' => 'Partner'],
            ['id' => 7, 'name' => 'Role'],
            ['id' => 8, 'name' => 'User'],
        ];
        foreach ($modules as $key => $values){
            ModuleModel::firstOrCreate(
                [
                    'id'   => $modules[$key]['id'],
                ],
                [
                    'name' => $modules[$key]['name'],
                    'status' => 1,
                ]
            );
        }
    }
}
