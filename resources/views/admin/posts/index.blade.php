@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-3">CREATE NEW POST</a>

        <h1>BLOG POSTS</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author }}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">SHOW</a></td>
                        <td>EDIT</td>
                        <td>DELETE</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection