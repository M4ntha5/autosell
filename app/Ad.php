<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class Ad extends Model
{
    protected $fillable = ['price', 'image','phone_no','description','manufacture_date','mileage','engine_power',
                            'engine_volume','damage_id','fuel_id','gearbox_id','body_type_id','color_id',
                            'steering_wheel_id','number_of_doors_id','driven_wheels_id',
                            'climate_control_id','euro_standard_id','brand_id','user_id', 'model_id'];

    protected $table = 'ads';

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->hasOne('\App\User');
    }

    public static function getAllAds()
    {
        return Ad::orderBy('created_at', 'desc')->paginate(6);
    }
    public static function getAllComments($id)
    {
        //return Ad::findOrFail($id)->orderBy('created_at', 'desc')->paginate(6)->comments;
        $comments = Comment::where('comments.ad_id', '=', $id)->orderBy('created_at', 'desc')->paginate(3);
        return $comments;
    }

    public static function deleteAd(Ad $ad)
    {
        $ad->delete();
        return response()->json(null, 204);
    }
    public static function updateAd(Request $request, Ad $ad)
    {
        $ad->update($request->all());
        return response()->json($ad, 200);
    }

    public static function storeAd(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        if($request->image != null)
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
      
            $ad = Ad::create($request->except('image', 'user_id') + [
              'image' => $fileName,
              'user_id' => $user->id
            ]);
            return response()->json($ad, 201);
        }
        else
        {
            $ad = Ad::create($request->except('user_id') + [
              'user_id' => $user->id
            ]);
            return response()->json($ad, 201);
        }
    }

    public static function joinEnumsToAds()
    {
      $ad = Ad::join('fuel_types', 'ads.fuel_id', '=', 'fuel_types.id')
              ->join('gearbox_types', 'ads.gearbox_id', '=', 'gearbox_types.id')
              ->join('body_types', 'ads.body_type_id', '=', 'body_types.id')
              ->join('brands', 'ads.brand_id', '=', 'brands.id')
              ->join('models', 'ads.model_id', '=', 'models.id')
              ->join('users', 'ads.user_id', '=', 'users.id')
              ->select( 'ads.id','ads.created_at','ads.updated_at',
                        'ads.price', 'ads.brand_id','ads.model_id',
                        'ads.image','ads.body_type_id',
                        'ads.gearbox_id','ads.fuel_id',
                        'ads.manufacture_date',
                        'ads.engine_power',
                        'ads.engine_volume',
                        'fuel_types.name as fuel',
                        'gearbox_types.name as gearbox',
                        'body_types.name as body_type',
                        'brands.name as brand',
                        'models.name as model',
                        'users.id as user'
                      )->orderBy('created_at', 'desc')->paginate(6);
        return $ad;
    }
    

    public static function joinEnumsToAd($id)
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
              ->select( 'ads.id', 'ads.user_id','ads.damage_id','ads.color_id',
                        'ads.price', 'ads.brand_id','ads.model_id',
                        'ads.image', 'ads.body_type_id','ads.steering_wheel_id',
                        'ads.phone_no', 'ads.gearbox_id','ads.fuel_id',
                        'ads.description','ads.number_of_doors_id',
                        'ads.manufacture_date','ads.driven_wheels_id',
                        'ads.mileage','ads.climate_control_id',
                        'ads.engine_power','ads.euro_standard_id',
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
                        'users.id as user'
                      )->where('ads.id', '=', $id)->get();
        return $ad;

    }

}
