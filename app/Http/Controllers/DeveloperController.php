<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeveloperController extends Controller
{
  public function developerHome()
  {
      return view('developerHome');
  }
}
