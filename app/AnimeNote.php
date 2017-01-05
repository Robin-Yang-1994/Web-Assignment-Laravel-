<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimeNote extends Model
{
  protected $fillable = ['body'];

  public function anime (){

    return $this->belongsTo(Anime::class); // relation to anime class from animeNote
  }

  public function user (){

    return $this->belongsTo(User::Class); // relation to user class from animeNote
  }

  public function from (User $user) // define user_id
  {
      $this->user_id = $user->id;
  }
}
