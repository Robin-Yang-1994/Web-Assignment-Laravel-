<?php

namespace App\Http\Controllers;
use App\Anime;
use App\AnimeNote;
use DB;
use Illuminate\Http\Request;

class DataController extends Controller // Branched feature and merged to master
{
    public function showAnimeData() // finding most popular anime depending on the anime notes through join
    {
      // query counts all anime id in AnimeNote table and match with anime id in Anime table
      // returns the anime grouped and ordered by anime name for single result
      $data = AnimeNote::select(DB::raw("count(anime_id) as count"),("animes.name as name"))
      ->join('animes','anime_notes.anime_id','=','animes.id')
      ->orderBy("animes.name")
      ->groupBy("animes.name")
      ->get()
      ->toArray(); // change to an array
      $count = array_column($data, 'count'); // define the number of counts
      $result = array_column($data, 'name'); // display anime name for each count

      return view('data.showstatistics')
      ->with('count',json_encode($count,JSON_NUMERIC_CHECK)) // retrun count object to JSON available
      ->with('result',json_encode($result,JSON_NUMERIC_CHECK));
    }
}
