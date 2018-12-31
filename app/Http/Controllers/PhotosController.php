<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function create($album_id)
    {
    	return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
        	'album_id' => 'required',
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);

        // Get filename with extension
        $filenameWithExt = $req->file('photo')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get the extension
        $extension = '.'.$req->file('photo')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename.'_'.time().$extension;

        // Upload image
        $path = $req->file('photo')->storeAs('public/photos/'.$req->input('album_id'), $filenameToStore);

        // Create new Album
        $photo = new Photo;
        $photo->size = $req->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->title = $req->input('title');
        $photo->album_id = $req->input('album_id');
        $photo->description = $req->input('description');

        $photo->save();

        return redirect('/album/'.$req->input('album_id') )->with('success', 'Photo Uploaded');
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);

        return view('photos.show')->with('photo', $photo);
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photos.edit')->with('photo', $photo);
    }

    public function update(Request $req) 
    {
       $this->validate($req, [
            'title' => 'required'
        ]);

        // Create new Album
        $photo = Photo::find($req->id);
        $photo->title = $req->input('title');
        $photo->description = $req->input('description');

        $photo->save(); 
        return redirect('/photo/'.$req->id)->with('success','Photo updated');
    }

    public function destroy($id)
    {   
        $photo = Photo::findOrFail($id);
        if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo))
        {
            $photo->delete();
            return redirect('/album/'.$photo->album_id)->with('success','Photo deleted');
        }
    }

}
