<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'owner_id','stations_id','last_maintenance_check','isInUse' ,'contactNumber'
    ];
}
