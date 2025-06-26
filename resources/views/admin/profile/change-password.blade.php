@extends('adminlte::page')

@section('title', 'Change Password')

@section('content_header')
    <h1>Change Password</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
    
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input id="current_password" type="password" class="form-control" name="current_password" required>
            @error('current_password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
        </div>

        <div class="form-group">
    <label for="new_password">New Password</label>
    <input id="new_password" type="password" class="form-control" name="new_password" required>
    @error('new_password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="new_password_confirmation">Confirm New Password</label>
    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
</div>


        <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
@stop
