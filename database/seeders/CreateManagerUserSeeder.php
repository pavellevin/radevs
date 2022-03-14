<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Radevs Manager',
            'email' => 'admin_manager@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $role = Role::create(['name' => 'Manager']);

        $permissions = Permission::where('id', 7)->pluck('id','id');

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
