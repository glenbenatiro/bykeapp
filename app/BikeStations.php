<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BikeStations extends Model
{
    protected $fillable = [
        'lat','long'
    ];
}
