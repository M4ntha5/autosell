<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $table = 'body_types';

    public static function getAllBodyTypes()
    {
        $data = BodyType::all();
        return response()->json($data);
    }
}
