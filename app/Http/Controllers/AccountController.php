<?php

namespace App\Http\Controllers;
use App\User;
use App\AnimeNote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  public function showProfile(){
    if(Auth::check()){
    return view('accounts.viewAccounts')->with('user', Auth::user());
    }
    else{
      return AnimeController::show();
    }
  }

  public function myNotes(){
    $user = Auth::user()->id;
    $own = AnimeNote::where('user_id', '=', $user)->get();
    return view('accounts.viewAccounts')->with('own', $own);
  }
}
