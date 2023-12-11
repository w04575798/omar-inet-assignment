@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <h2>{{ $user->name }}</h2>
                            <p>Email: {{ $user->email }}</p>
                            <p>Role: {{ $user->roles->first()->name }}</p>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
