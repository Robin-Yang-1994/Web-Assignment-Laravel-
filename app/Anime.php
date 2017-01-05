<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
  public function note (){

  return $this->hasMany(AnimeNote::class);
  }

  public function addAnimeNote(AnimeNote $animeNote, $userID){

  $animeNote->user_id = $userID;

  return $this->note()->save($animeNote);
  }
}
