<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class addressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for ($y = 0; $y <= 100; $y++) {
            $this->command->info("Generating 10.000 addresses (batch " . $y . ")");

            for ($x = 0; $x <= 10000; $x++) {
                DB::table('address')->insert([
                    'street' => $faker->word . 'straat',
                    'number' => $faker->numberBetween(1, 100),
                    'suffix' => $faker->randomLetter(),
                    'postalcode' => $faker->numberBetween(1000,
                            9999) . strtoupper($faker->randomLetter() . $faker->randomLetter()),
                    'city' => $faker->city,
                    'country' => $faker->country,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

        }
    }
}


