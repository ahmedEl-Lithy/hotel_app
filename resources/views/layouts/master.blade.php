<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel App</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('pickadate/lib/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/simple-sidebar.css') }}">
</head>
<body>
@include('partials.header')
<div class="main">
    @yield('content')
</div>
<div class="row column">
    <hr>
    <ul class="menu">
        <li class="float-right">Copyright 2017</li>
    </ul>
</div>
<script>
    $(document).foundation();
</script>
<script src="{{ asset('js/vendor/jquery.js') }}"></script>
<script src="{{ asset('js/vendor/what-input.js') }}"></script>
<script src="{{ asset('js/vendor/foundation.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('pickadate/lib/picker.js') }}"></script>
<script src="{{ asset('pickadate/lib/picker.date.js') }}"></script>
<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
    $('.datepicker').pickadate(
        {
            format: 'yyyy-mm-dd',
            formatSubmit: 'yyyy-mm-dd'
        }
    );
</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
</body>
</html>