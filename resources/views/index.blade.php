@extends('layouts.app')

@php $active_sidebar = 'about2'; @endphp

@section('title')
    @php
    // $title = 'Ali Haider'
    @endphp
@endsection

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')
    <section id="header">
        <div class="bg-img">
            <img src="{{ asset('/img/10.jpg') }}" alt="" srcset="">
        </div>
        <div class="session-messages mt-3">
            @include('partials.error-message')
            @include('partials.success-message')
        </div>

        <div class="cont">

            <div class="text-header text-center">
                <h1>عَمِّر سَعادتك من خلال</h1>
                <h1>المُساعَدة في<span> إعمار سَعادة الآخرين</span></h1>
            </div>

            <div class="links-header">
                <div class="container p-0">
                    <div class="row d-flex align-items-stretch">
                        <a href="#joinUs" class="col-sm-12 col-md-4 col-xl-4 float-ch floatItem-column floatItem--doctor">
                            <h3 class="floatItem-tagline">أنضم إلينا</h3>
                            {{-- <i class="floatItem-icon fas fa-user-md"></i> --}}
                            <i class="floatItem-icon fas fa-users-cog"></i>
                        </a>
                        <a href="{{ route('situation.create') }}"
                            class="col-sm-12 col-md-4 col-xl-4 float-ch floatItem-column floatItem--conditions">
                            <h3 class="floatItem-tagline">أضافة حالة</h3>
                            <i class="floatItem-icon fas fa-plus"></i>
                        </a>
                        <a href="{{ route('gift.create') }}"
                            class="col-sm-12 col-md-4 col-xl-4 float-ch floatItem-column floatItem--appointment">
                            <h3 class="floatItem-tagline">تبرع الآن</h3>
                            <i class="floatItem-icon fas fa-file-signature"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <section id="achievements">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6 p-1 left">
                    <div class="d-flex flex-wrap">
                        <div class="larg">
                            <img src="{{ asset('img/achievements01.jpg') }}">
                        </div>
                        <div class="small">
                            <img class="img-laft" src="{{ asset('img/achievements02.jpg') }}">
                            <img class="img-right" src="{{ asset('img/achievements03.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 p-1 right">
                    <div class="d-flex flex-wrap">

                        <div class="small">
                            <div class="card">
                                <h3>لقطة منجزات</h3>
                                <p>وعند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص
                                    النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد
                                    عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي.</p>
                            </div>
                        </div>

                        <div class="larg">
                            <div class="d-flex">

                                <div class="larg-img">
                                    <img src="{{ asset('img/achievements04.jpg') }}" alt="" srcset="">
                                </div>

                                <div class="small-2-img d-flex flex-wrap">
                                    <img src="{{ asset('img/achievements05.jpg') }}" alt="" srcset="">
                                    <img src="{{ asset('img/achievements06.jpg') }}" alt="" srcset="">

                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </section>


    <section id="howCanYouHelp">
        <div class="container">
            <div class="text-center">
                <h1 class="h1-header">كيف يمكن المساعدة</h1>

                <!-- <div class="row justify-content-between flex-row-reverse"> -->
                <div class="row">


                    <div class="col-12 col-md-4 col-lg-4 col-card">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="floatItem-icon fas fa-landmark"></i>
                                <h4>موادأولية</h4>
                                <p>
                                    هل انت تاجر، او صاحب محل لتجهيز مواد اوليه للبناء، او انت مواطن عادي اكمل بناء منزله وزادت عنده بعض المواد، أياً من كنت هنا يمكنك تقديم المساعدة بتقديم المواد الاولية ومساعدتهم
                                </p>
                            </div>
                            <div class="card-footer">
                                <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                <a href="{{ route('gift.create') }}" class="btn btn-info">ساعد الان</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-card">
                        <div class="card h-100">
                            <div class="card-body">
                                {{-- <i class="floatItem-icon fas fa-user-md"></i> --}}
                                <i class="floatItem-icon fas fa-hand-holding-usd"></i>

                                <h4>قيمة نقدية</h4>
                                <p>
                                    يمكن التبرع باي قيمة نقديه للمساعدة في اعمار منزل أي شخص محدد او يمكنك تقديمها لنا ونحن نتكفل بتقديمها حسب الاولوية
                                </p>
                            </div>
                            <div class="card-footer">
                                <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                <a href="{{ route('gift.create') }}" class="btn btn-info">ساعد الان</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4 col-card">
                        <div class="card h-100">
                            <div class="card-body">
                                {{-- <i class="floatItem-icon fas fa-user-md"></i> --}}
                                <i class="floatItem-icon fas fa-people-carry"></i>
                                <h4>تطوع ميداني</h4>
                                <p>
                                    اذا كن مهندس بناء كربائي او عامل او يمكنك المساعدة في عمليات اعمار بي شكل من اشكال واحببت المساعدة يشرفنا قبول طلبك
                                </p>
                            </div>
                            <div class="card-footer">
                                <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                <a href="{{ route('gift.create') }}" class="btn btn-info">ساعد الان</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section id="joinUs">
        <div class="container">
            <div class="text-center">
                <h1 class="h1-header">انضم الينا</h1>
                <h4 class="sub-header">المحافظة على ابتسامتهم هدفنا...شاركنا في ذلك</h4>
                <div class="card">
                    @if (session('joinus-error') && $errors->any())
                        <div class="alert alert-danger text-left">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('join-us') }}" method="post">
                        @csrf
                        <input type="hidden" name="recaptcha" id="recaptcha">
                        <div class="row justify-content-between flex-row-reverse">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    {{-- <input name="name" class="form-control" type="text" placeholder="{{ __('الاسم الكامل') }}"> --}}
                                    <input name="name" class="form-control" type="text"
                                        placeholder="{{ __('الاسم الكامل') }}" required value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <input name="phone" class="form-control" type="text" placeholder="رقم الهاتف" required
                                        value="{{ old('phone') }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                    <input name="email" class="form-control" type="text" placeholder="البريد الالكتروني"
                                        required value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <select name="governorate" class="custom-select" required>
                                        <option value="" selected>المحافضة</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                        @endforeach
                                        {{-- <option value="2">Two</option>
                            <option value="3">Three</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <select name="district" class="custom-select" required>
                                        <option value="" selected>القضاء</option>
                                        {{-- <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                    <input name="region" class="form-control" type="text" placeholder="منطقة/ناحية" required
                                        value="{{ old('region') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                        rows="5np" placeholder="تفاصيل اكثر" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-submit">أرسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section id="responsibles">
        <div class="container">
            <h1 class="h1-header text-center">بعض القائمين على الموقع</h1>
            <div class="row">
                @foreach ($responsibles as $item)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mx-auto mb-4">
                        <div class="card2 h-100 w-100">
                            <div class="img">
                                <img src="{{ asset($item->image) }}" alt="" srcset="">
                            </div>
                            <h4 class="text-center m-3">{{ $item->name }}</h4>
                            <p>{{ $item->body }}</p>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-12 col-md-6 col-lg-3">
                    <div class="card2 mx-auto">
                        <div class="img">
                            <img src="{{ asset('img/06.jpg') }}" alt="" srcset="">
                        </div>
                        <h4 class="text-center m-3">علي حيدر</h4>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                            الخارجي للنص
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card2 mx-auto">
                        <div class="img">
                            <img src="{{ asset('img/06.jpg') }}" alt="" srcset="">
                        </div>
                        <h4 class="text-center m-3">علي حيدر</h4>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                            الخارجي للنص
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card2 mx-auto">
                        <div class="img">
                            <img src="{{ asset('img/06.jpg') }}" alt="" srcset="">
                        </div>
                        <h4 class="text-center m-3">علي حيدر</h4>
                        <p>
                            هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                            الخارجي للنص
                        </p>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>


    <section id="connectWithUs">
        <div class="container">
            <h1 class="h1-header text-center">تواصل معنا</h1>
            <div class="card3">
                <div class="row flex-row-reverse">


                    <div class="right col-12 col-sm-12 col-md-12 col-lg-8">
                        @if (session('message-error'))
                            @if ($errors->any())
                                <div class="alert alert-danger text-left">
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                        <form action="{{ route('message.store') }}" method="post">
                            <div class="row justify-content-between flex-row-reverse">
                                @csrf
                                <input type="hidden" name="recaptcha" id="recaptcha2">
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <input name="name" class="form-control" type="text" placeholder="الاسم الكامل"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <input name="phone" class="form-control" type="text" placeholder="رقم الهاتف"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <input name="email" class="form-control" type="text" placeholder="البريد الالكتروني"
                                            required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                            rows="5np" placeholder="الوصف" required></textarea>
                                    </div>
                                </div>

                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-submit">أرسال</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="left col-12 col-sm-12 col-md-12 col-lg-4">
                        <h4>هل لديك أسئلة؟</h4>
                        <ul>
                            <li class="d-flex flex-row-reverse">
                                <i class="floatItem-icon fas fa-user-md"></i>
                                <p>الرمادي, شارع الملعب, قرب عمارة الحاج ثامر</p>
                            </li>
                            <li class="d-flex flex-row-reverse">
                                <i class="floatItem-icon fas fa-user-md"></i>
                                <p>9647800000000+</p>
                            </li>
                            <li class="d-flex flex-row-reverse">
                                <i class="floatItem-icon fas fa-user-md"></i>
                                <p>info@email.com</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
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
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            margin-left: auto
        }

    </style>
@endsection


@section('js')


<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {
            action: 'contact'
        }).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
                document.getElementById('recaptcha2').value = token;
            }
        });
    });
</script>


    <script>
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
                            console.log(data);
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

@endsection
