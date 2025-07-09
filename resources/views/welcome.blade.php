@extends('pages.layout')

@section('content')
  <!-- Slider -->
  <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="http://127.0.0.1:8000/storage/front/front.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://127.0.0.1:8000/storage/front/front2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="http://127.0.0.1:8000/storage/front/front.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Search Bar Section -->
<div class="" style="padding: 22px 0px 22px 0px;
    background-color: #edffe4a3;
    border-bottom: 2px solid hsl(225deg 4.3% 81.6% / 18%);">
  <div class="row justify-content-center">
    <div class="col-md-8">
  <form class="d-flex justify-content-center">
  <input 
    type="search" 
    class="form-control" 
    placeholder="Search for anything..." 
    aria-label="Search"
    id="search"
    style="
      padding: 12px 15px 12px 35px; 
      border-radius: 20px;
      background-size: 16px 16px;
    "></form>
    </div>
  </div>
</div>
  <!--<div class="container my-4" id="coursesContainer"></div>-->
  <div class="container my-4" id="coursesContainer">
  <div id="results"> 
        @include('search_results', ['categories' => $categories])
    </div>
    </div>
@endsection

