<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'fuel_types';

    public static function getAllFuelTypes()
    {
        $data = Fuel::all();
        return response()->json($data);
    }
}
