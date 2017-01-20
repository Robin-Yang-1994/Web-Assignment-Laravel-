<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
  protected $fillable = ['name', 'year']; // database validated that requires certain fields to be filled it
                                          // protect from empty fields

  public function note (){

  return $this->hasMany(AnimeNote::class); // define 1 to many relationship
  }

  public function addAnimeNote(AnimeNote $animeNote, $userID){ // for add feature in Anime Controller

  $animeNote->user_id = $userID; //defining user_id object
  return $this->note()->save($animeNote); // add note to anime note table
  }

}
