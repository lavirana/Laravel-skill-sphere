@extends('adminlte::page')

@section('title', 'Add Course')

@section('content_header')
    <h1>Add New Course</h1>
@stop

@section('content')


<div class="row">
      <!-- Profile Summary -->
      <div class="col-md-4">
        <div class="card profile-card p-3 text-center">
          <img src="https://via.placeholder.com/150" alt="Profile Image" class="rounded-circle mx-auto mb-3" width="150" height="150">
          <h4>John Doe</h4>
          <p class="text-muted">john.doe@example.com</p>
          <p><span class="badge bg-success">Active</span></p>
          <p>Joined: Jan 2024</p>
          <a href="#" class="btn btn-primary mt-2">Edit Profile</a>
        </div>
      </div>

      <!-- Profile Details -->
      <div class="col-md-8">
        <div class="card profile-card p-4">
          <h5>Profile Details</h5>
          <hr>
          <div class="row mb-2">
            <div class="col-sm-4"><strong>Full Name</strong></div>
            <div class="col-sm-8">John Doe</div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-4"><strong>Email</strong></div>
            <div class="col-sm-8">john.doe@example.com</div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-4"><strong>Phone</strong></div>
            <div class="col-sm-8">+91-9876543210</div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-4"><strong>Role</strong></div>
            <div class="col-sm-8">Student</div>
          </div>
          <div class="row mb-2">
            <div class="col-sm-4"><strong>Address</strong></div>
            <div class="col-sm-8">123 Main St, Mumbai, India</div>
          </div>
          <a href="#" class="btn btn-outline-secondary mt-3">Change Password</a>
        </div>
      </div>
    </div>


@stop