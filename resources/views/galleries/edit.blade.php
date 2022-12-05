@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit gallery</div>
                <div class="card-body">
                    @if($errors->any())
                        <h4 style="color: red">{{$errors->first()}}</h4>
                    @endif
                    <form
                        action="{{route('users.gallery.update', [$gallery])}}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="form-control"
                    >
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">Gallery title</label>
                                <input type="text" name="title" value="{{$gallery->title}}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="cover">Gallery cover</label>
                                <img src="{{$gallery->cover ? Storage::url($gallery->cover) : ''}}" alt="gallery-cover" class="img-thumbnail">
                                <input type="file" name="cover" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Gallery description</label>
                                <textarea name="description" rows="3" class="form-control">{{$gallery->description}}</textarea>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Update gallery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
