@extends('layouts.app')

@php $active_sidebar = 'about'; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')

<section id="about-emaar">
    <div class="container">
        <h1>إعمار</h1>
        {{-- <p>إعمار هو عبارة عن موقع الكتروني يهدف لمساعدة ضحايا الارهاب اللذين تهدمت منازلهم جراء القصف اثناء عملية التحرير بالإضافة للتخريب المستهدف لمنازل فئه معينة من قبل قوات داعش, ان فكرة الموقع او الهدف الاساسي هو جمع التبرعات للضحايا، فالموقع سيكون دليل لهذه الحالات الانسانية المتضررة ليوصف معاناتهم ومآسيهم، </p> --}}
        <p style="text-align: center">هو عبارة عن منصة الكترونية لجمع التبرعات لضحايا الارهاب اللذين تهدمت منازلهم اثناء عملية التحرير.</p>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="text px-3">
            <h1 class="text-center font-weight-bold mb-4">
                من
                <span class="text-info">نحن؟</span>
            </h1>
            <h4 class="font-weight-bold mb-4">
                نحن
                <span class="text-info">CodeForIraq</span>
            </h4>
                <p> نحن مبادرة إنسانية غير ربحية تهدف الى خدمة المجتمع عن طريق البرمجة Programming. تعتبر <span class="text-info">"CodeForIraq"</span> مبادرة تعليمية حقيقية ترعى المهتمين بتعلم تصميم وبرمجة تطبيقات الهاتف الجوال ومواقع الانترنت وبرامج الحاسوب والشبكات والاتصالات ونظم تشغيل الحاسوب باستخدام التقنيات مفتوحة المصدر Open Source ، كما توفر لهم جميع الدروس التعليمية اللازمة وبشكل مجاني تماماً </p>
        </div>
        <div class="img">
            <img class="img-fluid" src="{{ asset('/img/cfi.png') }}" alt="" srcset="">
        </div>
    </div>
</section>

<section id="about-designer">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="media">
                    <div class="media-body">
                        <h4 class="mt-0 mb-3">علي حيدر رزيك</h4>
                        {{-- <p>خريج جامعة الانبار كلية علوم الحاسبات وتكنلوجيا المعلومات, قسم علوم الحاسبات.</p> --}}
                        <p>أحد اعضاء CodeForIraq وحاصل على شهادة البكالوريوس في علوم الحاسبات.</p>
                        <p>أختصاص تطوير تطبيقات الويب(FrontEnd & BackEnd)</p>
                    </div>
                    <img src="{{ asset('img/Ali.jpg') }}" class="align-self-center mr-3 rounded-circle shadow-lg" alt="...">
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="info h-100">
                    <h4>للتواصل:</h4>
                    <ul class="m-0">
                        <li class="d-flex flex-row-reverse mb-2">
                            <i class="floatItem-icon fas fa-map-marker-alt mr-2"></i>
                            <p class="mb-0">الانبار - هيت - الاطفاء</p>
                        </li>
                        <li class="d-flex flex-row-reverse mb-2">
                            <i class="floatItem-icon fas fa-phone mr-2"></i>
                            <p class="mb-0">07829356530</p>
                        </li>
                        <li class="d-flex flex-row-reverse mb-0">
                            <i class="floatItem-icon fas fa-at mr-2"></i>
                            <p class="mb-0">ali.hayder.rzayyig@email.com</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>



@endsection





@section('js')

@endsection
