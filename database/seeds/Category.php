<?php

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	$limit = 5;

    	for ($i = 0; $i < $limit; $i++) {
            DB::table('categories')->insert([ //,
            	'name' => $faker->name,
            	'parent_id' =>'0',
            	'created_by' => '1',
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
            	
            	
            ]);
        }
    }
}
