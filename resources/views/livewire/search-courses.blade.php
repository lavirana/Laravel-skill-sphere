<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Search</title>
    @livewireStyles
</head>
<body>
    <div style="padding: 20px; font-family: sans-serif;">
        <input
            type="text"
            wire:model.debounce.500ms="query"
            placeholder="Search courses by title"
            style="padding: 8px; width: 300px; font-size: 16px;">

        <ul style="margin-top: 20px;">
            @forelse ($courses as $title)
                <li>{{ $title }}</li>
            @empty
                <li><em>No matching courses found.</em></li>
            @endforelse
        </ul>
    </div>

    @livewireScripts
</body>
</html>
