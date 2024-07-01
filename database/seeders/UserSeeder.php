<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'admin' ,   'email' => 'admin@gmail.com',   'password' => '12345678', 'role_id' => '1', 'status' => '1'],
        ];
        foreach ($users as $key => $values){
            User::firstOrCreate(
                [
                    'id'        => $users[$key]['id'],
                ],
                [
                    'name'      => $users[$key]['name'],
                    'email'     => $users[$key]['email'],
                    'password'  => Hash::make($users[$key]['password']),
                    'role_id'   => $users[$key]['role_id'],
                    'status'    => $users[$key]['status']
                ]
            );
        }
    }
}
