@extends('adminlte::page')

@section('title', 'Courses')

@section('content_header')
<h1>Courses</h1>
@stop

@section('content')
<p>This is the admin courses page.</p>

<div class="row">

@if(isset($courses) && $courses->count() > 0)
@foreach($courses as $course)
    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">{{ $course->title }}</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <span class="badge badge-primary">Label</span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <img src="{{ asset('storage/' . $course->image) }}" alt="">
            <div class="card-body">
            {{ $course->description }}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>   <a style="float: right;
    font-size: revert;" class="btn btn-primary"  href="{{"courses/$course->id"}}">View</a> 
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    @endforeach
    @endif

</div>

<!-- /.card -->
@stop