<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="submit" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Course Title</label>
                        <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter course title" @if($mode == 'view') disabled @endif>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select wire:model="category_id" id="category" class="form-control" @if($mode == 'view') disabled @endif>
                            <option value="">-- Choose Category --</option>
                            @foreach($categories as $category)
                                <option @if($category_id === $category->id) checked  @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Course Description</label>
                        <textarea wire:model="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter course description" @if($mode == 'view') disabled @endif></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Course Image</label>
                        <input type="file" wire:model="image" class="form-control-file" id="image" @if($mode == 'view') disabled @endif>

                        @if ($image)
                            <div class="mt-3">
                                <img src="{{ $image->temporaryUrl() }}" alt="New Image Preview" style="max-width: 200px;">
                            </div>
                        @elseif ($existingImage)
                            <div class="mt-3">
                                <img src="{{ Storage::url($existingImage) }}" alt="Current Image" style="max-width: 200px;">
                            </div>
                        @endif

                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Course Price (INR)</label>
                        <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter price" @if($mode == 'view') disabled @endif>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary" @if($mode == 'view') disabled @endif>
                        {{ $mode === 'add' ? 'Create Course' : 'Update Course' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
