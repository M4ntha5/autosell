<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class Comment extends Model
{
    protected $fillable = ['title','body', 'ad_id', 'user_id'];

    protected $table = 'comments';

    public function ad()
    {
        return $this->hasOne('\App\Ad');
    }

    public static function storeCommentOnAd($id, Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        $user_data = $request->all();
        $data = array_merge($user_data, array('ad_id'=> $id, 'user_id' => $user->id));
        $comment = Comment::where('ad_id', '=', $id)->create($data);
        return response()->json($comment, 201);
    }

    public static function showComment($id, $comment)
    {
        $comment = Comment::where('ad_id', '=', $id)->findOrFail($comment);
        return response()->json($comment);
    }

    public static function updateComment($id, $comment, Request $request)
    {
        $comm = Comment::where('ad_id', '=', $id)->findOrFail($comment)->update($request->all());
        $new = Comment::where('ad_id', '=', $id)->findOrFail($comment);
        return response()->json($new, 200);
    }

    public static function deleteComment($id, $comment)
    {
        $comm = Comment::where('ad_id', '=', $id)->findOrFail($comment);
        $comm->delete();
        return response()->json(null, 204);
    }

}
