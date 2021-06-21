@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-3">CREATE NEW POST</a>

        <h1>BLOG POSTS</h1>

        @if (session('deleted'))
            <div class="alert alert-success mt-3">
                {{ session('deleted') }} deleted successfully!
            </div>
        @endif

        <table class="table mb-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td>@if($post->category) {{ $post->category->name }} @endif</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">SHOW</a></td>
                        <td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-secondary">EDIT</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="mb-3">Posts by Category</h2>
        @foreach ($categories as $category)
            <div class="category mb-3">
                <h3>{{ $category->name }}</h3>
                @forelse ($category->posts as $post )
                    <a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a> <br>
                @empty
                    No posts here...<a href="{{ route('admin.posts.create') }}">Create the first post!!</a>
                @endforelse
            </div>
        @endforeach
    </div>
@endsection