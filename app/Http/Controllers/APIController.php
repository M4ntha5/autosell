<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FeaturesModels\BodyType;
use App\FeaturesModels\Brand;
use App\FeaturesModels\ClimateControl;
use App\FeaturesModels\Color;
use App\FeaturesModels\Damage;
use App\FeaturesModels\Door;
use App\FeaturesModels\DrivenWheel;
use App\FeaturesModels\EuroStandard;
use App\FeaturesModels\Fuel;
use App\FeaturesModels\Gearbox;
use App\FeaturesModels\Models;
use App\FeaturesModels\SteeringWheel;


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
