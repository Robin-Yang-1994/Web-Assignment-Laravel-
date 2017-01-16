<?php

namespace App\Http\Controllers;
use App\Picture;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AnimePictureController extends Controller
{
    public function upload(){ // show the view
      $this->show(); // run the show method below
      return view('gallery.images');
    }

    public function store(Request $request){
        $picture = new Picture(); // create new Picture DB object
        $this->validate($request, ['file' => 'required','filename' => 'required']);
        // some validation on any empty fields
        $picture->filename = $request->filename; // defining filename as request name

		if($request->hasFile('file')) { // check if the file from request exist
            $file = Input::file('file'); // get file and define it as object
             $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
              // set date and time
             $name = $timestamp. '-' .$file->getClientOriginalName();
             // define name object
            $picture->filepath = $file;
            // defining filepath in DB is equal to file object
            $file->move(public_path().'/tmp/', $file.'.jpg');
            // storing images to public folder in tmp and add .jpg extension to file name
        }
        $picture->save();// save the picture object
        return back()->with('success', 'Image Uploaded Successfully'); // return an sucess message
	}                                                                    // it will auto show latest update

    public function show (Request $request){ // show anime pictures to view
      $pictures = Picture::all(); // get all pictures from database and return data to view
      return view('gallery.images', compact('pictures'));
    }
}
