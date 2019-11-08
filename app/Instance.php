<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    public function bike()
    {
        return $this->belongsTo('App\Bike');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'user_id', 'bike_id', 'station_id', 'duration', 'total_fare', 'ended_at', 'total_distance',
    ];
}
