<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';

    protected $fillable = [
        'user_id','bike_id' ,'amount','isActive','total_distance_travelled','time_started','time_ended'
    ];
}
