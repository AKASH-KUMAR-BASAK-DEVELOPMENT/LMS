<?php

namespace Module\Permission\database\seeds;;


use Illuminate\Database\Seeder;
use Module\Permission\Models\PermissionModel;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getDatas() ?? [] as $permission)
        {
            try {
                PermissionModel::firstOrCreate([
                    'name'                  => $permission['name'],
                    'slug'                  => $permission['slug']
                ], [
                    'id'                    => $permission['id'],
                    'module_id'  => $permission['module_id'],
                    'status'  => 1,
                    'created_by'            => 1,
                    'updated_by'            => 1,
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
    }

    private function getDatas()
    {
        return $permissions = [
            ['id' => '1', 'name' => 'Dashboard', 'slug' => 'dashboard', 'module_id' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '11', 'name' => 'Site Configuration', 'slug' => 'site-configuration.edit', 'module_id' => '2', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '21', 'name' => 'Banner Configuration', 'slug' => 'banners.edit', 'module_id' => '3', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '31', 'name' => 'Create', 'slug' => 'sliders.create', 'module_id' => '4', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '32', 'name' => 'Edit', 'slug' => 'sliders.edit', 'module_id' => '4', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '33', 'name' => 'Index', 'slug' => 'sliders.index', 'module_id' => '4', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '34', 'name' => 'Delete', 'slug' => 'sliders.delete', 'module_id' => '4', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '41', 'name' => 'Create', 'slug' => 'course.create', 'module_id' => '6', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '42', 'name' => 'Edit', 'slug' => 'course.edit', 'module_id' => '6', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '43', 'name' => 'Index', 'slug' => 'course.index', 'module_id' => '6', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '44', 'name' => 'Delete', 'slug' => 'course.delete', 'module_id' => '6', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '51', 'name' => 'Create', 'slug' => 'course-category.create', 'module_id' => '7', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '52', 'name' => 'Edit', 'slug' => 'course-category.edit', 'module_id' => '7', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '53', 'name' => 'Index', 'slug' => 'course-category.index', 'module_id' => '7', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '54', 'name' => 'Delete', 'slug' => 'course-category.delete', 'module_id' => '7', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '61', 'name' => 'Create', 'slug' => 'course-level.create', 'module_id' => '8', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '62', 'name' => 'Edit', 'slug' => 'course-level.edit', 'module_id' => '8', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '63', 'name' => 'Index', 'slug' => 'course-level.index', 'module_id' => '8', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '64', 'name' => 'Delete', 'slug' => 'course-level.delete', 'module_id' => '8', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '71', 'name' => 'Index', 'slug' => 'students.index', 'module_id' => '9', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '81', 'name' => 'Create', 'slug' => 'exams.create', 'module_id' => '10', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '82', 'name' => 'Edit', 'slug' => 'exams.edit', 'module_id' => '10', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '83', 'name' => 'Index', 'slug' => 'exams.index', 'module_id' => '10', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '84', 'name' => 'Delete', 'slug' => 'exams.delete', 'module_id' => '10', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '91', 'name' => 'Index', 'slug' => 'student-exam-enrollments.index', 'module_id' => '11', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '101', 'name' => 'Create', 'slug' => 'quiz.create', 'module_id' => '12', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '102', 'name' => 'Edit', 'slug' => 'quiz.edit', 'module_id' => '12', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '103', 'name' => 'Index', 'slug' => 'quiz.index', 'module_id' => '12', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '104', 'name' => 'Delete', 'slug' => 'quiz.delete', 'module_id' => '12', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '111', 'name' => 'Index', 'slug' => 'student-quiz-enrollments.index', 'module_id' => '13', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '121', 'name' => 'Index', 'slug' => 'my-courses.index', 'module_id' => '14', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '131', 'name' => 'Index', 'slug' => 'student-exams.index', 'module_id' => '15', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '141', 'name' => 'Index', 'slug' => 'student-quiz.index', 'module_id' => '16', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '151', 'name' => 'Index', 'slug' => 'student-exam-enrollments.index', 'module_id' => '17', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '161', 'name' => 'Index', 'slug' => 'student-quiz-enrollments.index', 'module_id' => '18', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '171', 'name' => 'LMS Settings', 'slug' => 'lms-settings.index', 'module_id' => '19', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '181', 'name' => 'Create', 'slug' => 'partners.create', 'module_id' => '20', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '182', 'name' => 'Edit', 'slug' => 'partners.edit', 'module_id' => '20', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '183', 'name' => 'Index', 'slug' => 'partners.index', 'module_id' => '20', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '184', 'name' => 'Delete', 'slug' => 'partners.delete', 'module_id' => '20', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '191', 'name' => 'Index', 'slug' => 'visitors.delete', 'module_id' => '21', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '192', 'name' => 'Block', 'slug' => 'visitors-ip-block', 'module_id' => '21', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '201', 'name' => 'Create', 'slug' => 'role.create', 'module_id' => '22', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '202', 'name' => 'Edit', 'slug' => 'role.edit', 'module_id' => '22', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '203', 'name' => 'Index', 'slug' => 'role.index', 'module_id' => '22', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '204', 'name' => 'Delete', 'slug' => 'role.delete', 'module_id' => '22', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '211', 'name' => 'Create', 'slug' => 'user.create', 'module_id' => '23', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '212', 'name' => 'Edit', 'slug' => 'user.edit', 'module_id' => '23', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '213', 'name' => 'Index', 'slug' => 'user.index', 'module_id' => '23', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '214', 'name' => 'Delete', 'slug' => 'user.delete', 'module_id' => '23', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '221', 'name' => 'Create', 'slug' => 'dashboard-student-enrollments.create', 'module_id' => '5', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '222', 'name' => 'Index', 'slug' => 'dashboard-student-enrollments.index', 'module_id' => '5', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
        ];
    }

}
