<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate(40);
        $permissions = Permission::all();
        return view('configuration.roles.index', compact('roles', 'permissions'));
    }

    public function attachablePermissions(Request $request, Role $role)
    {
        $permissions = Permission::select('id', 'name')
            ->where('name', 'like', "%{$request->q}%")
            ->latest()
            ->get();

        return [
            'status' => 'Success',
            'html' => view('configuration.roles.partials.permissions', compact('role','permissions'))->render()
        ];
    }

    public function attachPermission(Request $request, Role $role)
    {
        $request->validate(['permission_id' => 'required|exists:permissions,id']);
        $permission = Permission::findOrFail($request->permission_id);
        $permission->assignRole($role);


        flash("Permission attach to role")->success();
        return back();
    }


    public function detachPermission(Request $request, Role $role)
    {
        $request->validate(['permission_id' => 'required|exists:permissions,id']);
        $permission = Permission::findOrFail($request->permission_id);
        $permission->removeRole($role);

        flash("Permission detached from role")->success();
        return back();
    }

}
