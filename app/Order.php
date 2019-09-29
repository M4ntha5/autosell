<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['price','phone_no','manufacture_date_from','manufacture_date_to',
                          'engine_power','engine_volume','mileage','damage_id','status_id',
                          'fuel_id','gearbox_id','body_type_id','color_id','steering_wheel_id',
                          'number_of_doors_id','driven_wheels_id','climate_control_id','euro_standard_id', 'brand_id'];
}
