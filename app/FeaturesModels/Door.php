<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    protected $table = 'number_of_doors';

    public static function getAllDoorTypes()
    {
        $data = Door::all();
        return response()->json($data);
    }
}
