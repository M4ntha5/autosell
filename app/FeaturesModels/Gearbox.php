<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class Gearbox extends Model
{
    protected $table = 'gearbox_types';

    public static function getAllGearboxTypes()
    {
        $data = Gearbox::all();
        return response()->json($data);
    }
}
