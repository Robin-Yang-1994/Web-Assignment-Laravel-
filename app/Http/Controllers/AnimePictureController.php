<?php

namespace App\Http\Controllers;
use App\Picture;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AnimePictureController extends Controller
{
    public function upload(){
      $this->show();
      return view('gallery.images');
    }

    public function store(Request $request){
        $picture = new Picture();
        $this->validate($request, ['file' => 'required','filename' => 'required']);

        $picture->filename = $request->filename;

		if($request->hasFile('file')) {
            $file = Input::file('file');
             $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

             $name = $timestamp. '-' .$file->getClientOriginalName();

            $picture->filepath = $file;

            $file->move(public_path().'/pictures/', $file);
        }
        $picture->save();

        return back()->with('success', 'Image Uploaded Successfully');
	}

    public function show(Request $request){

      $pictures = Picture::all();
      return view('gallery.images', compact('pictures'));
    }
}
