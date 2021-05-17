<?php

use Illuminate\Database\Seeder;

class FlugTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Flug::class, 50)->create();
    }
}
