@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <header class="mb-3">
            <h1>{{$post->title}}</h1>
            <small>{{$post->author}}</small>
            @if ($post->category)
                <div class="badges">
                    <span class="badge badge-info">{{$post->category->name}}</span>
                </div>
            @endif
        </header>
        
        <p>{{$post->content}}</p>
        <a href="{{route('admin.posts.index')}}">Back to Archive</a>
    </div>

@endsection