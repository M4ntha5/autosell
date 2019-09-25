<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['date', 'fuel', 'gearbox', 'body_type', 'color', 'run','engine_power',
                            'engine_volume','leather_seats', 'heating_seats', 'webasto', 'electric_windows', 'heating_steering',
                          'alarm', 'cd_player', 'increased_engine_power', 'fog_lights', 'esp', 'aloy_wheels',
                        'phone', 'price', 'description', 'image', 'brand_id'];
}
