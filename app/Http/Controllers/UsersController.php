<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

/*  public function login(Request $request)
  {
      $http = new \GuzzleHttp\Client;
      try
      {
          $response = $http->post('http://127.0.0.1:8000/oauth/token', [
              'form_params' => [
                  'grant_type' => 'client_credentials',
                  'client_id' => config('services.passport.client_id'),
                  'client_secret' => config('services.passport.client_secret'),
                  'username' => $request->username,
                  'password' => $request->password,
              ],
          ]);
          return $response->getBody();
      }
      catch (\GuzzleHttp\Exception\BadResponseException $e)
      {
          if ($e->getCode() === 400)
          {
              return response()->json('Invalid Request. Please enter a username or a password.', $e->getCode());
          }
          else if ($e->getCode() === 401)
          {
              return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
          }
          return response()->json('Something went wrong on the server.', $e->getCode());
      }
  }*/



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::join('citys', 'users.city_id', '=', 'citys.id')
                     ->join('countrys', 'users.country_id', '=', 'countrys.id')
                     ->select('users.id', 'users.created_at','users.updated_at',
                              'users.name',
                              'users.email',
                              'citys.name as city',
                              'countrys.name as country')
                     ->orderBy('created_at', 'desc')->paginate(6);


        //orderBy('created_at', 'desc')->paginate(6);
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = User::create($request->all());
      return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $user->update($request->all());
      return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      return response()->json(null, 204);
    }
}
