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

      $data = AnimeNote::select(DB::raw("count(anime_id) as count"),("animes.name as name"))
      ->join('animes','anime_notes.anime_id','=','animes.id')
      ->orderBy("animes.name")
      ->groupBy("animes.name")
      ->get()
      ->toArray();
      $count = array_column($data, 'count');
      $result = array_column($data, 'name');


      // $count = AnimeNote::select(DB::raw("count(*) as count", "anime_id"))
      // ->join('animes','anime_notes.anime_id','=','animes.id')
      // ->orderBy("animes.name")
      // ->groupBy("animes.name")
      // ->get()
      // ->toArray();
      // $count = array_column($data, 'count');

      // $name = Anime::where('name','LIKE',"%$data->watch_id%")->get();

      return view('data.showstatistics')
      ->with('count',json_encode($count,JSON_NUMERIC_CHECK))
      ->with('result',json_encode($result,JSON_NUMERIC_CHECK));
    }
}
