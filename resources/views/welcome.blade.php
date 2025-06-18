<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Course Platform</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .course-card:hover {
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
      transform: translateY(-3px);
      transition: 0.3s ease;
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
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
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
        <li class="nav-item"><a class="nav-link" href="#">AWS</a></li>
        <li class="nav-item"><a class="nav-link" href="#">JavaScript</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Java</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Python</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Machine Learning</a></li>
      </ul>
    </div>
  </nav>

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
<div class="my-4" style="padding: 0px 0px 22px 0px;
    background-color: #f0f8ff47;
    border-bottom: 2px solid hsl(225deg 4.3% 81.6% / 18%);">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <form class="d-flex justify-content-center">
  <input 
    type="search" 
    class="form-control" 
    placeholder="Search for anything" 
    aria-label="Search"
    style="
      padding: 12px 15px 12px 35px; 
      border-radius: 20px;
      background: url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/icons/search.svg') no-repeat 10px center;
      background-size: 16px 16px;
    "
  >
</form>

    </div>
  </div>
</div>

  <!-- Course Categories and Cards -->
  <div class="container my-4">

    <h4><b>AWS Courses</b></h4>
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">AWS Basics</h5>
            <p class="card-text">Intro to AWS Cloud Services.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">AWS Advanced</h5>
            <p class="card-text">Deep dive into AWS solutions.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">AWS Advanced</h5>
            <p class="card-text">Deep dive into AWS solutions.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">AWS Advanced</h5>
            <p class="card-text">Deep dive into AWS solutions.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
    </div>

    <h4><b>JavaScript Courses</b></h4>
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">JS Fundamentals</h5>
            <p class="card-text">Learn the basics of JS programming.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">JS Advanced</h5>
            <p class="card-text">Master modern JS techniques.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">JS Advanced</h5>
            <p class="card-text">Master modern JS techniques.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">JS Advanced</h5>
            <p class="card-text">Master modern JS techniques.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
    </div>

    <h4><b>Java Courses</b></h4>
    <div class="row g-3 mb-4">
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Java for Beginners</h5>
            <p class="card-text">Start coding with Java today.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Java OOP</h5>
            <p class="card-text">Master object-oriented concepts in Java.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Java OOP</h5>
            <p class="card-text">Master object-oriented concepts in Java.</p>
            <a href="#" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card course-card">
          <img src="http://127.0.0.1:8000/storage/category_thumbnails/tiAj3z7AMNs0Mnh5AJ69e82asZRPo7TvDURNn1zQ.jpg" class="card-img-top" alt="">
          <div class="card-body">
            <h5 class="card-title">Java OOP</h5>
            <p class="card-text">Master object-oriented concepts in Java.</p>
            <a href="#" class="btn btn-primary">View</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
