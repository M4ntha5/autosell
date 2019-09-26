<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['manufacture_date', 'price', 'fuel', 'gearbox', 'body_type', 'color', 'run','engine_power',
                            'engine_volume','phone_no', 'description', 'image', 'brand_id', 'defects'];
}
