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
    public function __construct()
    {
        $this->middleware('auth.role:admin', ['except' => ['index', 'show']]);
        $this->middleware('auth.role:user', ['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::getAllAds();
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
        /*$ad =  Ad::storeAd($request);
        return $ad;*/

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

          //getting user for user_id on ad
          $user = JWTAuth::parseToken()->toUser();
    
          $ad = Ad::create($request->except('image', 'user_id') + [
            'image' => $fileName,
            'user_id' => $user->id
          ]);
          return response()->json($ad, 201);
        }
        else
        {
          //$ad = Ad::create($request->all());

          $user = JWTAuth::parseToken()->toUser();
          $ad = Ad::create($request->except('user_id') + [
            'user_id' => $user->id
          ]);
          return response()->json($ad, 201);
        }
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
