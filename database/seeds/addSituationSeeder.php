<?php

use App\Situation;
use Illuminate\Database\Seeder;

class addSituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Situation::class, 500)->create();
    }
}
