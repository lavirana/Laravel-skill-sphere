

@extends('adminlte::page')
@section('title', 'Add Category')
@section('content_header')
    <h1>Category Detail</h1>
@stop
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $category_detail->name }}</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                @if($category_detail->image)
                    <img src="{{ asset('storage/' . $category_detail->image) }}" alt="Category Image" class="img-fluid rounded">
                @else
                    <p>No image available</p>
                @endif
            </div>

            <div class="col-md-8">
                <p><strong>Description:</strong></p>
                <p></p>

                <p><strong>Rating:</strong> {{ $category_detail->rating }} / 5</p>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <a href="{{ route('courses') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>


@stop


