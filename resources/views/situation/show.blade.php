@extends('layouts.app')

@php $active_sidebar = ''; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')
    {{-- <a href="#giv" target="_blank" rel="noopener noreferrer">ccccccccccc</a> --}}
    <section id="showCase">
        <div class="container">
            <div class="header mb-5">
                <div class="session-messages mt-3">
                    @include('partials.error-message')
                    @include('partials.success-message')
                </div>
                <!-- <div class="header d-flex flex-row-reverse align-items-center justify-content-between"> -->
                <h2>{{ $situation->name }}</h2>
                <div class="d1">
                    <!-- <div class="d1 d-flex flex-row-reverse align-items-center justify-content-between"> -->
                    <div class="d-flex flex-row-reverse ">
                        {{-- <div class="d2 m-0 p-0 mr-4">
                        <h3 class="text-center m-0 p-0">0</h3>
                        <h6 class="mb-0">التبرعات</h6>
                    </div> --}}
                        <div class="d2 m-0 p-0">
                            <h3 class="text-center m-0 p-0">%{{ $situation->completed() }}</h3>
                            <h6 class="mb-0">من هدفنا</h6>
                        </div>
                    </div>
                    <p class="">المبلغ المطلوب: {{ $situation->money }} IQD</p>
                </div>
            </div>
            <div class="card mb-5">
                <div class="img">
                    <img src="{{ asset($situation->image) }}" alt="">
                </div>
                <div class="des">
                    <p>{{ $situation->description }}</p>
                </div>
            </div>

            <form id="gift" action="{{ route('gift.store') }}" method="post">
                @csrf
                <input type="hidden" name="recaptcha" id="recaptcha">
                <input type="hidden" name="situation_slug" value="{{ $situation->slug }}">
                <div class="card2">
                    <h3 class="text-primary mb-4">تبرع الان:</h3>
                    <div class="row justify-content-between">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="name">الاسم الثلاثي:</label>
                                <input id="name" name="name" class="form-control" type="text" placeholder=""
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="phone">رقم الهاتف:</label>
                                <input id="phone" name="phone" class="form-control" type="text" placeholder=""
                                    value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="des">بماذا تريد التبرع:</label>
                                <textarea id="des" name="gift" class="form-control" id="exampleFormControlTextarea1"
                                    rows="2np" placeholder="" required>{{ old('gift') }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="governorate">عنوان السكن:</label>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                                        <select name="governorate" id="governorate" class="custom-select" required>
                                            {{-- <option value="" selected>المحافضة</option> --}}
                                            @foreach ($governorates as $governorate)
                                                <option value="{{ $governorate->id }}">{{ $governorate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                                        <select name="district" class="custom-select" required>
                                            {{-- <option value="" selected>القضاء</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg- mb-3">
                                        <input name="region" class="form-control" type="text" placeholder="منطقة/ناحية"
                                            value="{{ old('region') }}" required>
                                    </div>

                                    <div class="col-12 ">
                                        <div class="form-group">
                                            <!-- <label for="des">وصف الحالة:</label> -->
                                            <textarea name="description" id="des" class="form-control"
                                                id="exampleFormControlTextarea1" rows="2np" placeholder="تفاصيل اكثر"
                                                required>{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">أرسال</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection




@section('css')
    <style>
        html {
            scroll-behavior: smooth;
        }
        .session-messages {
            width: 90%;
            position: absolute;
            top: 50px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            margin-left: auto
        }

    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var governorate_id = $('select[name="governorate"]').val();
            if (governorate_id) {
                $.ajax({
                    url: '/district/' + governorate_id + '/get',
                    type: 'POST',
                    data: {
                        somefield: "Some field value",
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="district"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district"]').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                });
            }
        });

        $(document).ready(function() {
            $('select[name="governorate"]').on('change', function() {
                // console.log('ali');
                var governorate_id = $(this).val();
                if (governorate_id) {
                    // console.log(governorate_id);
                    $.ajax({
                        url: '/district/' + governorate_id + '/get',
                        type: 'POST',
                        data: {
                            somefield: "Some field value",
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            $('select[name="district"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        }
                    });

                }
            });
        });

    </script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {
                action: 'contact'
            }).then(function(token) {
                if (token) {
                    document.getElementById('recaptcha').value = token;
                }
            });
        });

    </script>
@endsection
