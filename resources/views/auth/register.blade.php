<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Register</h1>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{session::get('success')}}
                    </div>
                @endif
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="password" required>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-grid">
                            <a href="{{route("loginpage")}}">Go to Login</a>
                        </div>
                    </div>
        </div>
    </div>
</div>


</body>
</html>
