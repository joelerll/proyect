<?php

use Illuminate\Database\Seeder;

class ContentCourse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 50;
        $this->command->info("Creating {$count} ContentCourse.");
        factory(App\ContentCourse::class, $count)->create();
        $this->command->info('ContentCourse Created!');
    }
}
