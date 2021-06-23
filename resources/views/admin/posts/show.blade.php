@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <header class="mb-3">
            @if ($post->category)
                <div class="badges d-flex justify-content-between">
                    <h3><span class="badge badge-info">{{$post->category->name}}</span></h3>
                    <div class="types">
                        @foreach ($post->types as $type)
                            <span class="badge badge-secondary px-2">{{$type->name}}</span>
                        @endforeach
                    </div>  
                    
                </div>
            @endif
            <h1>{{$post->title}}</h1>
        </header>
        
        <p>{{$post->content}}</p>

        <div class="author mb-3">{{$post->author}}</div>
        <a href="{{route('admin.posts.index')}}">Back to Archive</a>
    </div>

@endsection