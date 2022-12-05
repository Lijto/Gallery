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
                    <img src="{{ $gallery->cover ? Storage::url($gallery->cover) : '' }}" alt="cover"
                         class="img-thumbnail">
                    <br><br>
                    <a href="{{ route('users.gallery.edit', $gallery) }}" class="btn btn-success d-block">Edit
                        gallery</a>
                    <br>
                    <form action="{{route('users.gallery.destroy', $gallery)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">Delete gallery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
