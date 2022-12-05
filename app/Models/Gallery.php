<?php

namespace App\Models;

use App\Http\Requests\StoreGalleryRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    public function toArray()
{
    if(!empty($this->cover)) {
        $this->cover = Storage::url($this->cover);
    }

    return parent::toArray();
}

    public function saveFromRequest(StoreGalleryRequest $request):Gallery
    {
        $this->user_id = \Auth::user()->id;
        $this->title = $request->title;
        if ($request->cover and !$this->cover) {
            $this->cover = Storage::put('galleries', $request->cover);
        }
        if($request->cover and $this->cover) {
            Storage::delete($this->cover);
            $this->cover = Storage::put('galleries', $request->cover);
        }
        $this->description = $request->description;
        $this->save();
        return $this;
    }

    public function usersGallery()
    {
        return $this->where('user_id', \Auth::user()->id)->get();
    }
}
