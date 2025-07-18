<div>
<style>
    svg {
        width: 1.25rem !important; /* 20px */
        height: 1.25rem !important;
    }

    .pagination svg {
        width: 1.25rem !important;
        height: 1.25rem !important;
    }
</style>


    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ optional($category->created_at)->format('Y-m-d') }}</td>
                    <td>
                    <a href={{"categories/edit/$category->id"}}><button class="btn btn-sm btn-primary">Edit</button></a>
                        <button class="btn btn-sm btn-danger">Delete</button>
                        <a href={{"Categories/view/$category->id"}}><button class="btn btn-sm btn-info">View</button></a>
                        <a href={{"sub_categories/$category->id"}}><button class="btn btn-sm btn-info">View Sub Categories</button></a>
                        <a href="{{"sub_categories/add/$category->id"}}"><button  class="btn btn-sm btn-primary">Add Sub category</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-2">
        {{ $categories->links() }}
    </div>
</div>
