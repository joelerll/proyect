<?php

use Illuminate\Database\Seeder;

class Answers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 500;
        $this->command->info("Creating {$count} Answers.");
        $users = factory(App\Answer::class, $count)->create();
        $this->command->info('Answers Created!');
    }
}
