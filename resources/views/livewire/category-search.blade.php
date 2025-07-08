<div>
<div class="container py-4">
    <input type="text"
           wire:model.debounce.400ms="query"
           class="form-control mb-3"
           placeholder="Search categories…">

    @if ($query)
        <p class="text-muted">You typed: <strong>{{ $query }}</strong></p>
    @endif

    <ul class="list-group">
        @forelse ($results as $name)
            <li class="list-group-item">{{ $name }}</li>
        @empty
            <li class="list-group-item text-muted">No matching categories.</li>
        @endforelse
    </ul>
</div>

</div>
