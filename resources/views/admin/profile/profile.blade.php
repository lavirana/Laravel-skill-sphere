@extends('adminlte::page')

@section('title', 'Admin Profile')

@section('content_header')
    <h1>Admin Profile</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3">Profile Information</h4>

            <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

            {{-- Add more fields if needed --}}
            {{-- <p><strong>Role:</strong> {{ auth()->user()->role }}</p> --}}
            {{-- <p><strong>Joined:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p> --}}

            <a href="" class="btn btn-primary">Edit Profile</a>
            <a href="{{ route('password.edit') }}" class="btn btn-warning">Change Password</a>
        </div>
    </div>
@stop
