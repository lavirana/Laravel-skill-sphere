<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\category;
use App\Models\Course;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ManageCourse extends Component
{
    use withFileUploads;
    public $course_id;    // Null for add, filled for edit/view
    public $name;
    public $title;
    public $description;
    public $status = 'active';
    public $image;
    public $price;
    public $existingImage;
    public $mode = 'add'; // 'add', 'edit', 'view'
    public $categories = [];   // This will hold all categories
    public $category_id;       // This will bind to the dropdown selected value

    public function mount($id)
{

    $this->categories = Category::all();
    $this->course_id = $id;
    $this->mode = $id ? 'edit' : 'add'; // Determine mode based on ID presence
    $course_detail = Course::where('id', $id)->first();
    if($course_detail){
        $this->name = $course_detail->title;
        $this->description = $course_detail->description;
        $this->status = $course_detail->status;
        $this->price = $course_detail->price;
        $this->existingImage = $course_detail->image; // Assuming image is a string path
        $this->category_id = $course_detail->category_id; // Assuming category_id is a foreign key
    }

    // Optionally pre-fill category_id if editing
    // Example: $this->category_id = $existingCourse->category_id;
}

public function submit(){
    $this->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    if ($this->image) {
        if ($this->existingImage) {
            Storage::disk('public')->delete($this->existingImage);
        }
        $path = $this->image->store('course_thumbnails', 'public');
    } else {
        $path = $this->existingImage;
    }

    Course::updateOrCreate(
        ['id' => $this->course_id],
        [
            'title' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'image' => $path,
        ]
    );

    session()->flash('message', $this->mode === 'edit' ? 'Course added successfully.' : 'Course updated successfully.');
    return redirect()->route('courses'); // Redirect to the course listing page
}

    public function render()
    {
        return view('livewire.manage-course');
    }
}
