<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'citys';

    public static function getAllCitys($id)
    {
        $data = City::where('country_id', $id)->get();
        return response()->json($data);
    }
}
