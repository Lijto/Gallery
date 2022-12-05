@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create gallery</div>
                <div class="card-body">
                    <form
                        action="{{route('users.gallery.store')}}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="form-control"
                    >
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="title">Gallery title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="cover">Gallery cover</label>
                                <input type="file" name="cover" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Gallery description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Create gallery</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
