<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'owner_id','stations_id','last_maintenance_check','isInUse' ,'contactNumber'
    ];

    public function instances()
    {
        return $this->hasMany('App\Instance');
    }
}
