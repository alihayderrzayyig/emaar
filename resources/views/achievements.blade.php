@extends('layouts.app')

@php $active_sidebar = 'achievements'; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')

    <section id="stores" class="stores">
        <div class="container">

            <h1 class="text-center h1-header">جديد فروعنا</h1>

            @foreach ($branches as $item)
                <div class="row justify-content-center mx-auto">
                    <div class="story">
                        <figure class="story-shape">
                            <img src="{{ asset($item->image) }}" alt="" class="story-image">
                        </figure>
                        <div class="story-text">
                            <h4 class="">{{ $item->title }}</h4>
                            <p>{{ $item->body }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="slider" class="">
        <h1 class="text-center h1-header">مشاريع تم انجازها</h1>
        <div class="regular slider">
            @foreach ($projects as $item)
                <div>
                    <div class="card">
                        <img src="{{ asset($item->image) }}" alt="" srcset="">
                        <div class="card-body">
                            <h4 class="text-center m-3">{{ $item->title }}</h4>
                            <p>{{ str_limit($item->body, 135) }}</p>
                        </div>
                        <div class="card-footer">
                            {{-- <a href="" class="btn btn-info">المزيد</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection



@section('css')
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
@endsection


@section('js')
    <script src="{{ asset('js/slick.js') }}"></script>
    <script>
        var width = $(window).width();
        if (width >= 1200) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                accessibility: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                focusOnSelect: false,
                focusOnChange: false,
                mobileFirst: false,
                rtl: false,
            });
        } else if (width >= 992 && width < 1200) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                focusOnSelect: false,
                focusOnChange: false,
                mobileFirst: false,
                rtl: false,
            });
        } else if (width >= 768 && width < 992) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                focusOnSelect: false,
                focusOnChange: false,
                mobileFirst: false,
                rtl: false,
            });
        } else if (width < 768) {
            $(".regular").slick({
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                focusOnSelect: false,
                focusOnChange: false,
                mobileFirst: false,
                rtl: false,
            });
        }
        $(window).on('resize', function() {
            width = $(this).width();
            $(location).prop("href", location.href);
        });
        //location.reload();

    </script>
@endsection
