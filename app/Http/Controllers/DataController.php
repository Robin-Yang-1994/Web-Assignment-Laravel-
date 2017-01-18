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

      $data = AnimeNote::select(DB::raw("count(*) as count", "anime_id"))

      ->orderBy("anime_id")

      ->groupBy(DB::raw("(anime_id)"))

      ->get()->toArray();

      $data = array_column($data, 'count');

      return view('data.showstatistics')->with('data',json_encode($data,JSON_NUMERIC_CHECK));
    }
}
