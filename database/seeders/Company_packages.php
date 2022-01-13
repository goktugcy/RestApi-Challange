<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Str;
use DB;
use Carbon\Carbon;
class Company_packages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0; $i<10; $i++) {
        DB::table('packages')->insert([
            'company_id' => rand(1,8),
            'name' => $faker->name,
            'status' => rand(0,1), //0 Pasif 1 Aktif 
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDay(30),
            
        ]);
    }
    }
}
