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
    <script>
        $(Document).on('click', '#login-submit', function() {
            var form = $('#login-form').serialize();
            var url = $('#login-form').attr('action');
            $.ajax({
                url: url,
                dataType: 'json',
                data: form,
                type: 'post',
                beforeSend: function() {

                },
                success: function() {
                    $('#login-modal').hide();
                    location.reload();
                },
            }).fail(function(error) {
                // console.dir(error.responseJSON.errors);
                if (error.responseJSON.errors.email) {
                    // alert(error.responseJSON.errors.email[0]);
                    $("#loginInputEmail").val('');
                    $("#loginInputPassword").val('');
                    $("#loginInputEmail").addClass("form-control-error");
                    $("#loginInputEmail").attr("placeholder", error.responseJSON.errors.email[0]);
                }
                if (!error.responseJSON.errors.email) {
                    $("#loginInputEmail").removeClass("form-control-error");
                }

                if (error.responseJSON.errors.password) {
                    // alert(error.responseJSON.errors.email[0]);
                    $("#loginInputPassword").val('');
                    $("#loginInputPassword").addClass("form-control-error");
                    $("#loginInputPassword").attr("placeholder", error.responseJSON.errors.password[0]);
                }
                if (!error.responseJSON.errors.password) {
                    $("#loginInputPassword").removeClass("form-control-error");
                }
            });

            // .always(function () {
            //     // location.reload();
            // });

            return false;

        });


        window.fbAsyncInit = function() {
            FB.init({
                appId: '534267997480471',
                xfbml: true,
                version: 'v9.0'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

    @yield('js')

</body>

</html>
