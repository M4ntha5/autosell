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
      /*  $this->validate($request, [
          'image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('image'))
        {
          $fileNameWithExt = $request->file('image')->getClientOriginalName();
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          $extension = $request->file('image')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;
          $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else
        {
          $fileNameToStore = 'noimage.jpg';
        }




        $ad = new Ad;
        $ad->price = $request->input('price');
        $ad->phone_no = $request->input('phone_no');
        $ad->description = $request->input('description');
        $ad->manufacture_date = $request->input('manufacture_date');
        $ad->mileage = $request->input('mileage');
        $ad->engine_power = $request->input('engine_power');
        $ad->engine_volume = $request->input('engine_volume');
        $ad->damage_id = $request->input('damage_id');
        $ad->fuel_id = $request->input('fuel_id');
        $ad->gearbox_id = $request->input('gearbox_id');
        $ad->body_type_id = $request->input('body_type_id');
        $ad->color_id = $request->input('color_id');
        $ad->steering_wheel_id = $request->input('steering_wheel_id');
        $ad->number_of_doors_id = $request->input('number_of_doors_id');
        $ad->driven_wheels_id = $request->input('driven_wheels_id');
        $ad->climate_control_id = $request->input('climate_control_id');
        $ad->euro_standard_id = $request->input('euro_standard_id');
        $ad->brand_id = $request->input('brand_id');
        $ad->model_id = $request->input('model_id');
        $ad->user_id = $request->input('user_id');
        $ad->image = $fileNameToStore;
        $ad->save();*/

        $ad = Ad::create($request->all());
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

  /*  public function getFuelTypes()
    {
      $types = DB::table('fuel_types')->get();
      return $types;
    }*/
}
