<?php

namespace App\Http\Controllers;
use App\User;
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
}
