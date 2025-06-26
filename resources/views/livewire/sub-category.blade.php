<div>
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
            @forelse ($sub_categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ optional($category->created_at)->format('Y-m-d') }}</td>
                    <td>
                    <a href={{"categories/edit/$category->id"}}><button class="btn btn-sm btn-primary">Edit</button></a>
                        <button class="btn btn-sm btn-danger">Delete</button>
                        <a href={{"Categories/view/$category->id"}}><button class="btn btn-sm btn-info">View</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Sub Categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-2">
        {{ $sub_categories->links() }}
    </div>
</div>
