@extends('layouts.app')

@section('content')
    <div class="container body-content">

        <h2>Create</h2>
        <form method="post" action="{{route('SaveMovie')}}" enctype="multipart/form-data">
            @csrf
            <h4>Movie</h4>
            <hr>
            <div class="form-group">
                <label class="control-label col-md-2">Title</label>
                <div class="col-md-10">
                    <input type="text" name="title" value="{{old('title')}}" class="form-control text-box single-line ">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Release Date</label>
                <div class="col-md-10">
                    <input type="text" placeholder="YYYY-mm-dd" name="Release_date"
                           class="form-control text-box single-line" value="{{old('Release_date')}}">
                    @error('Release_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Genre</label>
                <div class="col-md-10">
                    <input type="text" value="{{old('genre')}}" name="genre" class="form-control text-box single-line">
                    @error('genre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Price</label>
                <div class="col-md-10">
                    <input value="{{old('price')}}" type="text" name="price" class="form-control text-box single-line">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Rating</label>
                <div class="col-md-10">
                    <input value="{{old('rating')}}" type="text" name="rating" class="form-control text-box single-line">
                    @error('rating')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">thumpnail</label>
                <div class="col-md-10">
                    <input value="{{old('thumpnail')}}" type="file" name="thumpnail" class="form-control text-box single-line">
                    @error('thumpnail')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">video</label>
                <div class="col-md-10">
                    <input value="{{old('video')}}" type="file" name="video" class="form-control text-box single-line">
                    @error('video')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="submit" value="save movie" class="btn btn-primary"/>
                </div>
            </div>

        </form>
    </div>
@endsection
