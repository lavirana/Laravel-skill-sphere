<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name">
            
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror 
        </div>

        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" wire:model="image" class="form-control @error('name') is-invalid @enderror" id="image">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Category Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Create Category</button>
    </form>
</div>
