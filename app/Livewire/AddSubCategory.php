<?php

namespace App\Livewire;

use App\Models\SubCategory as ModelsSubCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Livewire\TemporaryUploadedFile;

class AddSubCategory extends Component
{

    use WithFileUploads;
    use WithPagination;
    public $id;   // holds the passed category id
    public $image;
    public $name;

    public function mount($id)
    {
        $this->id = $id;
        
    }


    public function submit(){
        $this->validate([
            "name" => "required|unique:sub_categories,name",
            "image" => "required|image"
        ]);
        $filepath = $this->image->store("sub_category_thumbnails", "public");
        ModelsSubCategory::create([
            "name" => $this->name,
            'image' => $filepath,
            'category_id' => $this->id
        ]);
        session()->flash('success', 'Sub Category has been created successfully');
        session()->flash('error', 'Something went wrong');
  
        $this->reset(['name', 'image']);
        return redirect()->route('categories');
    }


    public function render()
    {
        return view('livewire.add-sub-category');
    }

    
}
