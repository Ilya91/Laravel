<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jumbotron Template for Bootstrap</title>
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">

</head>

<body>
@include('components.main-menu')
<main role="main" style="padding-top: 80px" id="app">
    @include('components.breadcrumbs')
    @yield('content')
</main>

<footer class="container">
    <p>&copy; Company 2017-2018</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ mix('js/app.js', 'build') }}"></script>
{{--<script src="{{ mix('react/app.js', 'build') }}"></script>--}}
</body>
</html>
