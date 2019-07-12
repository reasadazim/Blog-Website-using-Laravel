<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  // protected $primaryKey = 'parent_id';
      /**
       * Get all of the owning commentable models.
       */
      public function commentable()
      {
          return $this->morphTo();
      }

      public function users()
      {
          return $this->belongsTo('App\User', 'user_id', 'id');
      }
      public function replies()
      {

          return $this->hasMany('App\Comments', 'parent_id');
      }
}
