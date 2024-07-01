<?php

namespace Module\LMS\Services;

use App\Models\RoleModel;
use Illuminate\Http\Request;

class RoleService
{
    public function insertDefaultRole($company)
    {
        $role = RoleModel::updateOrCreate(
            [
                'id' => null
            ],
            [
                'name' => 'admin',
            ]
        );
        return $role;
    }

    public function storeOrUpdate(Request $request)
    {
        RoleModel::updateOrCreate(
            [
                'id' => null
            ],
            [
                'name' => $request->name,
            ]
        );
    }
}
