@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3">EDIT POST</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" class="form form-horizontal">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label> 
                <input type="text" id="title" name="title" placeholder="Title Here..." class="form-control" value="{{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{ $post->content }}</textarea> 
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label> 
                <input type="text" id="author" name="author" placeholder="Your Name Here..." class="form-control" value="{{$post->author}}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label> 
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">--Select a Category--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}"
                            @if ($category->id == old('category_id', $post->category_id)) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
           
            <div class="mb-3">
                
                @foreach ($types as $type)
                    <span class="mr-2">
                        <input 
                        type="checkbox" id="type{{$loop->iteration}}" name="types[]" 
                        value="{{$type->id}}"
                        @if ($errors->any() && in_array($type->id, old('types'))) 
                            checked
                        @elseif (! $errors->any() && $post->types->contains($type->id))
                            checked
                        @endif>
                        <label for="type{{$loop->iteration}}">{{$type->name}}</label>
                    </span>
                @endforeach
            </div>

            <button type="submit" class='btn btn-primary'>EDIT</button>
        </form>
    </div>
@endsection