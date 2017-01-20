<?php

namespace App\Http\Controllers;
use App\User;
use App\AnimeNote;
use App\Anime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  public function showProfile(){
    if(Auth::check()){ // check auth to pass authenticated user details
      $user = Auth::user()->id;
      // define user_id from authenticated user, find notes associated with user_id

      $own = AnimeNote::where('user_id', '=', $user)->get();
    return view('accounts.viewAccounts')->with('user', Auth::user())->with('own', $own);
  }                                           // passing user data and query data to view
    else{
      return AnimeController::show(); // return home due to no user data and for security purposes
    }
  }
}
