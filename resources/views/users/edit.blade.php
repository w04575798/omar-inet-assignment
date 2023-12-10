@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit User') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            <form method="post" action="{{ route('users.update', $user['id']) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="name" class="form-label">User Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') ?? $user['name'] }}" id="name" name="name">
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Select Role</label>
                                    <select class="form-select" id="role" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user['roles']->first()->id === $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
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
                                <a class="btn btn-warning" href="{{ route('users.index') }}">Cancel</a>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
