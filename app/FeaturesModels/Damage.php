<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{

    protected $table = 'damage';

    public static function getAllDamages()
    {
        $data = Damage::all();
        return response()->json($data);
    }
}
