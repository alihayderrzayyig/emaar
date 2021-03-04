@extends('layouts.app')

{{-- @section('css')
    <style>
        #test1 {
            background-image: url("{{ asset('img/bg-register.PNG') }}");
        }
    </style>
@endsection --}}

@section('content')
<section id="register" style="background: url('{{ asset('img/bg-register.PNG') }}') no-repeat fixed">
    <div class="container py-5">
        <h1 class="text-center my-3">أهلاً وسهلاً بكم في إعمار</h1>
        <div class="card mx-auto">
          <h2 class="header text-center">
            التسجيل
          </h2>
          <p class="sub-header text-center">من خلال شبكتك الاجتماعية</p>

          <div class="d-flex">
            <a href="{{ route('login-test', 'facebook') }}" class="d-flex btn btn-facebook">
              <i class="fab fa-facebook-square align-self-center"></i> <p class="align-self-center">الدخول بحساب الفيس بوك</p>
            </a>
            <a href="{{ route('login-test', 'google') }}" class="d-flex btn btn-google">
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

