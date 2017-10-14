<?php

use Illuminate\Database\Seeder;

class Course extends Seeder
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
            DB::table('courses')->insert([ //,
            	'name' => $faker->name,
            	'year' => $faker->year($max = 'now'),
            	'exam_date' => $faker->date,
            	'created_by' => $faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
            	'created_at' => $faker->date,
                'updated_at' => $faker->date,
            	
            ]);
        }
    }
}
