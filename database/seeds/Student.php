<?php

use Illuminate\Database\Seeder;

class Student extends Seeder
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
            DB::table('students')->insert([ //,
            	'name' => $faker->name,
            	'email' => $faker->unique()->email,
            	'birth' => $faker->date,
            	'phone' => $faker->phoneNumber,
            	'address' => $faker->city,
                'created_at' => $faker->date,
                'updated_at' => $faker->date,
            	
            	
            ]);
        }
    }
}
