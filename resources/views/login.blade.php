@include('pages.user_auth.header')

  <!-- Main -->
  <div class="flex flex-col lg:flex-row min-h-screen">
    
    <!-- Illustration -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
      <img src="uploads/log.jpeg" 
           alt="Illustration" class="max-w-md w-full">
    </div>

    <!-- Login Box -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center p-8">
      <h2 class="text-3xl font-bold mb-6">Log in to continue your<br>learning journey</h2>
      
      <form class="space-y-4" method="post" action="{{ route('user_login') }}">
        @csrf

        <div>
          <label class="block mb-1 font-medium">Email</label>
          <input type="email" class="w-full border border-gray-300 p-3 rounded form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email"  name="email"/>
          @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <div>
          <label class="block mb-1 font-medium">Password</label>
          <input type="password" class="w-full border border-gray-300 p-3 rounded form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password"  name="password"/>
          @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        <button class="w-full bg-purple-600 text-white p-3 rounded hover:bg-purple-700">
          📧 Continue with email
        </button>
      </form>

      <!-- Other login options -->
      <div class="mt-8 text-sm space-y-3">
        <p>
          <a href="#" class="text-purple-600 underline font-medium">Log in to a different account</a>
        </p>
        <p>
          Don't have an account? 
          <a href="#" class="text-purple-600 underline font-medium">Sign up</a>
        </p>
        <p>
          <a href="#" class="text-purple-600 underline font-medium">Log in with your organization</a>
        </p>
      </div>
    </div>
  </div>

</body>
</html>
