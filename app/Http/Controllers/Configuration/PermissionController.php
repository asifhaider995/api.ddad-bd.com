<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::paginate(40);
        $roles = Role::all();
        $users = User::select('id', 'first_name', 'last_name', 'email')->take(20)->latest()->get();
        return view('configuration.permissions.index', compact('roles', 'users', 'permissions'));
    }


    public function attachableUsers(Request $request, Permission $permission)
    {
        $users = User::select('id', 'first_name', 'last_name', 'email')
            ->where('first_name', 'like', "%{$request->q}%")
            ->where('last_name', 'like', "%{$request->q}%")
            ->orWhere('email', 'like', "%{$request->q}%")
            ->orWhere('id', 'like', "%{$request->q}%")
            ->latest()
            ->take(20)
            ->get();

        return ['status' => 'Success', 'html' => view('configuration.permissions.partials.users', compact('users', 'permission'))->render()];
    }

    public function attachUser(Request $request, Permission $permission)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $user = User::findOrFail($request->user_id);
        $user->givePermissionTo($permission);


        flash("User attach from permission")->success();
        return back();
    }

    public function detachUser(Request $request, Permission $permission)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $user = User::findOrFail($request->user_id);
        $user->revokePermissionTo($permission);


        flash("User detached from permission")->success();
        return back();
    }



    public function attachableRoles(Request $request, Permission $permission)
    {
        $roles = Role::select('id', 'name')
            ->where('name', 'like', "%{$request->q}%")
            ->latest()
            ->get();

        return [
            'status' => 'Success',
            'html' => view('configuration.permissions.partials.roles', compact('permission','roles'))->render()
        ];
    }

    public function attachRole(Request $request, Permission $permission)
    {
        $request->validate(['role_id' => 'required|exists:roles,id']);
        $role = Role::findOrFail($request->role_id);
        $role->givePermissionTo($permission);


        flash("Role attach from permission")->success();
        return back();
    }


    public function detachRole(Request $request, Permission $permission)
    {
        $request->validate(['role_id' => 'required|exists:roles,id']);
        $role = Role::findOrFail($request->role_id);
        $role->revokePermissionTo($permission);

        flash("Role detached from permission")->success();
        return back();
    }

}
