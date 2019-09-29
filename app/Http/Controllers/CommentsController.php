<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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
  public function index()
  {
      //$ad = Ad::paginate(15);
      return Comment::all();
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $comment = Comment::create($request->all());
      return response()->json($comment, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  //public function show($id)
  public function show(Comment $comment)
  {
      return $comment;
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  //public function update(Request $request, $id)
  public function update(Request $request, Comment $comment)
  {
    //  $ad = Ad::findOrFail($id);
      $comment->update($request->all());
      return response()->json($comment, 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Comment $comment)
  {
      //$ad = Ad::findOrFail($id);
      $comment->delete();
      return response()->json(null, 204);
  }
}
