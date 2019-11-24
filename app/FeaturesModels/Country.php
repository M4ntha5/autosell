<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countrys';

    public static function getAllCountrys()
    {
        $data = Country::all();
        return response()->json($data);
    }
}
