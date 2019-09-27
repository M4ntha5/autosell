<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['price','phone_no','manufacture_date_from','manufacture_date_to','fuel',
                          'gearbox','body_type','color','steering_wheel','number_of_doors',
                          'driven_wheels','climate_control','euro_standard','mileage','engine_power',
                          'engine_volume','damage', 'brand_id'];
}
