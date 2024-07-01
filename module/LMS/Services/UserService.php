<?php

namespace Module\LMS\Services;


use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function insertDefaultUser($company, $role)
    {
        User::insert(
            [
                'name' => 'Mr. Admin',
                'role_Id' => $role->id,
                'email' => $company->email,
                'password' => Hash::make('12345678'),
            ]
        );
    }

    public function storeOrUpdate($request, $id)
    {
        if($id != null){
            if($request->password == '********'){
                User::updateOrCreate(
                    [
                        'id' => $id,
                    ],
                    [
                        'role_id' => $request->role_id,
                        'name' => $request->name,
                    ]
                );
            }
            else{
                User::updateOrCreate(
                    [
                        'id' => $id,
                    ],
                    [
                        'role_id' => $request->role_id,
                        'name' => $request->name,
                        'password' => Hash::make($request->password),
                    ]
                );
            }
        }
        else{
            User::updateOrCreate(
                [
                    'id' => $id,
                ],
                [
                    'role_id' => $request->role_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]
            );
        }
    }
}
