<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker;
use Str;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $faker = Faker\Factory::create();
    for($i=0; $i<10; $i++) { DB::table('users')->insert([
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'company_name' => $faker->company,
        'site_url' => $faker->domainName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password)

        ]);
    }
    }
}
