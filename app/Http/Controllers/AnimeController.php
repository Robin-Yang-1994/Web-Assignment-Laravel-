<?php

namespace App\Http\Controllers;
use App\Animes;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
  public function show(){

    $animes = Animes ::all();
    return view('page.forumHome', compact('animes'));
  }

  public function animeInformation(Animes $anime){

  return view('page.forumInformation', compact('anime'));
  }
}
