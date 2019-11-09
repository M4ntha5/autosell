<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    protected $fillable = ['title','body', 'ad_id'];

    protected $table = 'comments';

    public function ad()
    {
        return $this->hasOne('\App\Ad');
    }

    public static function soreCommentOnAd($id, Request $request)
    {
        $user_data = $request->all();
        $data = array_merge($user_data, array('ad_id'=> $id));
        $comment = Comment::where('ad_id', '=', $id)->create($data);
        return response()->json($comment, 201);
    }

    public static function showAdComments


}
