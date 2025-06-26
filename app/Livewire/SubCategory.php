<?php

namespace App\Livewire;

use App\Models\SubCategory as ModelsSubCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Livewire\TemporaryUploadedFile;

class SubCategory extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $id;   // holds the passed category id
    public $image;

    public function mount($id)
    {
        $this->id = $id;
        
    }


    public function render()
    {
        return view('livewire.sub-category',['sub_categories' => ModelsSubCategory::where('category_id',$this->id)->latest()->paginate(10)]);
    }
}
