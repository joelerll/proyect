<?php

use Illuminate\Database\Seeder;

class UserBankInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 100;
        $this->command->info("Creating {$count} UserBankInfo.");
        $users = factory(App\UserBankInfo::class, $count)->create();
        $this->command->info('UserBankInfo Created!');
    }
}
