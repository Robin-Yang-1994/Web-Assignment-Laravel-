<?php

namespace App\Http\Controllers;
use App\AnimeNote;
use App\Anime;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AnimeController extends Controller
{
  public function show(){

    $animes = Anime ::all();
    return view('page.forumHome', compact('animes'));
  }

  public function animeInformation(Anime $anime){

  $anime->load('note');

  return view('page.forumInformation', compact('anime'));
  }

  public function addAnimeInformation(Request $request, Anime $anime){

  // $information = new Information;
  // $information->body = $request->body;
  // $car->informations()->save($information);
  // return back();
  $this->validate($request,['body'=>'required']);
  $animeNote = new AnimeNote($request->all());

  //$information->by(Auth::user());

  $anime->addAnimeNote($animeNote, 1); //takes user id 1

  return back();

}

  public function searchAnime(){

    $searchA = \Request::get('searchA');
    $anime = Anime::where('name','LIKE','%'.$searchA.'%');
    return view('page.forumHome', compact('anime'));
    //return view('page.forumHome')->withDetails($result)->withQuery('$search');
    //else return view('page.forumHome')->withMessage('No result, Please try again');
  }


}
