<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth.role:admin');
      $this->middleware('auth.role:admin', ['only' => 'show']);
  }
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
  /* public function store(Request $request)
  {
    $user = User::create($request->all());
    return response()->json($user, 201);
  }*/

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
