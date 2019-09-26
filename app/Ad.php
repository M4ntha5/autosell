<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['price', 'image','phone_no','description','manufacture_date','fuel',
                            'gearbox','body_type','color','steering_wheels','number_of_doors',
                            'driven_wheels','climate_control','euro_standard','mileage','engine_power',
                            'engine_volume','damage','equipment_id', 'brand_id'];
}
