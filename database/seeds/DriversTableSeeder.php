<?php

use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drivers')->insert([
            'name' => str_random(10),
            'lastn1' => str_random(10),
            'lastn2' => str_random(10),
            'curp' => str_random(18),
            'license' => str_random(10),
            'phone' => str_random(10),
            'address' => str_random(10),
            'user_id' => '1'
        ]);
    }
}
