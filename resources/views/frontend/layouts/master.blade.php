<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Arthafal</title>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{asset('frontend/library/bootstrap/css/bootstrap.css')}}">
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="{{asset('frontend/library/bootstrap-icons-1.7.2/bootstrap-icons.css')}}">

    <!-- SLICK -->
    <link rel="stylesheet" href="{{asset('frontend/library/slick/slick/slick.css')}}">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('frontend/style/css/style.css')}}">

</head>
<body>

@include('frontend.layouts.header')

@yield('main-content')


<!-- BANNER -->
<section class="green-bg py-4 mx-auto text-center">
    <button class="btn btn-primary blue-bg border-0 rounded-pill fw-bold mx-auto fs-4 py-2 px-4 px-md-4 px-lg-5">Get Started With US !</button>
</section>


@include('frontend.layouts.footer')


<!-- BOOTSTRAP -->
<script src="{{asset('frontend/library/bootstrap/js/bootstrap.js')}}"></script>

<!-- JQUERY -->
<script src="{{asset('frontend/library/jquery/jquery.js')}}"></script>

<!-- SLICK -->
<script src="{{asset('frontend/library/slick/slick/slick.js')}}"></script>

<!-- CUSTOM JS -->
<script src="{{asset('frontend/javascript/main.js')}}"></script>
<script>
    includeHTML();
</script>
</body>
</html>
