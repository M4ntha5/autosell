<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    public static function getAllColors()
    {
        $data = Color::all();
        return response()->json($data);
    }
}
