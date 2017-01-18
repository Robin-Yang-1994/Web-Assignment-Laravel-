<?php

namespace App\Http\Controllers;
use App\Anime;
use DB;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function showData(){

      $data = Anime::select(DB::raw("count(name) as anime_id"))
      ->orderBy("created_at")
      ->get()->toArray();
      $data = array_column($data, 'anime_id');

      return view('data.showstatistics')->with('data',json_encode($data,JSON_NUMERIC_CHECK));
    }
}
