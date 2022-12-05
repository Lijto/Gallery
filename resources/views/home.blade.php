@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Galleries</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            @foreach($galleries as $gallery)
                                <div class="col-md-3">
                                    <a href="{{route('users.gallery.show', $gallery->id)}}">
                                    <img src="{{ $gallery->cover ? Storage::url($gallery->cover) : ''}}" alt="Gallery cover" class="img-thumbnail">
                                    <p class="text-center">{{$gallery->title}}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Create new Gallery
                    </div>
                    <div class="card-body">
                        <a href="{{route('users.gallery.create')}}" class="btn btn-success btn-block">Create new Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
