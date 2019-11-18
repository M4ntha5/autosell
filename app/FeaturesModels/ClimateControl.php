<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class ClimateControl extends Model
{
    protected $table = 'climate_control';

    public static function getAllClimateControl()
    {
        $data = ClimateControl::all();
        return response()->json($data);
    }
}
