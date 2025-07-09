<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - Udemy Style</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <stylesheet href="{{ asset('style/custom.css') }}">    
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
      <a href="#" class="text-sm font-medium hover:underline">Udemy Business</a>
      <a href="#" class="text-sm font-medium hover:underline">Teach on Udemy</a>

      <a href="/login" class="text-sm border px-4 py-2 rounded hover:bg-gray-100">Log in</a>
      <a href="/signup" class="text-sm bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Sign up</a>

      <!-- Language Selector Icon -->
      <button class="text-xl">🌐</button>
    </div>
  </header>