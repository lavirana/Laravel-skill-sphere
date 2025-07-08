<div>
    <input
        type="text"
        class="form-control"
        placeholder="Search for anything..."
        wire:model.debounce.300ms="query"
    />

    @if(strlen($query) > 2)
        <div class="mt-3">
            @if($results->count())
                <ul class="list-group">
                    @foreach($results as $result)
                        <li class="list-group-item">
                            <strong>{{ $result->title }}</strong>
                            <p>{{ Str::limit($result->description, 100) }}</p>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="mt-2 text-muted">No results found.</p>
            @endif
        </div>
    @endif
</div>
