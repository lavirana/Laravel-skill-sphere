<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <title>Bootstrap</title>


    <style>body {
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(222,11,11,1) 0%, rgba(0,212,255,1) 100%);
    }
    
    .container {
      background-color:white;
      padding: 20px;
      border-radius: 0px;
    }

</style>
</head>
<body>
    <br><br><br>
    <div class="container">
        <h2>Create post</h2>

        @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <!-- Form to create a new post -->
        <form method="post" action="{{ route('create_post') }}">
            @csrf
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Post Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="" placeholder="Enter your post title">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Post Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" placeholder="Add Post Content" id=""></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>
