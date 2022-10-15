@extends('layouts.app')

@section('content')


    <main class="px-3">
        <div class="container">
            <div class="row">
                @foreach($zodiaks as $zodiak)
                    <div class="col-sm-3"><a href="{{ route('show',['id'=>$zodiak]) }}" style="text-decoration: none;color: white"><img  width="80%" height="80%" src="images/{{$zodiak->logo}}"><br>{{$zodiak->title}}</a></div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
