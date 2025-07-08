<div class="container py-4">
   
           <input type="text" class="form-control mb-4" placeholder="Type to search..." wire:model.debounce.500ms="query">
    <h5 class="mb-3">Search Results for: <strong>{{ $q }}</strong></h5>

    <div class="row g-3">
        @foreach($courses as $c)
            <div class="col-md-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="card-title">{{ $c['title'] }}</h6>
                        <p class="card-text small text-muted">
                            {{ \Illuminate\Support\Str::limit($c['desc'], 60) }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(empty($courses))
        <p class="text-muted">No results.</p>
    @endif
</div>
