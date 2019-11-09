<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    public static function getAllBrands()
    {
        $data = Brand::all();
        return response()->json($data);
    }
}
