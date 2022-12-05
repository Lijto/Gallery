@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Photos</div>
                <div class="card-body">
                    <p>{{$gallery->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{$gallery->title}}</div>
                <div class="card-body justify-content-center">
                    <img src="{{ Storage::url($gallery->cover) }}" alt="cover" class="img-thumbnail">
                    <br><br>
                    <a href="{{ route('users.gallery.edit', $gallery->id) }}" class="btn btn-success d-block">Edit gallery</a>
                    <br>
                    <a href="{{ route('users.gallery.destroy', $gallery->id) }}" class="btn btn-danger d-block">Delete gallery</a>
                </div>
            </div>
        </div>
    </div>
@endsection
