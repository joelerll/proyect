<?php

use Illuminate\Database\Seeder;

class CourseInterest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 50;
        $this->command->info("Creating {$count} CourseInterest.");
        $users = factory(App\CourseInterest::class, $count)->create();
        $this->command->info('CourseInterest Created!');
    }
}
