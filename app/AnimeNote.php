<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeNote extends Model
{
  protected $fillable = ['body'];

  public function anime (){

    return $this->belongsTo(Anime::class);
  }

  public function user (){

    return $this->belongsTo(User::Class);
  }

  public function from (User $user)
  {
      $this->user_id = $user->id;
  }
}
