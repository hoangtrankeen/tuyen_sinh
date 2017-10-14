<?php

use Illuminate\Database\Seeder;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('permissions')->insert([
    		'name' => 'Administer roles & permissions',
    		'guard_name' => 'web',
    	]);

    	DB::table('permissions')->insert([
    		'name' => 'Edit Student',
    		'guard_name' => 'web',
    	]);

    	DB::table('permissions')->insert([
    		'name' => 'Edit Post',
    		'guard_name' => 'web',
    	]);

    	DB::table('permissions')->insert([
    		'name' => 'Edit Menu',
    		'guard_name' => 'web',
    	]);
    	DB::table('permissions')->insert([
    		'name' => 'Edit Category',
    		'guard_name' => 'web',
    	]);
    }
}
