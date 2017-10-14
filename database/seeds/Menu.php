<?php

use Illuminate\Database\Seeder;

class Menu extends Seeder
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
            DB::table('menus')->insert([ //,
            	'name' => $faker->name,
            	'slug' => $faker->slug,
            	
            	'url' => '/something',
            	'status' => $faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt'),
            	'parent_id' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
            	'order' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
            	'created_by' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
            	'created_at' => $faker->date,
            	'updated_at' => $faker->date,
            ]);
        }
    }
}
