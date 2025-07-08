<!DOCTYPE html>
<html>
<head>
    <title>Search Courses</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        ul { margin-bottom: 20px; }
        li { margin-left: 20px; }
    </style>
</head>
<body>

    <input type="text" id="search" placeholder="Search course titles..." style="width: 300px; padding: 8px;">

    <div id="results">
        @include('search_results', ['categories' => $categories])
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#search').on('input', function () {
            let query = $(this).val();

            $.ajax({
                url: '/ajax-search',
                method: 'GET',
                data: { query: query },
                success: function (data) {
                    $('#results').html(data);
                }
            });
        });
    </script>

</body>
</html>
