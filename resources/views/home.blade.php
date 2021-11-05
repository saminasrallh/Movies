@extends('layouts.app')
@section('content')
    <div class="container body-content bg-dark text-white">
        <h2>Index</h2>
        <p>

        </p>
        <div class="container">
            <div class="row">
                @foreach($moviedata as $o)
                    <div class="col-sm-4">
                        <div class=" bg-dark text-white " style="width: 18rem;display: inline-block;">
                            <a href="{{route('show',['id'=>$o->id])}}">
                                <img style="width: 286px;height: 180px;" src="{{ url('/Uploads/'.$o->thumpnail)}}"/>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title ">{{$o->title}}</h5>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
