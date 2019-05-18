<?php

use Illuminate\Database\Seeder;

class CoursesUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 300;
        // $count = (int)$this->command->ask('How many users do you need ?', 10);
        $this->command->info("Creating {$count} CourseUser.");
        $users = factory(App\CourseUser::class, $count)->create();
        $this->command->info('CourseUser Created!');
    }
}
