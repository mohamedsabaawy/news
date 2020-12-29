<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =\Spatie\Permission\Models\Role::create([
            'name'=>'مدير'
        ]);
        $premission = Permission::all();
        $admin->givePermissionTo($premission);
        $user = User::create([
            'name' =>'mohamed',
            'email' =>'1@g.com',
            'password' =>bcrypt('12345678'),
        ]);
        $user->assignRole($admin);
    }
}
