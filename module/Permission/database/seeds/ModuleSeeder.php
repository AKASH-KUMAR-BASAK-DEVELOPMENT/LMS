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
            ['id' => 1, 'name' => 'Dashboard', 'roles' => 'All'],
            ['id' => 2, 'name' => 'Site Configuration', 'roles' => 'All'],
            ['id' => 3, 'name' => 'Banner Configuration', 'roles' => 'All'],
            ['id' => 4, 'name' => 'Slider', 'roles' => 'All'],
            ['id' => 5, 'name' => 'Enrollment', 'roles' => 'All'],
            ['id' => 6, 'name' => 'Courses', 'roles' => 'All'],
            ['id' => 7, 'name' => 'Courses Category', 'roles' => 'All'],
            ['id' => 8, 'name' => 'Courses Level', 'roles' => 'All'],
            ['id' => 9, 'name' => 'Students', 'roles' => 'All'],
            ['id' => 10, 'name' => 'Exams', 'roles' => 'All'],
            ['id' => 11, 'name' => 'Exam Paper', 'roles' => 'All'],
            ['id' => 12, 'name' => 'Quiz', 'roles' => 'All'],
            ['id' => 13, 'name' => 'Quiz Paper', 'roles' => 'All'],
            ['id' => 14, 'name' => 'My Courses', 'roles' => 'Student'],
            ['id' => 15, 'name' => 'My Exams', 'roles' => 'Student'],
            ['id' => 16, 'name' => 'My Quiz', 'roles' => 'Student'],
            ['id' => 17, 'name' => 'Exam Result Sheet', 'roles' => 'Student, Parents'],
            ['id' => 18, 'name' => 'Quiz Result Sheet', 'roles' => 'Student, Parents'],
            ['id' => 19, 'name' => 'LMS Settings', 'roles' => 'All'],
            ['id' => 20, 'name' => 'Partners', 'roles' => 'All'],
            ['id' => 21, 'name' => 'Visitor', 'roles' => 'All'],
            ['id' => 22, 'name' => 'Role', 'roles' => 'All'],
            ['id' => 23, 'name' => 'User', 'roles' => 'All'],
        ];
        foreach ($modules as $key => $values){
            ModuleModel::firstOrCreate(
                [
                    'id'   => $modules[$key]['id'],
                ],
                [
                    'name' => $modules[$key]['name'],
                    'roles' => $modules[$key]['roles'],
                    'status' => 1,
                ]
            );
        }
    }
}
