<?php

use Illuminate\Database\Seeder;

class UsersType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UsersType::class, 3)->create();
        $this->command->info("Creating Users Type");
    }
}
