<?php

use Illuminate\Database\Seeder;

class Interest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 6;
        $this->command->info("Creating {$count} Interest.");
        $users = factory(App\Interest::class, $count)->create();
        $this->command->info('Interest Created!');
    }
}
