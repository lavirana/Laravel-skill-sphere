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

            <button id="cart-btn-{{ $course->id }}" class="btn btn-primary mt-3 add_to_cart" data-course-id="{{ $course->id }}" data-user-id="{{ Auth::id() }}" data-price="{{ $course->price }}"> Add to Cart </button>
          <!--  <button class="btn btn-classic mt-3" style="border: 1px solid black;"><i class="fa fa-heart-o"></i></button>
            <button class="btn btn-classic mt-3" style="border: 1px solid black; background-color:#d7fadf;"><i class="fa fa-heart" style="color: green;"></i></button>-->

            <button id="wishlist-btn" 
        class="btn btn-classic mt-3" 
        style="border: 1px solid black;" 
        data-course-id="{{ $course->id }}" 
        data-in-wishlist="false">
    <i class="fa fa-heart-o"></i>
</button>


            <a href="#" class="btn btn-success mt-3">Buy Now</a>
        </div>
    </div>
</div>
@endsection

