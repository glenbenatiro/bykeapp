<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeStation extends Model
{
    protected $table ='bike_stations';
     
    protected $fillable = [
        'lat', 'long', 'created_at', 'updated_at',
    ];
}
