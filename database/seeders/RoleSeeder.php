<?php

namespace Database\Seeders;

use App\Models\RoleModel;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'Admin'],
            ['id' => 2, 'name' => 'Manager'],
            ['id' => 3, 'name' => 'Teacher'],
            ['id' => 4, 'name' => 'Student'],
            ['id' => 5, 'name' => 'Parent'],
            ['id' => 6, 'name' => 'Course Creator'],
        ];
        foreach ($roles as $key => $values){
            RoleModel::firstOrCreate(
                [
                    'id'         => $roles[$key]['id'],
                ],
                [
                    'name'       => $roles[$key]['name']
                ]
            );
        }
    }
}
