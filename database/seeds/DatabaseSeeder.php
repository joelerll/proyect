<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersType::class);
        $this->command->info('UsersType table seeded!');
        $this->call(Users::class);
        $this->command->info('User table seeded!');
        $this->call(Courses::class);
        $this->command->info('Courses table seeded!');
        $this->call(CoursesUsers::class);
        $this->command->info('CoursesUsers table seeded!');
    }
}
