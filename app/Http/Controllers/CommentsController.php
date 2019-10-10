
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Ad;

class CommentsController extends Controller
{

  /*public function __construct()
  {
    $this->middleware('auth:api')->except(['index', 'show']);
  }*/
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
      $comm = Ad::findOrFail($id)->comments;
      return $comm;
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store($id, Request $request)
  {
      //$comment = Comment::create($request->all());
      $user_data = $request->all();
      $data = array_merge($user_data, array('ad_id'=> $id));
      $comment = Comment::where('ad_id', '=', $id)->create($data);
      return response()->json($comment, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  //public function show($id)
  public function show($id, $comment)
  {
      $comm = Comment::where('ad_id', '=', $id)->findOrFail($comment);

      return response()->json($comm);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  //public function update(Request $request, $id)
  public function update($id, $comment, Request $request)
  {
      $comm = Comment::where('ad_id', '=', $id)->findOrFail($comment)->update($request->all());
      $new = Comment::where('ad_id', '=', $id)->findOrFail($comment);
      return response()->json($new, 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id, $comment)
  {
      //$ad = Ad::findOrFail($id);
      $comm = Comment::where('ad_id', '=', $id)->findOrFail($comment);    // padaryt kad nebutu galima trint ne to skelbimo komentus
      $comm->delete();
      return response()->json(null, 204);
  }
}
