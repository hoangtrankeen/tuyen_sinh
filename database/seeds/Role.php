<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('roles')->insert([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Editor',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Manager',
            'guard_name' => 'web',
        ]);
    }
}
