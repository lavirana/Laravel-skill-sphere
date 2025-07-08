

@foreach ($categories as $category)
    @if ($category->courses->isNotEmpty())
        <h4 style="margin: 15px 0 5px;">{{ $category->name }}</h4>

        <div class="row mb-4">
            @foreach ($category->courses as $course)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $course->image) }}"
                        onerror="this.onerror=null; this.src='http://127.0.0.1:8000/storage/default-image.jpg';"
                        class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 60) }}</p>
                            <!--<a href="#" class="btn btn-primary btn-sm">View</a>-->
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endforeach
