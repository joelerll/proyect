<?php

use Illuminate\Database\Seeder;

class Questions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 500;
        $this->command->info("Creating {$count} Question.");
        $users = factory(App\Question::class, $count)->create();
        $this->command->info('Question Created!');
    }
}
