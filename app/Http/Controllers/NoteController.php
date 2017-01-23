<?php

namespace App\Http\Controllers;
use App\AnimeNote;
use App\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NoteController extends Controller
{
  public function editNotes(AnimeNote $notes){ // load notes to view for the update method

    $notes->load('anime'); // note table loads anime table for access to both tables

    return view('note.editNote',compact('notes'));
  }

  public function updateNotes(Request $request, AnimeNote $notes){ // update feature

  $this->validate($request,['body'=>'required']);  // validation
  $notes->update($request->all());
  return back();
  }

  public function deleteNotes(Request $request, AnimeNote $notes){ // delete feature

  $notes->delete($request->all()); // delete the notes selected in the view
  return AnimeController::show();
  }
}
