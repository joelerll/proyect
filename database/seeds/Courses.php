<?php

use Illuminate\Database\Seeder;

class Courses extends Seeder
{
    public function run()
    {
        $count = 50;
        $this->command->info("Creating {$count} Courses.");
        $users = factory(App\Course::class, $count)->create();
        $this->command->info('Courses Created!');
    }
}
