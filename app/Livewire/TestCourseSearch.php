<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course;   // adjust namespace if different

class TestCourseSearch extends Component
{
    public string $q = '';          // 🔑 bound to input
    public array  $courses = [];    // plain array (no models)

    public function mount()
    {
        $this->fetch();
    }

    public function updatedQ()      // fires whenever $q changes
    {
        $this->fetch();
    }

    private function fetch(): void
    {
        $this->courses = Course::query()
            ->when($this->q, function ($q) {
                    $q->where('title','like', "%{$this->q}%")
                  ->orWhere('description','like', "%{$this->q}%");
            })
            ->orderBy('title')
            ->take(20)                // limit for demo
            ->get(['id','title','description','image'])
            ->map(fn ($c) => [
                'id'    => $c->id,
                'title' => $c->title,
                'desc'  => $c->description,
                'img'   => $c->image_path,
            ])
            ->toArray();
    }

    public function render()
    {
        return view('livewire.test-course-search');
    }
}
