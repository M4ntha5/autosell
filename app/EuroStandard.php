<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EuroStandard extends Model
{
    protected $table = 'euro_standard';

    public static function getAllEuroStnadards()
    {
        $data = EuroStandard::all();
        return response()->json($data);
    }
}
