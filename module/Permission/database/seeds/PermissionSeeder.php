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
            ['id' => '1', 'name' => 'Web Settings', 'slug' => 'sidebar.web.settings ', 'module_id' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '2', 'name' => 'LMS', 'slug' => 'sidebar.lms', 'module_id' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '4', 'name' => 'Miscellaneous', 'slug' => 'sidebar.miscellaneous', 'module_id' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '5', 'name' => 'Administration', 'slug' => 'sidebar.administration', 'module_id' => '1', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '11', 'name' => 'Dashboard', 'slug' => 'dashboard', 'module_id' => '2', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '21', 'name' => 'Site Configuration', 'slug' => 'site-configuration.edit', 'module_id' => '3', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '31', 'name' => 'Banner', 'slug' => 'banners.edit', 'module_id' => '4', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '41', 'name' => 'Student Enrollment', 'slug' => 'student-enrollments.index', 'module_id' => '5', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '51', 'name' => 'Partners Index', 'slug' => 'partners.index', 'module_id' => '6', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '52', 'name' => 'Partners Create', 'slug' => 'partners.create', 'module_id' => '6', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '61', 'name' => 'Roles Index', 'slug' => 'roles.index', 'module_id' => '7', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '62', 'name' => 'Roles Create', 'slug' => 'roles.create', 'module_id' => '7', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],

            ['id' => '71', 'name' => 'Users Index', 'slug' => 'users.index', 'module_id' => '8', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
            ['id' => '72', 'name' => 'Users Create', 'slug' => 'users.create', 'module_id' => '8', 'created_by' => '1', 'updated_by' => '1', 'created_at' => '2019-12-25 09:58:21', 'updated_at' => '2019-12-25 09:58:21', 'status' => '1'],
        ];
    }

}
