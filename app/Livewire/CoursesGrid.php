<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Collection;

class CoursesGrid extends Component
{
    public string $query = '';

    /** @var Collection<\App\Models\Category> */
    public Collection $categories;

    public function mount(): void
    {
        $this->loadCourses();
    }

    public function updatedQuery(): void
    {
        $this->loadCourses();
        
    }

    public function loadCourses(): void
    {
        $query = $this->query;
        $this->categories = Category::with([
            'courses' => function ($courseQuery) use ($query) {
                if (!empty($query)) {
                    $courseQuery->where(function ($q) use ($query) {
                        $q->where('title', 'like', "%{$query}%")
                          ->orWhere('description', 'like', "%{$query}%");
                    });
                }
            }
        ])->get();
    }
    

    public function render()
    {
        return view('livewire.courses-grid', [
            'categories' => $this->categories,
        ]);
    }
}
