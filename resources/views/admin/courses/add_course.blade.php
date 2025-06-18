@extends('adminlte::page')

@section('title', 'Add Course')

@section('content_header')
    <h1>Add New Course</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Course Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter course title" value="{{ old('title') }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">-- Choose Category --</option>
                            {{-- Example dynamic options --}}
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Course Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter course description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                
                    <div class="form-group">
                        <label for="image">Course Image</label>
                        <input type="file" class="form-control-file" id="imageInput" name="image">
                    </div>
                    <div class="mt-3">
                        <img id="imagePreview" src="#" alt="Preview will appear here" style="max-width: 200px; display: none;">
                    </div>

                    <div class="form-group">
                        <label for="price">Course Price (INR)</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter price">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create Course</button>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('imageInput').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file); // create temp URL
            preview.style.display = 'block';
        }
    });
</script>


@stop
