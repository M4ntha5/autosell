<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = ['title','body', 'ad_id'];

  protected $table = 'comments';

  public function ad()
  {
      return $this->hasOne('\App\Ad');
  }


}
