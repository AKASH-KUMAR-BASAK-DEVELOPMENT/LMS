<?php

namespace App\Traits;

use Module\Permission\Models\EmployeePermission;
use Module\Permission\Models\Permission;
use Module\Permission\Models\PermissionUser;
use Module\Permission\Models\UserRolePermissionModel;

trait CheckPermission
{

    // permission check from controller
    public function hasAccess($slug)
    {
        if (auth()->getUserId() != 1) {
            $permission = Permission::where('slug', $slug)->first();
            if ($permission) {
                $permission_user = PermissionUser::where('permission_id', $permission->id)->where('user_id', auth()->id())->first();
                $permission_user_role = UserRolePermissionModel::where('permission_id', $permission->id)->where('user_role_id', auth()->user()->role_id)->first();
                if (!$permission_user && !$permission_user_role) {
                    redirect('/')->send();
                }
            } else {
                redirect('/')->send();
            }
        }
    }


    public function hasAccessArray($slugs): array
    {
        $out = array_map(function () {
            return 0;
        }, array_flip($slugs));

        if (auth()->getUserId() != 1) {
            $permission_user = PermissionUser::query()
                ->with(['permission' => function ($q) use ($slugs) {
                    $q->whereIn('slug', $slugs);
                }])
                ->whereHas('permission', function ($q) use ($slugs) {
                    $q->whereIn('slug', $slugs);
                })
                ->where('user_id', auth()->id())
                ->get();

            foreach ($permission_user as $pUser) {
                if (in_array($pUser->permission->slug, $slugs)) {
                    $out[$pUser->permission->slug] = 1;
                }
            }
        } else {
            foreach ($out as &$value) {
                $value = 1;
            }
        }

        return $out;
    }

    // permission check from controller
    public function employeeAccess($slug)
    {

        if (auth()->getUserId() != 1) {
            $permission = EmployeePermission::whereHas('permission', function ($q) use ($slug) {
                $q->where('slug', $slug);
            })->first();

            if (!$permission) {
                redirect('/em')->send();
            }
        }
    }


    public function hasAPIAccess($slug)
    {
        if (auth()->getUserId() != 1) {
            $permission = Permission::where('slug', $slug)->first();
            if ($permission) {
                $permission_user = PermissionUser::where('permission_id', $permission->id)->where('user_id', auth()->id())->first();

                return $permission_user;
                if (!$permission_user) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }



    // public function hasAPIAccessV2($slug){
    //     if (auth()->getUserId() != 1) {
    //         $permission = Permission::where('slug', $slug)->first();
    //         if ($permission) {
    //             $permission_user = PermissionUser::where('permission_id', $permission->id)->where('user_id', auth()->id())->first();

    //             if (!$permission_user) {
    //                 $permission_user = EmployeePermission::whereHas('permission', function($q) use($slug) {$q->where('slug', $slug);})->first();
    //                 if(!$permission_user){
    //                     return false;
    //                 }
    //             }
    //         } else {
    //             return false;
    //         }
    //     }

    //     return true;
    // }
}
