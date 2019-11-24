<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;
use App\User;
use App\Functions;
use App\Http\Resources\AdCollection;
use App\Http\Helpers\InputHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Helpers\ResponseHelper;
use Illuminate\Support\Facades\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

class AdsController extends Controller
{
    //kazkodel per konstruktoriu neveiki, tad padariau per api routes faila
    public function __construct()
    {
        $this->middleware('auth.role:admin,user')->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $ads = Ad::joinEnumsToAds();
        return $ads;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'price' => 'required|integer|min:1',
            'phone_no' => 'required|string',
            'manufacture_date' => 'required|date|date_format:Y-m-d',
            'mileage' => 'required|integer|min:1',
            'engine_power' => 'required|integer|min:1',
            'engine_volume' => 'required|integer|min:1',
            'damage_id' => 'required|integer|min:1',
            'fuel_id' => 'required|integer|min:1',
            'gearbox_id' => 'required|integer|min:1',
            'body_type_id' => 'required|integer|min:1',
            'color_id' => 'required|integer|min:1',
            'steering_wheel_id' => 'required|integer|min:1',
            'number_of_doors_id' => 'required|integer|min:1',
            'driven_wheels_id' => 'required|integer|min:1',
            'climate_control_id' => 'required|integer|min:1',
            'euro_standard_id' => 'required|integer|min:1',
            'brand_id' => 'required|integer|min:1',
            'model_id' => 'required|integer|min:1'
        ]);

        $ad =  Ad::storeAd($request);
        return $ad;
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::joinEnumsToAd($id);
        $eq = Functions::getAllAdEquipment($id);
        return (new AdCollection($ad))->additional(['equipment' => $eq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $this->validate($request, [
            'price' => 'required|integer|min:1',
            'phone_no' => 'required|string',
            'manufacture_date' => 'required|date|date_format:Y-m-d',
            'mileage' => 'required|integer|min:1',
            'engine_power' => 'required|integer|min:1',
            'engine_volume' => 'required|integer|min:1',
            'damage_id' => 'required|integer|min:1',
            'fuel_id' => 'required|integer|min:1',
            'gearbox_id' => 'required|integer|min:1',
            'body_type_id' => 'required|integer|min:1',
            'color_id' => 'required|integer|min:1',
            'steering_wheel_id' => 'required|integer|min:1',
            'number_of_doors_id' => 'required|integer|min:1',
            'driven_wheels_id' => 'required|integer|min:1',
            'climate_control_id' => 'required|integer|min:1',
            'euro_standard_id' => 'required|integer|min:1',
            'brand_id' => 'required|integer|min:1',
            'model_id' => 'required|integer|min:1'
        ]);

        return Ad::updateAd($request, $ad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        return Ad::deleteAd($ad);
    }

}
