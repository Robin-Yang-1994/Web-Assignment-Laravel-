<?php

namespace App\Http\Controllers;
use App\AnimeNote;
use App\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NoteController extends Controller
{
  public function editNotes(AnimeNote $notes){

    return view('note.editNote',compact('notes')); // pass note data to edit view
  }

  public function updateNotes(Request $request, AnimeNote $notes){

  $this->validate($request,['body'=>'required']);  //empty body validation
  $notes->update($request->all()); //get all arguements passed through the view
  //$request->session()->flash('alert-success', 'Update saved');

  return back(); // refresh page
  }

  public function deleteNotes(Request $request, AnimeNote $notes){

  $notes->delete($request->all());
  return AnimeController::show();
  }
}
