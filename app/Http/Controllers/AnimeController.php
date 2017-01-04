<?php

namespace App\Http\Controllers;
use App\Animes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AnimeController extends Controller
{
  public function show(){

    $animes = Animes ::all();
    return view('page.forumHome', compact('animes'));
  }

  public function animeInformation(Animes $anime){

  return view('page.forumInformation', compact('anime'));
  }

  public function searchAnime(){

    $searchA = \Request::get('searchA');
    $anime = Animes::where('name','LIKE','%'.$searchA.'%');
    return view('page.forumHome', compact('anime'));
    //return view('page.forumHome')->withDetails($result)->withQuery('$search');
    //else return view('page.forumHome')->withMessage('No result, Please try again');
  }
}
