<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index() 
    {
        $albums = Album::with('Photos')->get();
    	return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
    	return view('albums.create');
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);

        // Get filename with extension
        $filenameWithExt = $req->file('cover_image')->getClientOriginalName();
        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get the extension
        $extension = '.'.$req->file('cover_image')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $filename.'_'.time().$extension;

        // Upload image
        $path = $req->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        // Create new Album
        $album = new Album;
        $album->name = $req->input('name');
        $album->description = $req->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album Created');
    }

    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
