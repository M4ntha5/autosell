<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    protected $table = 'models';

    public static function getAllBrandModels($id)
    {
        $data = Models::where('brand_id', $id)->get();
        return response()->json($data);
    }
}
