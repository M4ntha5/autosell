<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ad;

class AdsController extends Controller
{

  /*  public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$ads = Ad::orderBy('created_at', 'desc')->paginate(2);
       $ads = Ad::join('damage', 'ads.damage_id', '=', 'damage.id')
                ->join('fuel_types', 'ads.fuel_id', '=', 'fuel_types.id')
                ->join('gearbox_types', 'ads.gearbox_id', '=', 'gearbox_types.id')
                ->join('body_types', 'ads.body_type_id', '=', 'body_types.id')
                ->join('colors', 'ads.color_id', '=', 'colors.id')
                ->join('steering_wheel', 'ads.steering_wheel_id', '=', 'steering_wheel.id')
                ->join('number_of_doors', 'ads.number_of_doors_id', '=', 'number_of_doors.id')
                ->join('driven_wheels', 'ads.driven_wheels_id', '=', 'driven_wheels.id')
                ->join('climate_control', 'ads.climate_control_id', '=', 'climate_control.id')
                ->join('euro_standard', 'ads.euro_standard_id', '=', 'euro_standard.id')
                ->join('brands', 'ads.brand_id', '=', 'brands.id')
                ->join('models', 'ads.model_id', '=', 'models.id')
                ->join('users', 'ads.user_id', '=', 'users.id')
                ->select( 'ads.id','ads.created_at','ads.updated_at',
                          'ads.price',
                          'ads.image',
                          'ads.phone_no',
                          'ads.description',
                          'ads.manufacture_date',
                          'ads.mileage',
                          'ads.engine_power',
                          'ads.engine_volume',
                          'damage.name as damage',
                          'fuel_types.name as fuel',
                          'gearbox_types.name as gearbox',
                          'body_types.name as body_type',
                          'colors.name as color',
                          'steering_wheel.name as steering_wheel',
                          'number_of_doors.name as number_of_doors',
                          'driven_wheels.name as driven_wheels',
                          'climate_control.name as climate_control',
                          'euro_standard.name as euro_standard',
                          'brands.name as brand',
                          'models.name as model',
                          'users.name as user'
                        )
                ->orderBy('created_at', 'desc')->paginate(6);
        return $ads;             // Ad::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exploaded = explode(',',$request->image);
        $decoded = base64_decode($exploaded[1]);

        if(str_contains($exploaded[0], 'jpeg'))
          $extension = 'jpg';
        else
          $extension = 'png';


        $fileName = str_random().'.'.$extension;

        $path = storage_path('app\public\images').'/'.$fileName;

        file_put_contents($path, $decoded);

        $ad = Ad::create($request->except('image') + [
          'image' => $fileName
        ]);
        return response()->json($ad, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show($id)
    {
        $ad = Ad::join('damage', 'ads.damage_id', '=', 'damage.id')
                ->join('fuel_types', 'ads.fuel_id', '=', 'fuel_types.id')
                ->join('gearbox_types', 'ads.gearbox_id', '=', 'gearbox_types.id')
                ->join('body_types', 'ads.body_type_id', '=', 'body_types.id')
                ->join('colors', 'ads.color_id', '=', 'colors.id')
                ->join('steering_wheel', 'ads.steering_wheel_id', '=', 'steering_wheel.id')
                ->join('number_of_doors', 'ads.number_of_doors_id', '=', 'number_of_doors.id')
                ->join('driven_wheels', 'ads.driven_wheels_id', '=', 'driven_wheels.id')
                ->join('climate_control', 'ads.climate_control_id', '=', 'climate_control.id')
                ->join('euro_standard', 'ads.euro_standard_id', '=', 'euro_standard.id')
                ->join('brands', 'ads.brand_id', '=', 'brands.id')
                ->join('models', 'ads.model_id', '=', 'models.id')
                ->join('users', 'ads.user_id', '=', 'users.id')
                ->select( 'ads.id','ads.created_at','ads.updated_at',
                          'ads.price',
                          'ads.image',
                          'ads.phone_no',
                          'ads.description',
                          'ads.manufacture_date',
                          'ads.mileage',
                          'ads.engine_power',
                          'ads.engine_volume',
                          'damage.name as damage',
                          'fuel_types.name as fuel',
                          'gearbox_types.name as gearbox',
                          'body_types.name as body_type',
                          'colors.name as color',
                          'steering_wheel.name as steering_wheel',
                          'number_of_doors.name as number_of_doors',
                          'driven_wheels.name as driven_wheels',
                          'climate_control.name as climate_control',
                          'euro_standard.name as euro_standard',
                          'brands.name as brand',
                          'models.name as model',
                          'users.name as user'
                        )->where('ads.id', '=', $id)->get();
        return $ad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Ad $ad)
    {
      //  $ad = Ad::findOrFail($id);
        $ad->update($request->all());
        return response()->json($ad, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //$ad = Ad::findOrFail($id);
        $ad->delete();
        return response()->json(null, 204);
    }

}
