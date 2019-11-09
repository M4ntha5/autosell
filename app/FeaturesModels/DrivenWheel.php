<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrivenWheel extends Model
{
    protected $table = 'driven_wheels';

    public static function getAllDrivenWheels()
    {
        $data = DrivenWheel::all();
        return response()->json($data);
    }
}
