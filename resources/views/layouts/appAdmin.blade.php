<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminStyle.css') }}" rel="stylesheet">
    @yield('css')

    <title>إعمار</title>
</head>

<body>

    <header>
        @yield('header')
    </header>


    <nav class="navbar navbar-light nav-secondary flex-row-reverse">
        <a class="navbar-brand" href="{{ route('home') }}">إعمار</a>
        <i class="fab fa-facebook-square align-self-center"></i>
    </nav>


    <main>
        @yield('content')
    </main>

    <footer class="footer text-center p-4">
        <p>جميع الحقوق محفوظة &copy; CodeForIraq</p>
    </footer>



    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @yield('js')

</body>

</html>
