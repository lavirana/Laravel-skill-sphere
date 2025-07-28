<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Course Platform</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  @livewireStyles 
  <style>
    .course-card:hover {
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transform: translateY(-3px);
      transition: 0.3s ease;
    }
    .card-img-top {
  width: 100%;
  height: 180px; /* Set your desired height */
  object-fit: cover; /* Crop and center the image */
  border-radius: 8px; /* Optional: rounded corners */
}
.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: #fff;
  padding: 0.5rem 1rem;
  border: 1px solid #ddd;
  z-index: 1000;
  min-width: 200px;
}

.nav-item.dropdown:hover .dropdown-menu {
  display: block;
}

.dropdown-menu .dropdown-item {
  padding: 0.25rem 0;
  white-space: nowrap;
}

  </style>
</head>
<body>
<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">
      <span class="me-2"><b>TechCrafters</b></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">All Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#">My Learning</a></li>
      </ul>

      <div class="flex items-center space-x-4">
        @auth
        <!-- User profile with icons -->
        <div class="dropdown d-flex align-items-center">
          <!-- Icons -->
          <a href="#" class="text-white me-3"><i class="fa fa-heart"></i></a>
        
          <a href="#" class="text-white me-3 position-relative">
            <i class="fa fa-shopping-cart fa-lg"></i>
            <span id="cart-count-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none">
              0
            </span>
          </a>

          <!--<a href="#" class="text-white me-3"><i class="fa fa-user"></i></a>-->
          <!-- Profile dropdown -->
          <button class="btn btn-outline-dark dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--bs-btn-hover-color); background-color: var(--bs-btn-hover-bg); border-color: var(--bs-btn-hover-border-color);">
            <span class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
              {{ strtoupper(Auth::user()->name[0]) }}
            </span>
            <span class="ms-2">{{ Auth::user()->name }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{ route('edit_profile') }}">Edit Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('ulogout') }}">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </div>
        @else
        <!-- Guest view -->
        <a href="ulogin" class="btn btn-outline-light me-2">Log in</a>
        <a href="signup" class="btn btn-primary">Sign up</a>
        @endauth
      </div>
    </div>
  </div>
</nav>


  <!-- Sub menu (categories) -->
  <nav class="bg-light">
  <div class="container">
    <ul class="nav justify-content-center py-2">
      @foreach($all_categories as $category)
        <li class="nav-item dropdown position-relative">
          <a class="nav-link" href={{ "/category-courses/$category->id" }}>{{ $category->name }}</a>
          @if($category->subcategories->count())
            <ul class="dropdown-menu position-absolute">
              @foreach($category->subcategories as $subcategory)
                <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
  </div>
</nav>