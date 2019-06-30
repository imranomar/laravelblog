<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file' => $name]);

    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        $photo->deletePhoto();
        Photo::destroy($id);
        return redirect('admin/media');
    }

    public function deleteMedia(Request $request)
    {


        if ($request->checkBoxArray)
        {
            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo)
            {
                $photo->delete();
            }
        }

        return redirect()->back();

    }
}
