<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class SearchCourses extends Component
{
    public string $query = '';

    public function render()
    {
        $courses = Course::query()
            ->when($this->query !== '', function ($q) {
                $q->where('title', 'like', '%' . $this->query . '%');
            })
            ->pluck('title');

        return view('livewire.search-courses', [
            'courses' => $courses,
        ]);
    }
}

