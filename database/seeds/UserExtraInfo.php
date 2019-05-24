<?php

use Illuminate\Database\Seeder;

class UserExtraInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        $this->command->info("Creating {$count} UserExtraInfo.");
        $users = factory(App\UserExtraInfo::class, $count)->create();
        $this->command->info('UserExtraInfo Created!');
    }
}
