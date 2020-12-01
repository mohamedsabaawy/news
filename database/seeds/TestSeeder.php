<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'category index'
        ]);
    }
}
