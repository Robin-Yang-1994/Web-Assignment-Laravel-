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
  public static function show(){ // show all results

  $animes = Anime ::orderBy('created_at', 'desc')->take(5)->get();
  return view('page.forumHome', compact('animes'));
  // get anime from DB and show 5 most recent data
  }

  public function animeInformation(Anime $anime){
  // gets the note belong to anime from relationship defined in model
  $anime->load('note');
  return view('page.forumInformation', compact('anime'));
  }

  public function addAnimeInformation(Request $request, Anime $anime, User $user){
  // add feature
  // pulls request, gets anime and user model data

  $this->validate($request,['body'=>'required']); // validation for empty body (field)
  $animeNote = new AnimeNote($request->all());
  $user = Auth::user()->id; // get the user id from auth middleware
  $anime->addAnimeNote($animeNote, $user); //takes user id and anime note from request
  return back();
}

  public function searchAnime(Request $request){ // search feature

    $this->validate($request,['name'=>'required']);
    $search = $request['name']; // define the field required from request
    $result = Anime::where('name','LIKE',"%$search%")->get(); // compare with database results
    return view('page.forumHome')->with('result', $result);
  }

  public function showAddForm(){ // show add anime form

    return view('page.addform');
  }

  public function addAnime(Request $request, Anime $anime){

    $this->validate($request,['name' =>'required','year' =>'required']);
    $anime = new Anime($request->all());
    $anime->save(); // save the requested data to anime
    return AnimeController::show(); // refresh view
  }
}
