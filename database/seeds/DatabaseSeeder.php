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
            'lat' => 10.3315,
            'long' => 123.9043,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bike_stations')->insert([
            'lat' => 10.331201,
            'long' => 123.905587,
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
            'isUsed' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isUsed' => 1,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isUsed' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isUsed' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 2,
            'isUsed' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bikes')->insert([
            'user_id' => 1,
            'stations_id' => 1,
            'isUsed' => 0,
            'last_maintenance_check' => Carbon::now()->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('sessions')->insert([
            'user_id' => 1,
            'bike_id' => 1,
            'amount' => 100,
            'isPresent' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('sessions')->insert([
            'user_id' => 1,
            'bike_id' => 2,
            'amount' => 200,
            'isPresent' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

    }
}
