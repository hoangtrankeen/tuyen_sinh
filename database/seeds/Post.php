<?php

use Illuminate\Database\Seeder;

class Post extends Seeder
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
            DB::table('posts')->insert([ //,
            	'title' => $faker->name,
            	'sub_title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            	'body' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            	'slug' => $faker->slug,
            	'is_published' => $faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt'),
            	'is_featured' => $faker->biasedNumberBetween($min = 0, $max = 1, $function = 'sqrt'),
            	'created_by' => $faker->biasedNumberBetween($min = 0, $max = 3, $function = 'sqrt'),
            	'created_at' => $faker->date,
                'updated_at' => $faker->date,
            	
            ]);
        }
    }
}
