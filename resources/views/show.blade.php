@extends('layouts.app')

@section('content')

    <main class="px-3">
        <div class="container">
            <div class="row">
                <div class="col"><img  width="105" height="105" src="images/{{$zodiak->logo}}"></div>
                <div class="col"><h2>{{$zodiak->title}}</h2></div>
                <div class="col"></div>
                <div class="col"></div>

            </div>
            <div class="row">
                <div class="col">
                    <p>{{$prediction->name}}</p>
                </div>

            </div>
        </div>
    </main>

@endsection
