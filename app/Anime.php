<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
  public function note (){

  return $this->hasMany(AnimeNote::class); // define 1 to many relationship
  }

  public function addAnimeNote(AnimeNote $animeNote, $userID){

  $animeNote->user_id = $userID; //define a user_id object
  return $this->note()->save($animeNote);
  }
}
