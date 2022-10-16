@extends('layouts.app')

@section('content')


    <main class="px-3">
        <div class="container">
            <div class="row">
                @foreach($zodiaks as $zodiak)
                    <div class="col-sm-3" onclick="AjaxRequest({{ $zodiak->id}})"><img  width="80%" height="80%" src="images/{{$zodiak->logo}}"><br>{{$zodiak->title}}</div>
                @endforeach
            </div>
            <div class="row">
                <div class="col" id="predict"></div>
            </div>
        </div>
    </main>
@endsection
