<?php

namespace App\Http\Controllers;
use App\Picture;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AnimePictureController extends Controller
{
    public function upload(){
      return view('gallery.images');
    }

    public function store(Request $request){
        $picture = new Picture();
        $this->validate($request, ['file' => 'required','filename' => 'required']);

        $picture->filename = $request->title;

		if($request->hasFile('file')) {
            $file = Input::file('file');
            // $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            //
            // $name = $timestamp. '-' .$file->getClientOriginalName();

            $picture->filepath = $file;

            $file->move(public_path().'/pictures/', $name);
        }
        $picture->save();

        dd($picture);

        //return $this->create()->with('success', 'Image Uploaded Successfully');
	}


    public function show(){

    }
}
