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

        DB::table('bike_stations')->insert([
            'lat' => 10.323346,
            'long' => 123.883717,
            'name' => 'Guadalupe Station 3',
        ]);

        DB::table('bike_stations')->insert([
            'lat' => 10.318447,
            'long' => 123.903656,
            'name' => 'USC Main 4',
        ]);

        DB::table('bike_stations')->insert([
            'lat' => 10.298621,
            'long' => 123.899120,
            'name' => 'USC Main Station 5',
        ]);

        DB::table('bike_stations')->insert([
            'lat' => 10.352461,
            'long' => 123.913819,
            'name' => 'USC-TC Station 6',
        ]);

        DB::table('users')->insert([
            'username' => "admin",
            'password' => bcrypt('09876543'),
            'email' => "admin@gmail.com",
            'phone' => 123456789,
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'isInvestor'=>0,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'distance_travelled' => 0,
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

        DB::table('users')->insert([
            'username' => "royboy",
            'password' => bcrypt('09876543'),
            'email' => "roy@gmail.com",
            'phone' => 123456789,
            'first_name' => 'Roy',
            'last_name' => 'Dalin',
            'isInvestor'=>0,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'distance_travelled' => 0,
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 1,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09224889195",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 1,
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

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 1,
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
            'owner_id' => 1,
            'stations_id' => 2,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 3,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 3,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 3,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 3,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 3,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 4,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 4,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 4,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 4,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 4,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 5,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 5,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 5,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 5,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 5,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 6,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 6,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 6,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 6,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);

        DB::table('bikes')->insert([
            'owner_id' => 1,
            'stations_id' => 6,
            'isInUse' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'contactNumber' => "09233945232",
        ]);
    }
}