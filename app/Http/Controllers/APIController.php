<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BodyType;
use App\Brand;
use App\ClimateControl;
use App\Color;
use App\Damage;
use App\Door;
use App\DrivenWheel;
use App\EuroStandard;
use App\Fuel;
use App\Gearbox;
use App\Models;
use App\SteeringWheel;



class APIController extends Controller
{

    public function getBodyTypes()
    {
        return BodyType::getAllBodyTypes();
    }


    public function getBrands()
    {
        return Brand::getAllBrands();
    }


    public function getClimateControls()
    {
        return ClimateControl::getAllClimateControl();
    }


    public function getColors()
    {
        return Color::getAllColors();
    }


    public function getDamages()
    {
        return Damage::getAllDamages();
    }


    public function getDoors()
    {
        return Door::getAllDoorTypes();
    }



    public function getDrivenWheels()
    {
        return DrivenWheel::getAllDrivenWheels();
    }


    public function getEuroStandard()
    {
        return EuroStandard::getAllEuroStnadards();
    }


    public function getFuelTypes()
    {
        return Fuel::getAllFuelTypes();
    }



    public function getGearboxes()
    {
        return Gearbox::getAllGearboxTypes();
    }


    public function getModels(Request $request)
    {
        return Models::getAllBrandModels($request->brand_id);
    }


    public function getSteeringWheels()
    {
        return SteeringWheel::getAllSteeringWheels();
    }


}
