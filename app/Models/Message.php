<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  public function userFrom()
  {
      return $this->hasMany('App\User', 'user_id_from');
  }
}
