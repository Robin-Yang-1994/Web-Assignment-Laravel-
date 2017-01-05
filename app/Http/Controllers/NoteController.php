<?php

namespace App\Http\Controllers;
use App\AnimeNote;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NoteController extends Controller
{
  public function editNotes(AnimeNote $notes){

    return view('note.editNote',compact('notes'));
  }

  public function updateNotes(Request $request, AnimeNote $notes){

  $this->validate($request,['body'=>'required']);  

  $notes->update($request->all());

  $request->session()->flash('alert-success', 'Update saved');

  return back();

  }
}
