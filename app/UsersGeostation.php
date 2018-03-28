<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersGeostation extends Model
{
    protected $fillable = [
        'user_id', 'name', 'ip', 'iso_code', 'country', 'city',
        'state', 'state_name', 'postal_code', 'lat', 'lon', 'timezone',
        'continent', 'currency', 'default', 'cached'
    ];
}
