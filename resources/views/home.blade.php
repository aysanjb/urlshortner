<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Url Shortener</title>

    <!-- Bootstrap Core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="static/css/short.css" rel="stylesheet">
    <link href="static/images/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Shortener</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Home</a></li>
                <li><a href="#" data-toggle="modal" data-target="#aboutus">About</a></li>
                <li><a href="#" data-toggle="modal" data-target="#developers">Developers</a></li>
                <li><a>Total: <strong>{{sizeof($urls)}}</strong></a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->


<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h2>Link shortener <small>It's free and always will be.</small></h2>
            <hr class="colorgraph">


            <form id="urlform" role="form" method="POST" action="{{route('create')}}">
                @csrf

                <div class="form-group">
                    <div class="input-group">
                        <input type="url" name="url" id="url" class="form-control input-lg" placeholder="Paste URL" tabindex="1" required>
                        <span class="input-group-btn">
                    <button id="shrinkbtn" class="btn btn-success btn-block btn-lg" type="sumbit">Shrink</button>
                </span>
                    </div>
                    <br />
                </div>
            </form>
            <div id="shrinkresult">
            </div>

            <h3 class="text-center">{{sizeof($urls)}} Links</h3>

            @foreach(array_reverse($urls) as $url)
            <div class="list-group">
                <a href="{{url($url->shortener_url)}}" class="list-group-item">
                    <h4 class="list-group-item-heading">Short Url</h4>
                    <p class="list-group-item-text">{{url($url->shortener_url)}}</p>
                </a>
                <a  class="list-group-item">
                    <h4 class="list-group-item-heading">Original Url</h4>
                    <p class="list-group-item-text">{{$url->original_url}}</p>
                </a>

            </div>
            @endforeach

        </div>

    </div>

    <footer>
        <div class="row" style='position:relative;bottom:15px;left:5%; background:white;width:90%;'>
            <hr class="colorgraph">
            <a class="text-muted" href="#">Terms </a>
            <a class="text-muted" href="#">Privacy </a>
            <a href="https://www.facebook.com"><i id="social-fb" class="fa fa-facebook-square fa-2x social"></i></a>
            <a href="https://twitter.com"><i id="social-tw" class="fa fa-twitter-square fa-2x social"></i></a>
            <a href="https://plus.google.com"><i id="social-gp" class="fa fa-google-plus-square fa-2x social"></i></a>
            <a href="mailto:mail@example.com"><i id="social-em" class="fa fa-envelope-square fa-2x social"></i></a>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="static/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/clipboard.min.js"></script>
    <script src="static/js/app.js"></script>
</body>
</html>

