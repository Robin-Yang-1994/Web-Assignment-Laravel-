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
      $user = Auth::user()->id; // define user_id from authenticated user
      $own = AnimeNote::where('user_id', '=', $user)->get(); // find notes associated with user_id
    return view('accounts.viewAccounts')->with('user', Auth::user())->with('own', $own);
    }
    else{
      return AnimeController::show(); // wont allow user see view account view for security
    }
  }
}
