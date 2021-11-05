@extends('layouts.app')

@section('content')
    <div class="container body-content">

        <h2>Update</h2>
        <form method="post" action="{{route('update_movie',["id"=>$mov->id])}}"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <h4>Movie</h4>
            <hr>
            <div class="form-group">
                <label class="control-label col-md-2">Title</label>
                <div class="col-md-10">
                    <input type="text" name="title" class="form-control text-box single-line" value="{{$mov->title}}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Release Date</label>
                <div class="col-md-10">
                    <input type="text" placeholder="YYYY-mm-dd" name="Release_date"
                           class="form-control text-box single-line" value="{{$mov->Release_date->format('Y-m-d')}}">
                    @error('Release_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Genre</label>
                <div class="col-md-10">
                    <input type="text" name="genre" class="form-control text-box single-line" value="{{$mov->genre}}">
                    @error('genre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Price</label>
                <div class="col-md-10">
                    <input type="text" name="price" class="form-control text-box single-line" value="{{$mov->price}}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Rating</label>
                <div class="col-md-10">
                    <input type="text" name="rating" class="form-control text-box single-line" value="{{$mov->rating}}">
                    @error('rating')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">thumpnail</label>
                <div class="col-md-10">
                    <input  type="file" name="thumpnail" class="form-control text-box single-line" >
                    @error('thumpnail')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">video</label>
                <div class="col-md-10">
                    <input type="file" name="video" class="form-control text-box single-line">
                    @error('video')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="Update Movie" class="btn btn-primary"/>
                </div>
            </div>
            <input type="hidden" name="Hidden_img" value="{{$mov->thumpnail}}">
            <input type="hidden" name="Hidden_vid" value="{{$mov->video}}">
        </form>

    </div>
@endsection
