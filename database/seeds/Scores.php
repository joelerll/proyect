<?php

use Illuminate\Database\Seeder;

class Scores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 500;
        $this->command->info("Creating {$count} Score.");
        $users = factory(App\Score::class, $count)->create();
        $this->command->info('Score Created!');
    }
}
