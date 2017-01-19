<?php

namespace App\Http\Controllers;
use App\Anime;
use App\AnimeNote;
use DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function showData()
    {
      // query to get the anime id in Notes table and match with anime id in Anime table
      $data = AnimeNote::select(DB::raw("count(anime_id) as count"),("animes.name as name"))
      ->join('animes','anime_notes.anime_id','=','animes.id')
      ->orderBy("animes.name") // orders by the anime name
      ->groupBy("animes.name") // group all id by anime name
      ->get()
      ->toArray(); // change to array list
      $count = array_column($data, 'count'); // display the anime note for each anime
      $result = array_column($data, 'name'); // display anime name

      return view('data.showstatistics')
      ->with('count',json_encode($count,JSON_NUMERIC_CHECK)) // retrun count object
      ->with('result',json_encode($result,JSON_NUMERIC_CHECK)); // return result object
    }
}
