@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <header class="mb-3">
            <h1>{{$post->title}}</h1>
            <small>{{$post->author}}</small>
        </header>
        <p>{{$post->content}}</p>
        <a href="{{route('admin.posts.index')}}">Back to Archive</a>
    </div>

@endsection