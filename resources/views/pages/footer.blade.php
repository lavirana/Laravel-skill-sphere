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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $('#search').on('input', function() {
    let query = $(this).val();

    $.ajax({
      url: '/ajax-search',
      method: 'GET',
      data: {
        query: query
      },
      success: function(data) {
        $('#results').html(data);
      }
    });
  });
</script>
<script>
  $(document).on('click', '.add_to_cart', function() {
    let courseId = $(this).data('course-id');
    let userId = $(this).data('user-id');
    let price = $(this).data('price');
    $.ajax({
      url: "/add-to-cart",
      type: "POST",
      data: {
        course_id: courseId,
        user_id: userId,
        price: price,
        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
      },
      success: function(response) {
        Swal.fire({
          title: "<strong>Added to <u>Cart</u></strong>",
          icon: "success",
          html: `
                  <a href="#" autofocus>Go to Cart</a>
                `,
          showCloseButton: false,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText: `<i class="fa fa-thumbs-up"></i> Great!`,
          confirmButtonAriaLabel: "Thumbs up, great!",
        });
      },
      error: function(xhr) {
        // Capture the error message
        if (xhr.responseJSON && xhr.responseJSON.message) {
          Swal.fire(xhr.responseJSON.message); // Shows "Course already in cart"
        } else {
          Swal.fire("Something went wrong!");
        }
      }
    })
  });
</script>
<script>
  $(document).ready(function() {
    var user_id = "{{ auth()->id() ?? 'null' }}";
     if(user_id){
      $.ajax({
        url: '/cart/pending-count',
            method: 'GET',
            data: { user_id: user_id },
            success: function(response) {
                if (response.success && response.count > 0) {
                    $('#cart-count-badge').removeClass('d-none').text(response.count);
                }
            },
            error: function(xhr) {
                console.error('Failed to fetch cart count');
            }
      });
     }
  });
</script>


  <script>
$(document).ready(function() {
    var userId = "{{ Auth::id() ?? 'null' }}";
    var courseId = courseId || "{{ $course->id ?? 'null' }}"; // Ensure courseId is defined

    if (userId) {
        $.ajax({
            url: '/cart/check-course',
            method: 'GET',
            data: {
                user_id: userId,
                course_id: courseId
            },
            success: function(response) {
                if (response.exists) {
                    $('#cart-btn-' + courseId).text('Go to Cart');
                    $('#cart-btn-' + courseId).removeClass('add_to_cart').addClass('go_to_cart');
                }
            },
            error: function(xhr) {
                console.log("Error checking cart status.");
            }
        });
    }

    $(document).on('click', '.go_to_cart', function() {
        window.location.href = '/my_cart'; // or wherever your cart page is
    });

});
</script>
</body>

</html>