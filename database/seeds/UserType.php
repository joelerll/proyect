<?php

use Illuminate\Database\Seeder;

class UserType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserType::class, 3)->create();
        $this->command->info("Creating Users Type");
    }
}
