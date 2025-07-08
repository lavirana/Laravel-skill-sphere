<div class="container">
    <input type="text" wire:model.debounce.500ms="query" class="form-control mb-4" placeholder="Type to search...">
   
    @if ($query)
        <p class="text-muted mt-2">You typed: <strong>{{ $query }}</strong></p>
    @endif

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse ($categories as $category)
            @foreach ($category->courses as $course)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($course->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <div class="col">
                <p>No courses found.</p>
            </div>
        @endforelse
    </div>
</div>
