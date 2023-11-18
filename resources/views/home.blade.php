<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorten link</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>

<div class="container mt-5">
    @if(session('success'))
        <div class=" alert alert-success">{{session('success')}}</div>
    @endif
@if(isset($url))
    {{$url}}
@endif
    <div class="card">
        <form class="card-header" method="post" action="{{route('create')}}">

                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="url" class="form-control" placeholder="Enter URL">

                    <div class="input-group-addon">
                        <button class="btn btn-success"> Generate Shorter Link</button>

        </div>
    </div>
            @foreach($urls as $url)
            {{$url->original_url}} : {{$url->shortener_url}}<br>
@endforeach

</body>
</html>
