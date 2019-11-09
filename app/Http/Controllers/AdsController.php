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

class AdsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth.role:admin', ['except' => 'store']);
    $this->middleware('auth.role:user', ['except' => 'index', 'destroy']);
  }
  

  /**
   * Register a new user
   */
  /* public function signUp(Request $request)
  {    
    InputHelper::inputChecker(
      $request,
      [ 
          $request->email,
          $request->password
      ],

      function (Request $request) 
      {
          User::create($request);            
          return ResponseHelper::jsonResponse(null, Response::HTTP_OK, config('messages.success'))->send();
      });
  }*/
    /**
   * Login user and return a token
   */
  /* public function login(Request $request)
  {
    $token = $this->guard($request->email, $request->password);
    if ($token) 
    {
        return ResponseHelper::jsonResponse(null, Response::HTTP_OK, config('messages.success'))->header('Authorization', $token)->send();
    } 
    else 
    {
        return ResponseHelper::jsonResponse(null, Response::HTTP_BAD_REQUEST, config('messages.fail'))->send();
    }
  }*/
  /**
   * Return auth guard
   */
  /* private function guard($username, $password)
  {
      return Auth::guard('user')->attempt(array('email' => $email, 'password' => $password));
  }
  */


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      // $ads = Ad::orderBy('created_at', 'desc')->paginate(2);

    $ads = Ad::joinEnumsToAds();
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

      $ad = Ad::create($request->except('image') + [
        'image' => $fileName
      ]);
      return response()->json($ad, 201);
    }
    else
    {
      $ad = Ad::create($request->all());
      return response()->json($ad, 201);
    }

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
      $ad = Ad::joinEnumsToAd($id);

      $eq = Functions::getAllAdEquipment($id);
      //$ad1 = array_merge($ad, $eq);
      
      return (new AdCollection($ad))->additional(['equipment' => $eq]);  //$ad;
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
