<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bike_stations')->insert([
            'lat' => 10.327086,
            'long' => 123.906211,
            'name' => 'IT Park Station 1',
        ]);

        DB::table('bike_stations')->insert([
            'lat' => 10.332005,
            'long' => 123.906350,
            'name' => 'IT Park Station 2',
        ]);

        DB::table('users')->insert([
            'username' => "jari69",
            'password' => bcrypt('09876543'),
            'email' => "jarimesina1234@gmail.com",
            'phone' => 123456789,
            'first_name' => 'Jari',
            'last_name' => 'Mesina',
            'isInvestor'=>0,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'distance_travelled' => 0,
        ]);

        DB::table('users')->insert([
            'username' => "glenben",
            'password' => bcrypt('09876543'),
            'email' => "glen@gmail.com",
            'phone' => 123456789,
            'first_name' => 'Glen',
            'last_name' => 'Benatiro',
            'isInvestor'=>0,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'distance_travelled' => 0,
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 2,
            'isInUse' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09224889195",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 2,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 1,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('perks')->insert([
            'name' => 'Bubble Tea Station - 100 Pesos GC',
            'description' => 'Get a Bubble Tea Station gift certificate worth 100 pesos!',
            'points' => 100,
        ]);

        DB::table('perks')->insert([
            'name' => 'One (1) Ayala Center Malls Movie Ticket',
            'description' => 'Get one movie ticket for Ayala Center Malls for 300 points!',
            'points' => 300,
        ]);

        DB::table('perks')->insert([
            'name' => 'Anjo World Ticket Pass for One Day',
            'description' => 'Get a Bubble Tea Station gift certificate worth 100 pesos!',
            'points' => 500,
        ]);
    }
}
