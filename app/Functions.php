<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Functions extends Model
{
    public function getAllDamageTypes()
    {
      $damage = DB::table("damage")->get();
      return $damage;
    }
}
