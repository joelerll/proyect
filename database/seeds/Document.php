<?php

use Illuminate\Database\Seeder;

class Document extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 200;
        $this->command->info("Creating {$count} Document.");
        factory(App\Document::class, $count)->create();
        $this->command->info('Document Created!');
    }
}
