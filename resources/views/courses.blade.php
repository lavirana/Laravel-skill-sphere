
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Course Detail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  
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
      <a class="navbar-brand" href="#">
        <span class="me-2"><b>TechCrafters</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">All Courses</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About</a></li>
        </ul>
        <div class="d-flex">
          <a href="#" class="btn btn-outline-light me-2">Login</a>
          <a href="#" class="btn btn-primary">Signup</a>
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
          <a class="nav-link" href="#">{{ $category->name }}</a>

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

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">

<div class="container my-4" id="coursesContainer">
        <h4 style="margin: 15px 0 5px;">{{ $category_courses->name }}</h4>
        <div class="row mb-4">
        @foreach($category_courses['courses'] as $cat_courses)
                <div class="col-md-3 mb-3">
                    <div class="card">
                    <img src="{{ asset('storage/' . $cat_courses->image) }}"
                        onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';"
                        class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cat_courses->title }}</h5>
                            <p class="card-text">{{ Str::limit($cat_courses->description, 60) }}</p>
                            <!--<a href="#" class="btn btn-primary btn-sm">View</a>-->
                            <a href="http://127.0.0.1:8000/course-detail/1" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
        @endforeach

            </div>                             
    </div>









        </div>
    </div>
</div>

  <!-- Footer -->
  <footer class="bg-dark text-white mt-auto py-4">
    <div class="container text-center">
      <p>&copy; 2025 MyCourses. All rights reserved.</p>
      <p><a href="#" class="text-white">Contact Us</a> | <a href="#" class="text-white">About Us</a></p>
      <p>Email: support@mycourses.com | Phone: +91-9876543210</p>
    </div>
  </footer>
</body>
</html>
