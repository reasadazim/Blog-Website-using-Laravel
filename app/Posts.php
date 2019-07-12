<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  /**
   * Get the image record associated with the post.
   */
  public function images()
  {
      return $this->hasOne('App\Images', 'post_id', 'id');
  }
  public function users()
  {
      return $this->hasOne('App\User', 'id', 'user_id');
  }
  /**
  * Get all of the post's comments.
  */
    public function comments()
    {
        return $this->morphMany('App\Comments', 'commentable');
    }
}
