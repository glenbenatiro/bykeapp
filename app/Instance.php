<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    protected $fillable = [
        'user_id', 'bike_id', 'station_id', 'duration', 'total_fare', 'ended_at', 'total_distance',
    ];
}
