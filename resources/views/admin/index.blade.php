@extends('layouts.appAdmin')
@php $active_sidebar = 'main'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        {{-- <div class="admin-side-bar col-3 p-0 m-0">
            <div class="admin-info">
                <img src="{{ asset('img/08.jpg ') }}" alt="" class="bg-img">
                    <img src="{{ asset('img/01.jpg ') }}" alt="">
                <h4>علي حيدر رزيك</h4>
                <p class="m-0">ali.hayder.rzayyig@gmail.com</p>
            </div>
            <div class="admin-link">
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الصفحة الرئيسية</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse active">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">اجزاء الموقع </p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الرسائل</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الحالات</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">التبرعات</p>
                </a>
                <a href="{{ route('admin.users.index') }}" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الاعظاء</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">خروج</p>
                </a>


            </div>
        </div> --}}
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                <div class="card">
                    <img src="{{ asset('img/01.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
