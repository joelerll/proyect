<?php

use Illuminate\Database\Seeder;

class Video extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 200;
        $this->command->info("Creating {$count} Videos.");
        factory(App\Video::class, $count)->create();
        $this->command->info('Videos Created!');
    }
}
