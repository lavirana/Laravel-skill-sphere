@extends('pages.layout')
@section('content')

  <style>
 
    .wishlist-container {
      max-width: 1000px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
    }
    .wishlist-title {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .course-card {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
      transition: box-shadow 0.3s;
    }
    .course-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .course-image {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .course-body {
      padding: 15px;
    }
    .wishlist-icon {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: white;
      border-radius: 50%;
      padding: 8px;
      font-size: 18px;
      color: red;
    }
  </style>


  <div class="container my-5">
    <div class="wishlist-title">My Wishlist</div>
    <div class="row">

@foreach($wishlists as $wishlist)

      <div class="col-md-4">
        <div class="position-relative course-card">
          <img src="{{ asset('storage/' . $wishlist->course->image) }}"
          onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';" alt="Course Image" class="course-image" />
          <i class="fa fa-heart wishlist-icon"></i>
          <div class="course-body">
            <h5 class="mb-1">{{ $wishlist->course->title; }}</h5>
            <p class="mb-1 text-muted">{{ $wishlist->user->name; }}</p>
            <p class="mb-1 text-warning">
              4.5 ★ (30 reviews)
            </p>
            <p class="mb-0 font-weight-bold">₹ {{ $wishlist->course->price; }}</p>
          </div>
        </div>
      </div>

      @endforeach
      <!-- Repeat for more wishlist items -->

    </div>
  </div>









@endsection
