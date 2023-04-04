<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        
           // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        //   $permissions = [
        //     [
        //         'id'    => 1,
        //         'name' => 'user_management_access',
        //         'guard_name' => 'user_management_access'
        //     ],
        //     [
        //         'id'    => 2,
        //         'name' => 'permission_create',
        //         'guard_name' => 'permission_create'
        //     ],
        //     [
        //         'id'    => 3,
        //         'name' => 'permission_edit',
        //         'guard_name' => 'permission_edit'
        //     ],
        //     [
        //         'id'    => 4,
        //         'name' => 'permission_show',
        //         'guard_name' => 'permission_show'
        //     ],
        //     [
        //         'id'    => 5,
        //         'name' => 'permission_delete',
        //         'guard_name' => 'permission_delete'
        //     ],
        //     [
        //         'id'    => 6,
        //         'name' => 'permission_access',
        //         'guard_name' => 'permission_access'
        //     ],
        //     [
        //         'id'    => 7,
        //         'name' => 'role_create',
        //         'guard_name' => 'role_create'
        //     ],
        //     [
        //         'id'    => 8,
        //         'name' => 'role_edit',
        //         'guard_name' => 'role_edit'
        //     ],
        //     [
        //         'id'    => 9,
        //         'name' => 'role_show',
        //         'guard_name' => 'role_show'
        //     ],
        //     [
        //         'id'    => 10,
        //         'name' => 'role_delete',
        //         'guard_name' => 'role_delete'
        //     ],
        //     [
        //         'id'    => 11,
        //         'name' => 'role_access',
        //         'guard_name' => 'role_access'
        //     ],
        //     [
        //         'id'    => 12,
        //         'name' => 'user_create',
        //         'guard_name' => 'user_create'
        //     ],
        //     [
        //         'id'    => 13,
        //         'name' => 'user_edit',
        //         'guard_name' => 'user_edit'
        //     ],
        //     [
        //         'id'    => 14,
        //         'name' => 'user_show',
        //         'guard_name' => 'user_show'
        //     ],
        //     [
        //         'id'    => 15,
        //         'name' => 'user_delete',
        //         'guard_name' => 'user_delete'
        //     ],
        //     [
        //         'id'    => 16,
        //         'name' => 'user_access',
        //         'guard_name' => 'user_access'
        //     ],
        //     [
        //         'id'    => 17,
        //         'name' => 'product_create',
        //         'guard_name' => 'product_create'
        //     ],
        //     [
        //         'id'    => 18,
        //         'name' => 'product_edit',
        //         'guard_name' => 'product_edit'
        //     ],
        //     [
        //         'id'    => 19,
        //         'name' => 'product_show',
        //         'guard_name' => 'product_show'
        //     ],
        //     [
        //         'id'    => 20,
        //         'name' => 'product_delete',
        //         'guard_name' => 'product_delete'
        //     ],
        //     [
        //         'id'    => 21,
        //         'name' => 'product_access',
        //         'guard_name' => 'product_access'
        //     ],
        //     [
        //         'id'    => 22,
        //         'name' => 'customer_create',
        //         'guard_name' => 'customer_create'
        //     ],
        //     [
        //         'id'    => 23,
        //         'name' => 'customer_edit',
        //         'guard_name' => 'customer_edit'
        //     ],
        //     [
        //         'id'    => 24,
        //         'name' => 'customer_show',
        //         'guard_name' => 'customer_show'
        //     ],
        //     [
        //         'id'    => 25,
        //         'name' => 'customer_delete',
        //         'guard_name' => 'customer_delete'
        //     ],
        //     [
        //         'id'    => 26,
        //         'name' => 'customer_access',
        //         'guard_name' => 'customer_access'
        //     ],
        //     [
        //         'id'    => 27,
        //         'name' => 'agent_create',
        //         'guard_name' => 'agent_create'
        //     ],
        //     [
        //         'id'    => 28,
        //         'name' => 'agent_edit',
        //         'guard_name' => 'agent_edit'
        //     ],
        //     [
        //         'id'    => 29,
        //         'name' => 'agent_delete',
        //         'guard_name' => 'agent_delete'
        //     ],
        //     [
        //         'id'    => 30,
        //         'name' => 'agent_delete',
        //         'guard_name' => 'agent_delete'
        //     ],
        //     [
        //         'id'    => 31,
        //         'name' => 'agent_access',
        //         'guard_name' => 'agent_access'
        //     ],
        //     [
        //         'id'    => 32,
        //         'name' => 'order_create',
        //         'guard_name' => 'order_create'
        //     ],
        //     [
        //         'id'    => 33,
        //         'name' => 'order_show',
        //         'guard_name' => 'order_show'
        //     ],
        //     [
        //         'id'    => 34,
        //         'name' => 'order_show',
        //         'guard_name' => 'order_show'
        //     ],
        //     [
        //         'id'    => 35,
        //         'name' => 'order_delete',
        //         'guard_name' => 'order_delete'
        //     ],
        //     [
        //         'id'    => 36,
        //         'name' => 'order_access',
        //         'guard_name' => 'order_access'
        //     ],
        // ];

        // Permission::create($permissions);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
