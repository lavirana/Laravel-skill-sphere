@extends('pages.layout')
@section('content')

<style>
    .cart-container {
  max-width: 800px;
  margin: 0 auto;
  font-family: sans-serif;
}
.cart-item {
  display: flex;
  align-items: flex-start;
  border-bottom: 1px solid #ccc;
  padding: 15px 0;
}
.cart-item img {
  margin-right: 15px;
}
.details {
  flex-grow: 1;
}
.details h3 {
  margin: 0;
  font-size: 18px;
}
.tag {
  background-color: #6136e6;
  color: white;
  padding: 2px 8px;
  font-size: 12px;
  border-radius: 4px;
}
.actions a {
  font-size: 13px;
  color: #0056d2;
  text-decoration: none;
}
.price {
  font-weight: bold;
  font-size: 16px;
  margin-left: 10px;
}
.cart-summary {
  text-align: right;
  padding: 20px 0;
}
.cart-summary button {
  background-color: #6136e6;
  color: white;
  border: none;
  padding: 10px 20px;
  margin-left: 10px;
  cursor: pointer;
}

</style>

<div class="container mt-5">
  <h2>Shopping Cart</h2>
  <p>{{ $cartItems->count() }} Courses in Cart</p>

  <div class="row">
    <!-- Left: Cart Items -->
    <div class="col-md-8">

      <!-- Cart Item 1 -->
      @foreach($cartItems as $cartItem)
      <div class="cart-item d-flex mb-4">
        <img src="{{ asset('storage/' . $cartItem->courses->image) }}"
        onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';" alt="Course Image" width="120" />
        <div class="ml-3">
          <h5>{{ $cartItem->courses->title }}</h5>
          <p class="mb-1">By {{ $cartItem->user->name }}</p>
          <p class="mb-1 text-warning">⭐ 4.5 (30 ratings)</p>
          <!--<p class="mb-1">119 total hours • 699 lectures • All Levels</p>-->
          <span class="badge badge-primary">Premium</span>
          <div class="mt-2">
            <a href="#">Remove</a> |
            <a href="#">Save for Later</a> |
            <a href="#">Move to Wishlist</a>
          </div>
        </div>
        <div class="ml-auto font-weight-bold">₹ {{ $cartItem->courses->price }}</div>
      </div>
@endforeach

    </div>

    <!-- Right: Total & Checkout -->
    <div class="col-md-4">
      <div class="card p-4">
      @php
    $total = $cartItems->sum('price');
    @endphp
        <h4>Total: ₹{{ number_format($total) }}</h4>
        <div id="cart-summary">
            <button id="checkout-btn" class="btn btn-primary mt-3" style="width: 100%;">Proceed to Checkout</button>
        </div>
       <!-- Apply Coupon Button -->
        <button id="show-coupon" class="btn btn-outline-secondary my-1">Apply Coupon</button>

        <!-- Coupon Form (initially hidden) -->
        <div id="coupon-form" style="display: none;" class="my-1">
            <input type="text" class="form-control mb-2" placeholder="Enter coupon code" id="coupon-code">
            <button class="btn btn-success" id="apply-coupon">Apply</button>
        </div>
      
        <!-- Hidden checkout section -->
        <div id="checkout-section" style="display: none;">
            <!-- Inside #checkout-section -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<button id="pay-btn" class="btn btn-success">Pay ₹18494</button>

<script>
    $('#pay-btn').click(function () {
        var options = {
            "key": "rzp_test_YourKeyHere", // Replace with your Test Key ID
            "amount": 1849400, // in paise (₹18494)
            "currency": "INR",
            "name": "TechCrafters",
            "description": "Course Payment",
            "handler": function (response) {
                // Handle payment success
                alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
            },
            "prefill": {
                "name": "Lavi",
                "email": "lavi@example.com"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp = new Razorpay(options);
        rzp.open();
    });
</script>

        </div>

      </div>
    </div>
  </div>
</div>



<div class="container my-5">
    <div class="row">
    <div class="col-md-12">
<div class="container my-4" id="coursesContainer">
        <h4 style="margin: 15px 0 5px;"><strong>You might also like</strong></h4>
        <br>
        <div class="row mb-4">
@foreach($cartItems as $cartItem)
                <div class="col-md-3 mb-3">
                    <div class="card">
                    <img src="{{ asset('storage/' . $cartItem->courses->image) }}"
                        onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';"
                        class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cartItem->courses->title }}</h5>
                            <p class="card-text">{{ $cartItem->courses->description }}</p>
                            <!--<a href="#" class="btn btn-primary btn-sm">View</a>-->
                            <a href="http://127.0.0.1:8000/course-detail/2" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
    @endforeach

            </div>                             
    </div>
        </div>
    </div>
</div>
@endsection
