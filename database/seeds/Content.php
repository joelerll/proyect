<?php

use Illuminate\Database\Seeder;

class Content extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 200;
        $this->command->info("Creating {$count} Content.");
        factory(App\Content::class, $count)->create();
        $this->command->info('Content Created!');
    }
}
