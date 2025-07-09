@extends('pages.layout')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-5">
            <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid rounded" alt="{{ $course->title }}">
        </div>

        <div class="col-md-7">
            <h2>{{ $course->title }}</h2>
            <p class="text-muted mb-2"><strong>Category:</strong> {{ $course->category->title ?? 'N/A' }}</p>
            <p>{{ $course->description }}</p>

            <ul class="list-group mt-4">
                <li class="list-group-item"><strong>Price:</strong> ₹{{ $course->price }}</li>
                <li class="list-group-item"><strong>Rating:</strong> {{ $course->rating }}/5</li>
                <li class="list-group-item"><strong>Posted On:</strong> {{ $course->created_at->format('d M Y') }}</li>
            </ul>

            <a href="#" class="btn btn-primary mt-3">Enroll Now</a>
        </div>
    </div>
</div>
@endsection

