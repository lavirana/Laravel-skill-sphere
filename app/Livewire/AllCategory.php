<?php

namespace App\Livewire;

use App\Models\category;
use Livewire\Component;
use Livewire\WithPagination;

class AllCategory extends Component
{
    use withPagination;
    public function render()
    {
        return view('livewire.all-category', ['categories' => category::latest()->paginate(10)
    ]);
    }
}
