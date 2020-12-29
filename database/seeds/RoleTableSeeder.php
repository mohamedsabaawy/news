<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
          'مدير',
          'مشرف',
          'كاتب',
          'محرر',
        ];

        foreach ($role as $item){
            \Spatie\Permission\Models\Role::create([
               'name' => $item
            ]);
        }
    }
}
