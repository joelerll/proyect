<?php

use Illuminate\Database\Seeder;

class InterestUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 200;
        $this->command->info("Creating {$count} InterestUser.");
        $users = factory(App\InterestUser::class, $count)->create();
        $this->command->info('InterestUser Created!');
    }
}
