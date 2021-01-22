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
        .custom-select{
            direction: rtl !important;
        }
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
            الرجاء
          </h2>
          <p class="sub-header text-center">إكمال معلوات الحساب</p>
          <form action="{{ route('profile-store-completed', $profile->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف">
            </div>
            <div class="form-group">
                <label for="birthdate">تاريخ الميلاد</label>
              <input type="date" id="birthdate" name="birthdate" class="form-control">
            </div>
                <div class="form-group">
                  <select name="governorate" class="custom-select">
                    <option selected>المحافضة</option>
                    @foreach ($governorates as $governorate)
                        <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <select name="district" class="custom-select">
                        <option selected>القضاء</option>
                    </select>
                </div>
                <div class="form-group">
                  <input name="region" class="form-control" type="text" placeholder="منطقة/ناحية">
                </div>
            <button type="submit" class="btn btn-primary mb-3">أكمال الحساب</button>
          </form>
        </div>
    </div>
</section>
@endsection






@section('js')

<script>
    $(document).ready(function () {
            $('select[name="governorate"]').on('change',function(){
                // console.log('ali');
                var governorate_id = $(this).val();
                if(governorate_id){
                    // console.log(governorate_id);
                    $.ajax({
                        url: '/district/'+governorate_id+'/get',
                        type: 'POST',
                        data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            $('select[name="district"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="district"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    });

                }
            });
        });
</script>

@endsection

