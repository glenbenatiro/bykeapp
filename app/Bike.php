<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'owner','use_count' ,'last_maintenance_check','station_id'
    ];

}
