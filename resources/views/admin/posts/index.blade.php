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
    </div>
@endsection