<?php

namespace App\Livewire;

use App\Models\category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\App;
use App\Livewire\TemporaryUploadedFile;

class AddCategory extends Component
{
 use WithFileUploads;
    public $name;
    public $image;
    public function render()
    {
        return view('livewire.add-category');
    }


    public function submit(){
        $this->validate([
            "name" => "required|unique:categories,name",
            "image" => "required|image"
        ]);
        $filepath = $this->image->store("category_thumbnails", "public");
        category::create([
            "name" => $this->name,
            'image' => $filepath
        ]);
        session()->flash('success', 'Category has been created successfully');
        session()->flash('error', 'Something went wrong');
  
        $this->reset(['name', 'image']);
        return redirect()->route('categories');
       

    }
}
