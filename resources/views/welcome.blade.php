<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Course Platform</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
      @foreach($all_categories as $category)
        <li class="nav-item dropdown position-relative">
          <a class="nav-link" href={{ "category-courses/$category->id" }}>{{ $category->name }}</a>
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



  <!-- Footer -->
  <footer class="bg-dark text-white mt-auto py-4">
    <div class="container text-center">
      <p>&copy; 2025 MyCourses. All rights reserved.</p>
      <p><a href="#" class="text-white">Contact Us</a> | <a href="#" class="text-white">About Us</a></p>
      <p>Email: support@mycourses.com | Phone: +91-9876543210</p>
    </div>
  </footer>
  @livewireScripts 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('#search').on('input', function () {
            let query = $(this).val();

            $.ajax({
                url: '/ajax-search',
                method: 'GET',
                data: { query: query },
                success: function (data) {
                    $('#results').html(data);
                }
            });
        });
    </script>



  <!--<script>
    function loadData() {
    const token = localStorage.getItem('token');

    fetch('/api/courses', {
        method: 'GET',
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.data);

        const allCourses = data.data; // object: { "Category Name": [courses], ... }
        const coursesContainer = document.getElementById('coursesContainer'); // Use correct ID

        // Clear previous content
        coursesContainer.innerHTML = '';

        // Loop through each category
        Object.entries(allCourses).forEach(([categoryName, courses]) => {
            const categoryBlock = document.createElement('div');
            categoryBlock.style.marginBottom = '4%'; // or any value like '2rem', '1em'
            categoryBlock.innerHTML = `<h4>${categoryName}</h4>`;

            const row = document.createElement('div');
            row.className = 'row g-3 mb-4';

            // Loop through each course under the category
            courses.forEach(course => {
              const shortDesc = course.description.length > 90 
    ? course.description.substring(0, 90) + '...' 
    : course.description;
                const courseCard = `
                <div class="col-md-3">
                    <div class="card course-card">
                       <img 
  src="http://127.0.0.1:8000/storage/${course.image}" 
  class="card-img-top" 
  alt="${course.title}"
  onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';"
/>
                        <div class="card-body">
                            <h5 class="card-title">${course.title}</h5>
                            <p class="card-text">${shortDesc}</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>`;
                row.innerHTML += courseCard;
            });

            categoryBlock.appendChild(row);
            coursesContainer.appendChild(categoryBlock);
        });
    })
    .catch(error => {
        console.error('Error loading courses:', error);
    });
}

    loadData();
  </script>-->
  
</body>
</html>
