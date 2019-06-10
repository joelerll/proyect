<?php

use Illuminate\Database\Seeder;

class Testimonies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        $this->command->info("Creating {$count} Testimonies.");
        factory(App\Testimonies::class, $count)->create();
        $this->command->info('Testimonies Created!');
    }
}
