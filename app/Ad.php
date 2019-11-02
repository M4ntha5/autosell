<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = ['price', 'image','phone_no','description','manufacture_date','mileage','engine_power',
                            'engine_volume','damage_id','fuel_id','gearbox_id','body_type_id','color_id',
                            'steering_wheel_id','number_of_doors_id','driven_wheels_id',
                            'climate_control_id','euro_standard_id','brand_id','user_id', 'model_id'];

    protected $table = 'ads';

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->hasOne('\App\User');
    }

    public static function joinEnumsToAds()
    {
      $ads = Ad::join('damage', 'ads.damage_id', '=', 'damage.id')
               ->join('fuel_types', 'ads.fuel_id', '=', 'fuel_types.id')
               ->join('gearbox_types', 'ads.gearbox_id', '=', 'gearbox_types.id')
               ->join('body_types', 'ads.body_type_id', '=', 'body_types.id')
               ->join('colors', 'ads.color_id', '=', 'colors.id')
               ->join('steering_wheel', 'ads.steering_wheel_id', '=', 'steering_wheel.id')
               ->join('number_of_doors', 'ads.number_of_doors_id', '=', 'number_of_doors.id')
               ->join('driven_wheels', 'ads.driven_wheels_id', '=', 'driven_wheels.id')
               ->join('climate_control', 'ads.climate_control_id', '=', 'climate_control.id')
               ->join('euro_standard', 'ads.euro_standard_id', '=', 'euro_standard.id')
               ->join('brands', 'ads.brand_id', '=', 'brands.id')
               ->join('models', 'ads.model_id', '=', 'models.id')
               ->join('users', 'ads.user_id', '=', 'users.id')
               ->select( 'ads.id','ads.created_at','ads.updated_at',
                         'ads.price',
                         'ads.image',
                         'ads.phone_no',
                         'ads.description',
                         'ads.manufacture_date',
                         'ads.mileage',
                         'ads.engine_power',
                         'ads.engine_volume',
                         'damage.name as damage',
                         'fuel_types.name as fuel',
                         'gearbox_types.name as gearbox',
                         'body_types.name as body_type',
                         'colors.name as color',
                         'steering_wheel.name as steering_wheel',
                         'number_of_doors.name as number_of_doors',
                         'driven_wheels.name as driven_wheels',
                         'climate_control.name as climate_control',
                         'euro_standard.name as euro_standard',
                         'brands.name as brand',
                         'models.name as model',
                         'users.name as user'
                       )
               ->orderBy('created_at', 'desc')->paginate(6);
        return $ads;
    }

    public static function joinEnumsToAd($id)
    {
      $ad = Ad::join('damage', 'ads.damage_id', '=', 'damage.id')
              ->join('fuel_types', 'ads.fuel_id', '=', 'fuel_types.id')
              ->join('gearbox_types', 'ads.gearbox_id', '=', 'gearbox_types.id')
              ->join('body_types', 'ads.body_type_id', '=', 'body_types.id')
              ->join('colors', 'ads.color_id', '=', 'colors.id')
              ->join('steering_wheel', 'ads.steering_wheel_id', '=', 'steering_wheel.id')
              ->join('number_of_doors', 'ads.number_of_doors_id', '=', 'number_of_doors.id')
              ->join('driven_wheels', 'ads.driven_wheels_id', '=', 'driven_wheels.id')
              ->join('climate_control', 'ads.climate_control_id', '=', 'climate_control.id')
              ->join('euro_standard', 'ads.euro_standard_id', '=', 'euro_standard.id')
              ->join('brands', 'ads.brand_id', '=', 'brands.id')
              ->join('models', 'ads.model_id', '=', 'models.id')
              ->join('users', 'ads.user_id', '=', 'users.id')
              ->select( 'ads.id','ads.created_at','ads.updated_at',
                        'ads.price',
                        'ads.image',
                        'ads.phone_no',
                        'ads.description',
                        'ads.manufacture_date',
                        'ads.mileage',
                        'ads.engine_power',
                        'ads.engine_volume',
                        'damage.name as damage',
                        'fuel_types.name as fuel',
                        'gearbox_types.name as gearbox',
                        'body_types.name as body_type',
                        'colors.name as color',
                        'steering_wheel.name as steering_wheel',
                        'number_of_doors.name as number_of_doors',
                        'driven_wheels.name as driven_wheels',
                        'climate_control.name as climate_control',
                        'euro_standard.name as euro_standard',
                        'brands.name as brand',
                        'models.name as model',
                        'users.name as user'
                      )->where('ads.id', '=', $id)->get();
        return $ad;

    }

  /*  function user()
    {
       $this->belongsTo('\Models\User','user_id','id');
    }*/
}
