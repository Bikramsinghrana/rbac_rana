<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return view('admin.roles.permissions', [
        //     'roles' => Role::where('name', '!=', 'admin')->get(),
        //     'permissions' => Permission::all(),
            
        // ]);

        return view('admin.roles.permissions', [
            'roles' => Role::where('name', '!=', 'admin')->get(),
            'permissions' => Permission::where('name', 'like', 'project.%')->get(),
        ]);
    }


    /**
     * Update role permissions
     */
    public function update(Request $request, Role $role)
    {   

        // dd( $request->all());
        $role->syncPermissions($request->permissions ?? []);
        return back()->with('success', 'Permissions updated successfully');
    }

    
}
