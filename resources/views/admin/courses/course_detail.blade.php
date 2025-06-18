@extends('adminlte::page')

@section('title', $course->title)

@section('content_header')
    <h1>Course Detail</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $course->title }}</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                @if($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" class="img-fluid rounded">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="col-md-8">
                <p><strong>Description:</strong></p>
                <p>{{ $course->description }}</p>

                <p><strong>Rating:</strong> {{ $course->rating }} / 5</p>
                
                <p><strong>Price:</strong> ₹{{ $course->price }}</p>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('courses') }}" class="btn btn-secondary">Back to List</a>
        <a style="float: right;" href="/admin/courses/edit/{{ $course->id }}" class="btn btn-primary">Edit Course</a>
    </div>
</div>

@stop
