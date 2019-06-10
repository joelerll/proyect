<?php

use Illuminate\Database\Seeder;

class WhyUse extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 10;
        $this->command->info("Creating {$count} WhyUse.");
        factory(App\WhyUse::class, $count)->create();
        $this->command->info('WhyUse Created!');
    }
}
