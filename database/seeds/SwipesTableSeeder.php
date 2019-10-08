<?php

use Illuminate\Database\Seeder;
use App\Swipe;

class SwipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Swipe::truncate();
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 1000; $i++) {
            Swipe::create([
                'user_id' => $faker->numberBetween(2,10),
                'distance' => $faker->numberBetween(2,2000),
            ]);
        }
    }
}
