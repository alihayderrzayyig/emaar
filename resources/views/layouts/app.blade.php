<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="public/css/bootstrap.css"> --}}
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')

    <title>
        @yield('title')
        @if (isset($title) && $title !== '')
            {{ $title }}
        @else
            إعمار - الصفحة الرئيسية
        @endif
    </title>
  </head>
  <body>

    <header>
        @yield('header')
    </header>

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
