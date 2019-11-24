<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class StatusType extends Model
{
    protected $table = 'status_types';

    public static function getAllStatusTypes()
    {
        $data = StatusType::all();
        return response()->json($data);
    }
}
