@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Post') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('posts.update', $post) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="content" class="form-label">Post Content</label>
                                <textarea class="form-control" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-warning" href="{{ route('posts.index') }}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
