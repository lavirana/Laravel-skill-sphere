<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" 
            placeholder="Enter category name">
            
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror 
        </div>

        <div class="form-group">
            <label for="name">Category Status</label>
            <div class="form-text">Select the status of the category.</div>
            {{-- Radio buttons for status --}}
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" value="active" name="status" id="statusActive">
                <label class="form-check-label" for="statusActive">Active</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="status" value="inactive" name="status" id="statusinActive">
                <label class="form-check-label" for="statusActive">In-Active</label>
            </div>
        <div class="form-group">
            <label for="image">Category Image</label>
            <input type="file" wire:model="image" class="form-control @error('image') is-invalid @enderror" id="image">

            <small class="form-text text-muted">Upload a new image for the category. Leave blank to keep the existing image.</small>

            {{-- Display existing image if available --}}

            {{-- New uploaded image preview (temporary file) --}}
            @if ($image)
    {{-- New uploaded image preview --}}
                <div class="mt-2">
                    <p>New Image Preview:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="New Image" style="max-width: 200px;">
                </div>
            @elseif ($existingImage)
                {{-- Existing saved image --}}
                <div class="mt-2">
                    <p>Current Image:</p>
                    <img src="{{ Storage::url($existingImage) }}" alt="Current Image" style="max-width: 200px;">
                </div>
            @endif

            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update Category</button>
    </form>
</div>
