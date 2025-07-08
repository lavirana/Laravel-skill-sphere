<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;

class SearchPosts extends Component
{
    public $query = '';

    public function render()
    {
        $results = [];

        if (strlen($this->query) > 2) {
            $results = Course::where('title', 'like', '%' . $this->query . '%')
                ->orWhere('description', 'like', '%' . $this->query . '%')
                ->get();
        }

        return view('livewire.search-posts', [
            'results' => $results
        ]);
    }
}
