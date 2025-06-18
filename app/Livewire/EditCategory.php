<?php

namespace App\Livewire;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditCategory extends Component
{
    use withFileUploads;
    public $image;
    public $existingImage;
    public $name;
    public $status = 'active'; // Default status is active
    public $category_id;

    public function mount($id){
        $this->category_id = $id;
        $category_detail = category::where('id', $id)->first();

        if($category_detail){
            $this->name = $category_detail->name;
            $this->existingImage = $category_detail->image; 
            $this->status = $category_detail->status;
        }
    }

    public function submit(){
        $this->validate([
            'name'=> 'required|string|max:255',
            'image' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $category = category::find($this->category_id);

        if (!$category) {
            session()->flash('error', 'Category not found.');
            return;
        }
        $category->name = $this->name;
        $category->status = $this->status;

        if($this->image){
            if($this->existingImage && Storage::exists($this->existingImage)){
                Storage::delete($this->existingImage);
            }
            $path = $this->image->store('category_thumbnails', 'public');
            $category->image = $path;
            // Update existingImage for preview after update
            $this->existingImage = $path;

             // Reset image input
             $this->image = null;
        }
        $category->save();
        session()->flash('success', 'Category updated successfully.');
    }

    public function render()
    {

        return view('livewire.edit-category');
    }
}
