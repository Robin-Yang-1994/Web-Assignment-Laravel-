<?php

namespace App\Http\Controllers;
use App\AnimeNote;
use App\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NoteController extends Controller
{
  public function editNotes(AnimeNote $notes){

    $notes->load('anime'); // note table loads anime table for access to both tables

    return view('note.editNote',compact('notes')); // pass note data from DB to edit view
  }

  public function updateNotes(Request $request, AnimeNote $notes){

  $this->validate($request,['body'=>'required']);  //empty body validation
  $notes->update($request->all()); //get all arguements passed through the view
  return back(); // refresh page
  }

  public function deleteNotes(Request $request, AnimeNote $notes){

  $notes->delete($request->all()); // delete the notes selected in the view
  return AnimeController::show(); // show the anime home view
  }
}
