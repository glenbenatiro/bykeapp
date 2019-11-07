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
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'distance_travelled' => 123,
        ]);

        DB::table('users')->insert([
            'username' => "glenben",
            'password' => bcrypt('09876543'),
            'email' => "glen@gmail.com",
            'phone' => 123456789,
            'first_name' => 'Glen',
            'last_name' => 'Benatiro',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'distance_travelled' => 123,
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09224889195",
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 1,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('instances')->insert([
            'user_id' => 1,
            'bike_id' => 1,
            'station_id' => 2,
            'duration' => 3,
            'totalFare' => 90,
            'isActive' => 0,
            'ended_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'total_distance' => 10,
        ]);
    }
}
