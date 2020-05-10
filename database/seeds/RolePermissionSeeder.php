<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    protected $roles = [
        'admin',
        'customer',
    ];

    protected $permissions = [
        'edit user',
        'add user',
        'edit role permission',
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermissions();
        $this->createRoles();
    }

    public function createRoles()
    {
        foreach($this->roles as $roleName) {
           $role =  Role::create(['name' => $roleName]);
           foreach($this->permissions as $permission) {
               $role->givePermissionTo($permission);
           }
        }
    }
    public function createPermissions()
    {
        foreach($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

