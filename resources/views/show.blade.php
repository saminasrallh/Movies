@extends('layouts.app')
@section('content')
    <div class="container body-content">



        <h2>Details</h2>

        <div>
            <h4>Movie</h4>
            <hr>
            <dl class="dl-horizontal">
                <dt>
                    Title
                </dt>

                <dd>
                    {{$show->title}}
                </dd>

                <dt>
                    Release Date
                </dt>

                <dd>
                    {{$show->Release_date->format('Y-m-d')}}
                </dd>

                <dt>
                    Genre
                </dt>

                <dd>
                    {{$show->genre}}
                </dd>

                <dt>
                    Price
                </dt>

                <dd>
                    {{$show->price}}
                </dd>

                <dt>
                    Rating
                </dt>

                <dd>
                    {{$show->rating}}
                </dd>
                <dt>
                    Thumpnail
                </dt>

                <dd>
                    <img width="200" src="{{ url('/Uploads/'.$show->thumpnail)}}" />

                </dd>
                <dt>
                    Video
                </dt>

                <dd>
                    <video src="{{ url('/Uploads/'.$show->video)}}" controls ></video>
                </dd>

            </dl>
        </div>

        <form method="post" action="{{route('delete',['id'=>$show->id])}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-primary">delete</button>
            <a class="btn btn-primary" href="{{route('update',['id'=>$show->id])}}">Update</a>
        </form>
    </div>
@endsection
