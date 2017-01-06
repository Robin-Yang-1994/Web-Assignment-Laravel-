<?php

namespace App\Http\Controllers;
use App\AnimeNote;
use App\Anime;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AnimeController extends Controller
{
  public static function show(){

    $animes = Anime ::all();
    return view('page.forumHome', compact('animes'));
  }

  public function animeInformation(Anime $anime){

  $anime->load('note');

  return view('page.forumInformation', compact('anime'));
  }

  public function addAnimeInformation(Request $request, Anime $anime){

  $this->validate($request,['body'=>'required']); // validation for body
  $animeNote = new AnimeNote($request->all()); // get all passed request
  //$information->by(Auth::user());
  $anime->addAnimeNote($animeNote, 1); //takes user id 1
  return back(); // refresh and update page
}

  public function searchAnime(Request $request){

    $this->validate($request,['anime'=>'required']); // validation for body
    $search = $request['anime']; // get request from search box (name)
    $result = Anime::where('name','LIKE',"%$search%")->get(); // compare with database
    return view('page.forumHome')->with('result', $result); // send information to view
  }

}
