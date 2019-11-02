<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Functions extends Model
{

	public static function getAllAdEquipment($ad)
	{
		$equipment = DB::table("equipment")
			->join('features', 'equipment.feature_id', '=', 'features.id')
			->join('ads', 'equipment.ad_id', '=', 'ads.id')
			->select('features.name as features', 'equipment.id','ads.id as ad_id')
			->where('equipment.ad_id', '=', $ad)->get();
		return $equipment;
	}
}
