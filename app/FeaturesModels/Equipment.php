<?php

namespace App\FeaturesModels;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';

    public static function getAllEquipment($ad_id)
    {
        $data = Equipment::join('features', 'equipment.feature_id', '=', 'features.id')
                        ->select('equipment.id', 'equipment.ad_id','features.name as name')
                        ->where('ad_id', '=', $ad_id)->get();
        return response()->json($data);
    }
}
