<?php

namespace App\Models;

use App\Http\Requests\StoreGalleryRequest;
use Illuminate\Database\Eloquent\Model;
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

    public function saveFromRequest(StoreGalleryRequest $request)
    {
        $this->user_id = \Auth::user()->id;
        $this->title = $request->title;
        if ($request->cover) {
            $this->cover = Storage::put('galleries', $request->cover);
        }
        $this->description = $request->description;
        $this->save();
    }

    public function usersGallery()
    {
        return $this->where('user_id', \Auth::user()->id)->get();
    }
}
