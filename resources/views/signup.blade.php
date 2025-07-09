@include('pages.user_auth.header')

  <!-- Main Content -->
  <div class="flex flex-col lg:flex-row min-h-screen">
    
    <!-- Left Side Illustration -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
      <img src="uploads/log.jpeg" 
           alt="Illustration" class="max-w-md w-full">
    </div>

    <!-- Right Side Form -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center p-8">
      <h2 class="text-3xl font-semibold mb-6">Sign up with email</h2>
      @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

      <form class="space-y-4" method="post" action="{{ route('user_signup') }}">
        @csrf
        <div>
          <label class="block mb-1 font-medium">Full name</label>
          <input type="text" placeholder="Full name" name="name" class="w-full border border-gray-300 p-3 rounded form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
          @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror 
        </div>
        
        <div>
          <label class="block mb-1 font-medium">Email</label>
          <input type="email" class="w-full border border-gray-300 p-3 rounded form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email"  name="email"/>
          @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div class="flex items-start">
          <input type="checkbox" id="offers" checked class="mr-2 mt-1" />
          <label for="offers" class="text-sm text-gray-600">Send me special offers, personalized recommendations, and learning tips.</label>
        </div>

        <button type="submit" value="submit" class="w-full bg-purple-600 text-white p-3 rounded hover:bg-purple-700">
          📧 Continue with email
        </button>
      </form>

      <div class="my-6 text-center text-gray-500 text-sm">Other sign up options</div>

      <div class="flex space-x-4 justify-center">
        <button class="border p-2 px-4 rounded shadow-sm">🔍 Google</button>
        <button class="border p-2 px-4 rounded shadow-sm">📘 Facebook</button>
        <button class="border p-2 px-4 rounded shadow-sm">🍎 Apple</button>
      </div>

      <p class="text-xs text-gray-500 mt-6 text-center">
        By signing up, you agree to our <a href="#" class="underline">Terms of Use</a> and <a href="#" class="underline">Privacy Policy</a>.
      </p>

      <p class="text-center mt-4 text-sm">
        Already have an account? <a href="#" class="text-purple-600 underline">Log in</a>
      </p>
    </div>
  </div>

</body>
</html>
