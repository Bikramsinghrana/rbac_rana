<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {

        return view('admin.roles.permissions', [
            'roles' => Role::all(),
            'permissions' => Permission::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create(['name' => $request->name]);

        return back()->with('success', 'Role created');
    }

    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions ?? []);
        return back()->with('success', 'Permissions updated successfully');
    }


    public function destroy(Role $role)
    {
        if ($role->name === 'admin') {
            return back()->with('success', 'Admin role cannot be deleted');
        }

        $role->delete();
        return back()->with('success', 'Role deleted');
    }
}
