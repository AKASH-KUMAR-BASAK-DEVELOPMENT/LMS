<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModuleModel;
use App\Models\PermissionModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use App\Models\SubmoduleModel;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['role'] = RoleModel::find($id);
        $data['modules'] = ModuleModel::get();
        $data['permissions'] = PermissionModel::get();
        $data['role_permissions'] = RolePermissionModel::where('role_id', $id)->pluck('permission_id');
        return view('backend.pages.role.role-access.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            RolePermissionModel::where('role_id', $id)->delete();

            if ($request->permissions){
                for ($i = 0; $i < sizeof($request->permissions); $i++) {
                    RolePermissionModel::create([
                        'permission_id' => $request->permissions[$i],
                        'role_id' => $id,
                    ]);
                }
            }


        } catch (\Exception $ex) {


            return redirect()->back()->withError($ex->getMessage());

        }

        return redirect()->back()->withMessage('Role Permission Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
