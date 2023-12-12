@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Main Public Feed</h1>

        @auth
            <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
        @endauth

        <div class="card">
            <div class="card-header">{{ __('Main Public Feed') }}</div>

            <div class="card-body">
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-header">
                            Posted by: {{ $post->user->name }}
                            <span class="float-right">{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="card-body">
                            <p>{{ $post->content }}</p>

                            @auth
                                @if (Auth::id() === $post->user->id || Auth::user()->roles->contains(2))
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <form action="{{ route('posts.destroy', $post) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
