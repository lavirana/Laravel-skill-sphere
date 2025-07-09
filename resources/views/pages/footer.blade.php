
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
</body>
</html>