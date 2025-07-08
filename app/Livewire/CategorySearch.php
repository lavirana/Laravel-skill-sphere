<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;   // ← your Category model

class CategorySearch extends Component
{
    public string $query = '';      // bound to the input
    public array  $results = [];    // plain array of titles

    public function updatedQuery(): void
    {
        $this->runSearch();
    }

    public function mount(): void
    {
        $this->runSearch();
    }

    private function runSearch(): void
    {
        $q = trim($this->query);
    
        $this->results = Category::query()
            ->when($q !== '', fn ($builder) =>
                $builder->whereRaw('name COLLATE utf8mb4_general_ci LIKE ?', ["%{$q}%"])
            )
            ->orderBy('name')
            ->limit(15)
            ->pluck('name')
            ->toArray();
    }
    

    public function render()
    {
        return view('livewire.category-search');
    }
}
