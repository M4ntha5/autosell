<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['price', 'image','phone_no','description','manufacture_date','mileage','engine_power',
                            'engine_volume','damage_id','fuel_id','gearbox_id','body_type_id','color_id',
                            'steering_wheel_id','number_of_doors_id','driven_wheels_id',
                            'climate_control_id','euro_standard_id','brand_id','user_id', 'category_id'];

    protected $table = 'ads';

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
  /*  function user()
    {
       $this->belongsTo('\Models\User','user_id','id');
    }*/
}
