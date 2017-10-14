<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(User::class);
        $this->call(Role::class);
        $this->call(Permission::class);
        $this->call(Student::class);
        $this->call(Course::class);
        $this->call(Post::class);
        $this->call(Category::class);
    }
}
