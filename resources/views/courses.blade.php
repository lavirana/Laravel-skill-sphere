@extends('pages.layout')
@section('content')
<div class="container my-5">
    <div class="row">
    <div class="col-md-12">
<div class="container my-4" id="coursesContainer">
        <h4 style="margin: 15px 0 5px;">{{ $category_courses->name }}</h4>
        <div class="row mb-4">
        @foreach($category_courses['courses'] as $cat_courses)
                <div class="col-md-3 mb-3">
                    <div class="card">
                    <img src="{{ asset('storage/' . $cat_courses->image) }}"
                        onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';"
                        class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cat_courses->title }}</h5>
                            <p class="card-text">{{ Str::limit($cat_courses->description, 60) }}</p>
                            <!--<a href="#" class="btn btn-primary btn-sm">View</a>-->
                            <a href="http://127.0.0.1:8000/course-detail/1" class="btn btn-primary btn-sm">View</a>
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
