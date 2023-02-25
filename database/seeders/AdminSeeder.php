<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            $admin = User::create(array_merge([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]));

            $user = User::create(array_merge([
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]));

            $role_admin = Role::create(['name' => 'admin']);
            $role_user = Role::create(['name' => 'user']);

            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $admin->assignRole('admin');
            $user->assignRole('user');

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
        }


    }
}
