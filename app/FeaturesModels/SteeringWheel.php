<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class SteeringWheel extends Model
{
    protected $table = 'steering_wheel';

    public static function getAllSteeringWheels()
    {
        $data = SteeringWheel::all();
        return response()->json($data);
    }
}
