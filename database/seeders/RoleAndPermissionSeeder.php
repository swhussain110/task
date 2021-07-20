<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //add/edit/delete/list/search
        //Permissions
        Permission::create(['name'=>'add user']);
        Permission::create(['name'=>'edit user']);
        Permission::create(['name'=>'delete user']);
        Permission::create(['name'=>'list user']);
        Permission::create(['name'=>'search user']);

        //Roles Creations and Permissions Assignment
        //admin/employee/support
        $role = Role::Create(['name'=>'Admin']);
        $role->givePermissionTo(['add user', 'edit user','delete user', 'list user', 'search user']);

        $role = Role::Create(['name'=>'Employee']);
        $role->givePermissionTo(['add user', 'edit user','list user', 'search user']);

        $role = Role::Create(['name'=>'Support']);
        $role->givePermissionTo(['list user', 'search user']);


        

    }
}
