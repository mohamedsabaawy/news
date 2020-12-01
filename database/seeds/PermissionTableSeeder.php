<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
          'role show',
          'role edit',
          'role create',
          'role delete',
          'category show',
          'category edit',
          'category create',
          'category delete',
          'user show',
          'user edit',
          'user create',
          'user delete',
          'post show',
          'post edit',
          'post create',
          'post delete',
        ];

        foreach ($permission as $item){
            Permission::create([
                'name' => $item
            ]);
        }
    }
}
