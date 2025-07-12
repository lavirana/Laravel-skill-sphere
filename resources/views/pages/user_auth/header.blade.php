<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TechCrafters</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <stylesheet href="{{ asset('style/custom.css') }}">    
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
<body class="bg-white font-sans">
  <!-- Header -->
  <header class="flex items-center justify-between px-6 py-4 border-b shadow-sm">
    <div class="flex items-center space-x-6">
      <!-- Logo -->
      <div class="text-purple-700 font-bold text-2xl">
        <a href="/">
        <span class="italic">TechCrafters</span>
        </a>
      </div>
      <!-- Explore Dropdown -->
      <a href="#" class="text-gray-700 hover:text-black font-medium">Explore</a>
      <!-- Search Bar -->
      <div class="hidden md:block">
        <input type="text" placeholder="Search for anything"
               class="w-80 px-4 py-2 border rounded-full focus:outline-none focus:ring-1 focus:ring-purple-600" />
      </div>
    </div>
    <div class="flex items-center space-x-4">
      <a href="#" class="text-sm font-medium hover:underline">Plans & Pricing</a>
      <a href="#" class="text-sm font-medium hover:underline">TechCrafters Business</a>
      @auth
      <div class="dropdown">
    <button class="btn btn-outline-dark dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: var(--bs-btn-hover-color);
    background-color: var(--bs-btn-hover-bg);
    border-color: var(--bs-btn-hover-border-color);">
        <span class="bg-dark text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 35px; height: 35px;">
            {{ strtoupper(Auth::user()->name[0]) }}
        </span>
        <span class="ms-2">{{ Auth::user()->name }}</span>
    </button>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="">Dashboard</a></li>
        <li><a class="dropdown-item" href="#">Edit Profile</a></li>
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
      <a href="/ulogin" class="text-sm border px-4 py-2 rounded hover:bg-gray-100">Log in</a>
      <a href="/signup" class="text-sm bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Sign up</a>
      @endauth
      <!-- Language Selector Icon -->
    </div>
  </header>