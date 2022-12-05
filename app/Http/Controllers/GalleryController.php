<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGalleryRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $gallery = Gallery::query()->where('user_id', Auth::id())->findOrFail($id);
        return view('galleries.show', compact('gallery'));
    }

    public function edit($id)
    {
        $gallery = Gallery::query()->where('user_id', Auth::id())->findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Gallery $gallery, StoreGalleryRequest $request)
    {
        if (Auth::id() === $gallery->user_id) {
            $gallery = $gallery->saveFromRequest($request);
            return redirect(route('users.gallery.edit', $gallery));
        }
        return back()->withErrors(['error' => 'You don\'t have permissions for editing']);
    }

    public function destroy(Gallery $gallery)
    {
        if (Auth::id() === $gallery->user_id) {
            $cover = $gallery->cover;
            $gallery->delete();
            Storage::delete($cover);
            return redirect(route('home'));
        }
        return back()->withErrors(['error' => 'You don\'t have permissions for deleting']);
    }
}
