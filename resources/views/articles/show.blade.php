@extends('app')
@section('content')
    <h1>{{$article->title}}</h1>
    <aricle>
         {{$article->body}}
    </aricle>
    @unless($article->tags->isEmpty())
    <h5>Tags</h5>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
    </ul>
    @endif
@stop