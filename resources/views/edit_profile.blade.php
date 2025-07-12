<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Add this inside the <head> or before </body> -->
 

</head>
<body>

<!-- Header/Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
  <a class="navbar-brand fw-bold" href="/">TechCrafters</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav me-auto">
      <li class="nav-item"><a class="nav-link" href="#">Explore</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Plans & Pricing</a></li>
    </ul>
    <form class="d-flex me-3">
      <input class="form-control me-2" type="search" placeholder="Search for anything">
    </form>
    <!-- User Dropdown -->
    <div class="dropdown">
      <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
      {{ strtoupper(Auth::user()->name[0]) }} {{ Auth::user()->name }}
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a class="dropdown-item" href="{{ route('edit_profile') }}">Edit Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Main Section -->
<div class="container my-4" id="coursesContainer" style="border: 1px solid #0000001f;
    padding: 1%; padding: 0px 13px 0px 13px;">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
      <div class="text-center mb-4">
        <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center mx-auto" style="width: 80px; height: 80px; font-size: 24px;">
          AR
        </div>
        <p class="fw-bold mt-2">Ashish Rana</p>
      </div>
      <ul class="list-group">
        <li class="list-group-item active">Profile</li>
        <li class="list-group-item">Photo</li>
        <li class="list-group-item">Account Security</li>
        <li class="list-group-item">Subscriptions</li>
        <li class="list-group-item">Payment methods</li>
        <li class="list-group-item">Privacy</li>
        <li class="list-group-item">Notification Preferences</li>
        <li class="list-group-item">API Clients</li>
        <li class="list-group-item text-danger">Close account</li>
      </ul>
    </div>

    <!-- Profile Form -->
    <div class="col-md-9" style="background-color: #80808017;
    padding: 5px 6px 5px 10px; border-left: 1px solid #0000002b;">
      <h3 class="mb-4">Public profile</h3>



      <form method="post" action="{{ route('update_profile') }}">
        @csrf
        <!-- Basics -->
        <div class="mb-3">
          <label class="form-label fw-bold">Basics</label>
          <div class="row">
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" value="Ashish" name="first_name">
              @error('first_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-2">
              <input type="text" class="form-control" placeholder="Last name" value="Rana" name="last_name">
              @error('last_name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <input type="text" class="form-control mb-2" placeholder="Headline" name="headline" >
          <small class="text-muted">Add a professional headline like, "Instructor at Udemy" or "Architect."</small>
        </div>

        <!-- Biography -->
        <div class="mb-3">
          <label class="form-label fw-bold">Biography</label>
          <div class="btn-group mb-2" role="group">
            <button type="button" class="btn btn-outline-secondary btn-sm fw-bold">B</button>
            <button type="button" class="btn btn-outline-secondary btn-sm fst-italic">/</button>
          </div>
          <textarea name="biography" id="biography" rows="5" class="form-control"></textarea>
          <small class="text-muted">Links and coupon codes are not permitted in this section.</small>
        </div>

        <!-- Language -->
        <div class="mb-3">
          <label class="form-label fw-bold">Language</label>
          <select class="form-select">
            <option selected>English (US)</option>
            <option>Hindi</option>
            <option>Spanish</option>
          </select>
        </div>

        <!-- Social Links -->
        <div class="mb-4">
          <label class="form-label fw-bold">Links</label>
          <input type="url" class="form-control mb-2" placeholder="Website (http://...)">
          <input type="text" class="form-control mb-1" placeholder="facebook.com/ Username">
          <small class="text-muted">Input your Facebook username (e.g. johnsmith).</small>

          <input type="text" class="form-control mt-2 mb-1" placeholder="instagram.com/ Username">
          <small class="text-muted">Input your Instagram username (e.g. johnsmith).</small>

          <input type="text" class="form-control mt-2 mb-1" placeholder="linkedin.com/ Public Profile URL">
          <small class="text-muted">e.g. in/johnsmith, company/udemy</small>

          <input type="text" class="form-control mt-2 mb-1" placeholder="tiktok.com/ @Username">
          <small class="text-muted">Input your TikTok username (e.g. @johnsmith).</small>

          <input type="text" class="form-control mt-2 mb-1" placeholder="x.com/ Username">
          <small class="text-muted">Add your X username (e.g. johnsmith).</small>

          <input type="text" class="form-control mt-2 mb-1" placeholder="youtube.com/ Username">
          <small class="text-muted">Input your YouTube username (e.g. johnsmith).</small>
        </div>

        <!-- Save Button -->
        <button type="submit" class="btn btn-primary px-4">Save</button>
      </form>
    </div>
  </div>
</div>
<br>

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
  <script src="https://cdn.ckeditor.com/4.25.1-lts/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('biography');
</script>
</body>
</html>
