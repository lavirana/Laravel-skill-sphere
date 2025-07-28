@extends('pages.layout')
@section('content')
<div class="container my-5">
    <div class="row">
    <div class="col-md-12">
<div class="container my-4" id="coursesContainer">
        <h4 style="margin: 15px 0 5px;">My Cart Items</h4>
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
