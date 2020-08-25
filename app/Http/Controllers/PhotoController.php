<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Vacancy $vacancy)
    {
    	// $this->validate(request(), [
    	// 	'photo' => 'required|image|max:2048'
    	// ]);

     //   $photo = request()->file('photo')->store('public');

     //   Photo::create([
     //   	'url' => Storage::url($photo),
     //   	'post_id' => '1'
     //   ]);


        $image = request()->file('photo');
        $nameImage = time() . '.' . $image->extension();
        $image->move(public_path('storage/vacantes'), $nameImage);
        return response()->json(['correcto' => $nameImage]);
    }

    public function deleteimage(Request $request)
    {
        // if ($request->ajax()) {
          return $request->all();
        // }
    }
}