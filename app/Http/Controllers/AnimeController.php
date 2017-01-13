<?php

namespace App\Http\Controllers;
use App\AnimeNote;
use App\Anime;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AnimeController extends Controller
{
  public static function show(){

    $animes = Anime ::orderBy('created_at', 'desc')->take(5)->get();
    return view('page.forumHome', compact('animes')); // get anime from DB and show 5 most recent data
  }

  public function animeInformation(Anime $anime){

  $anime->load('note'); // gets the note belong to anime

  return view('page.forumInformation', compact('anime'));
  }

  public function addAnimeInformation(Request $request, Anime $anime, User $user){

  $this->validate($request,['body'=>'required']); // validation for empty body (field)
  $animeNote = new AnimeNote($request->all()); // get all passed request
  $user = Auth::user()->id; // get the user id from authenticated user session
  $anime->addAnimeNote($animeNote, $user); //takes user id and anime note from request
  return back(); // refresh and update page
}

  public function searchAnime(Request $request){

    $this->validate($request,['name'=>'required']); // validation for body
    $search = $request['name']; // get request from search box (name)
    $result = Anime::where('name','LIKE',"%$search%")->get(); // compare with database
    return view('page.forumHome')->with('result', $result); // send information to view
  }

  public function showAddForm(){

    return view('page.addform');
  }

  public function addAnime(Request $request, Anime $anime){

    $this->validate($request,['name' =>'required','year' =>'required']); // validation for empty body (field)
    $anime = new Anime($request->all()); // get all passed request
    $anime->save(); // save the requested data to anime
    return AnimeController::show(); // refresh and update page
  }
}
