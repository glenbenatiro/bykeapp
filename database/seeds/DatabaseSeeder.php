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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bike_stations')->insert([
            'lat' => 10.332005,
            'long' => 123.906350,
            'name' => 'IT Park Station 2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
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
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09224889195",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 1,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('sessions')->insert([
            'user_id' => 1,
            'bike_id' => 1,
            'amount' => 100,
            'isActive' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('sessions')->insert([
            'user_id' => 1,
            'bike_id' => 2,
            'amount' => 200,
            'isActive' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
