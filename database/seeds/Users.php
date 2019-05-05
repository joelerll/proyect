<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 60;
        // $count = (int)$this->command->ask('How many users do you need ?', 10);
        $this->command->info("Creating {$count} users.");
        $users = factory(App\User::class, $count)->create();
        $this->command->info('Users Created!');
    }
}
