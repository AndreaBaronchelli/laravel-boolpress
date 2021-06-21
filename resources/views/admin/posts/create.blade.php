@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3">CREATE NEW POST</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                    <li class="list-group-item">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.posts.store') }}" method="post" class="form form-horizontal">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label> 
                <input type="text" id="title" name="title" placeholder="Title Here..." class="form-control" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" rows="10" class="form-control">{{ old('content') }}</textarea> 
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label> 
                <input type="text" id="author" name="author" placeholder="Your Name Here..." class="form-control" value="{{ old('author') }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label> 
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">--Select a Category--</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id}}"
                            @if ($category->id == old('category_id')) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class='btn btn-primary'>SUBMIT</button>
        </form>

    </div>
@endsection