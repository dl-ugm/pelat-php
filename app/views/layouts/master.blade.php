<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pelatihan Himpasikom &raquo; Aplikasi CRUD Sederhana</title>
    {{ HTML::style('todc-bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('todc-bootstrap/css/todc-bootstrap.min.css') }}
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row">
            <div class="col-xs-12">
                <h1 class="clearfix">
                    <a href="{{ URL::to('/') }}">Aplikasi CRUD sederhana dengan Laravel</a>
                    <a class="btn btn-primary pull-right" href="{{ URL::to('/post/create') }}">
                        <span class="glyphicon glyphicon-plus"></span> Add New Post
                    </a>
                </h1>
                <h4>Disampaikan pada Pelatihan PHP oleh Himpasikom UGM tahun 2014</h4>
                <hr/>
            </div>
        </div><!-- end of Header -->
        @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12">
                @yield('content')
            </div>
        </div>
        <!-- Start of Footer -->
        <div class="row">
            <div class="col-xs-12">
                <hr/>
                <small>copyright &copy; Himpasikom UGM 2014</small>
            </div>
        </div><!-- end of Footer -->
    </div>
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('todc-bootstrap/js/bootstrap.min.js') }}
</body>
</html>