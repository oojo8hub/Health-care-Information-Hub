<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create guides']);
        Permission::create(['name' => 'edit guides']);
        Permission::create(['name' => 'delete guides']);
        Permission::create(['name' => 'publish guides']);

        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'edit nurses']);
        Permission::create(['name' => 'delete nurses']);

        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'edit permissions']);

        Permission::create(['name' => 'create categories']);
        Permission::create(['name' => 'edit categories']);
        Permission::create(['name' => 'delete categories']);

        Permission::create(['name' => 'edit messages']);
        Permission::create(['name' => 'delete messages']);


        // create roles and assign created permissions

        // this can be done as separate statements
        $writer = Role::create([
            'name' => 'writer',
            'system_default' => true,
        ]);
        $writer->givePermissionTo(['create guides']);


        // or may be done by chaining
        $superAdmin = Role::create([
            'name' => 'super admin',
            'system_default' => true,
        ]);


        // assign super admin to user test@test.com
        $user = User::where([
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@test.com'
        ])->first();

        $user->assignRole($superAdmin);

        $user2 = User::where([
            'email' => 'gmacartney@upei.ca'
        ])->first();

        $user2->assignRole($superAdmin);

        // assign admin
        $role = Role::create([
            'name' => 'admin',
            'system_default' => true,
        ]);
//        $users = User::where('email', 'LIKE', '%' . 'upei.ca')->get();
//        $role->users()->attach($users);
    }
}
