@extends('layouts.app')

@php $active_sidebar = 'situation'; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')
    <section id="handByHand">
        <div class="img">
            <img src="{{ asset('img/09.png') }}" alt="">
        </div>
        <div class="header">
            <h1>يداً بيد ﻷعمار الوطن</h1>
            <h1>لا مخيمات بعد اليوم</h1>
        </div>
    </section>

    <section id="allCases">
        <div class="container">
            <h1 class="h1-header text-center">جميع الحالات</h1>
            <p class="filter">
                <button class="btn btn-filter" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  ترتيب
                  حسب
                  :
                </button>
                <div class="collapse" id="collapseExample">
                  <div class="card-body filter-body">
                    <div class="row">
                      <a class="" href="#">Action</a>
                      <a class="" href="#">Another action</a>
                      <a class="" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
            </p>
            <div class="row flex-row-reverse">
                @foreach ($situations as $situation)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-3">
                        <div class="card">
                            <img src="{{ $situation->image }}" alt="">
                            <div class="gole">
                              <p>
                                <i class="fas fa-hand-holding-usd"></i>
                                 الهدف:
                                 {{ $situation->money }}
                                IQD
                              </p>
                              <p>
                                <i class="fas fa-hand-holding-usd"></i>
                                تم انجاز
                                0%
                              </p>
                            </div>
                            <div class="body">
                              <h4>{{ $situation->name }}</h4>
                            </div>
                            <div class="card-footer">
                              <a href="{{ route('gift.create2', $situation->id) }}/#gift" class="btn btn-primary m-0">تبرع الان</a>
                              <a href="{{ route('situation.show', $situation->id) }}" class="btn btn-primary m-0">إقراء المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="paginet mt-5 mx-auto">
                    {{ $situations->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>


@endsection



@section('css')

    <style>
        body{
            text-align: left
        }
    </style>

@endsection


@section('js')

@endsection
