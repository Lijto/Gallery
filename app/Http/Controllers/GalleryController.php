<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Gallery $gallery)
    {

    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(StoreGalleryRequest $request, Gallery $gallery)
    {
        $gallery->saveFromRequest($request);

        return redirect()->route('home');
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.show', compact('gallery'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        Gallery::where('user_id', \Auth::user()?->id)->findOrFail($id)->delete();
    }
}
