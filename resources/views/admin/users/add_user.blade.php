
@extends('adminlte::page')
@section('title', 'Add Users')
@section('content_header')
    <h1>Add Users</h1>
@stop
@section('content')

<div>
@if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<form action={{ route('user.store') }} method="POST">
    @csrf
    
    <div class="form-group">
        <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror 
    </div>

    <div class="form-group">
        <label for="type">Select Type</label>
        <select name="type" id="type" class="form-control">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="super_admin">Super Admin</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email">
        @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password"
            name="password"
            class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
   <!--<div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password"
       name="password_confirmation"
       class="form-control @error('password_confirmation') is-invalid @enderror">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>-->
    <button type="submit" class="btn btn-primary mt-2">Update User</button>

</form>
</div>
@stop


