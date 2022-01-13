<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Company_payments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker\Factory::create();
          for($i=0; $i<10; $i++) { DB::table('packages')->insert([
              'name' => $faker->name,
              'price' => $faker->randomNumber(2),

              ]);
              }
              }
    }

