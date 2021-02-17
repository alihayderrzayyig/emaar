{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')


@section('css')
    <style>
        #test1 {
            /* background-image: url("{{ asset('img/bg-register.PNG') }}"); */
            background-image: url("{{ asset('img/bg-register.PNG') }}");
        }
    </style>
@endsection

@section('content')
<section id="register" style="background: url('{{ asset('img/bg-register.PNG') }}') no-repeat center">
    <div class="container py-5">
        <h1 class="text-center my-3">أهلاً وسهلاً بكم في إعمار</h1>
        <div class="card mx-auto">
          <h2 class="header text-center">
            التسجيل
          </h2>
          <p class="sub-header text-center">من خلال شبكتك الاجتماعية</p>

          <div class="d-flex">
            <a href="#" class="d-flex btn btn-facebook">
              <i class="fab fa-facebook-square align-self-center"></i> <p class="align-self-center">الدخول بحساب الفيس بوك</p>
            </a>
            <a href="#" class="d-flex btn btn-google">
              <i class="fab fa-google-plus-square align-self-center"></i> <p class="align-self-center">الدخول بحساب كوكل</p>
            </a>
          </div>

          <div class="line mb-2">
            <div class="left"></div>
            <p>أو</p>
            <div class="right"></div>
          </div>

          <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="hidden" name="recaptcha" id="recaptcha">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="الاسم الرباعي" value="{{ old('name') }}">
            </div>

            {{-- <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف">
            </div> --}}

            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" value="{{ old('email') }}">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" placeholder="كلمة السر">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password_confirmation" placeholder="اعدكتابة كلمة السر">
            </div>

            @if ($errors->any())
                <div class="alert alert-danger text-left">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary mb-3">أنشاء حساب</button>
          </form>

          <div class="d-block text-center ">
            <p>هل لديك حساب؟   <a href="{{ route('home') }}">تسجيل الدخول</a></p>
          </div>


        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
        if (token) {
            document.getElementById('recaptcha').value = token;
        }
        });
    });
</script>
@endsection
