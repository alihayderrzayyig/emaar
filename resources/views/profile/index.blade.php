@extends('layouts.app')

@php $active_sidebar = ''; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')

<section id="profil">
    <div class="container">
      <class class="card">
          <div class="img">
              <img src="
              {{ asset($user->profile->avatar) }}
              " alt="">
          </div>
            {{-- <form action="#" method="post"> --}}
              <div class="card2">
                  <div class="row justify-content-between">

                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                          <label for="name">الاسم الثلاثي:</label>
                          <!-- <input id="name" class="form-control" type="text" placeholder=""> -->
                          <p class="form-control">{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                          <label for="phone">البريد الالكتروني:</label>
                          <!-- <input id="phone" class="form-control" type="text" placeholder=""> -->
                          <p class="form-control">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label for="phone">رقم الهاتف:</label>
                        <!-- <input id="phone" class="form-control" type="text" placeholder=""> -->
                        <p class="form-control">
                            {{ $user->profile->phone }}
                        </p>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                      <div class="form-group">
                        <label for="phone">تاريخ الميلاد:</label>
                        <!-- <input id="phone" class="form-control" type="date" placeholder=""> -->
                        <p class="form-control">
                            {{ $user->profile->birthdate }}
                        </p>
                      </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                        <label for="test">عنوان السكن:</label>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                              <!-- <select id="test" class="custom-select">
                                <option selected>المحافضة</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select> -->
                              <p class="form-control">
                                {{ $governorate->name }}
                              </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                              <!-- <select class="custom-select">
                                  <option selected>القضاء</option>
                                  <option value="1">One</option>
                                  <option value="2">Two</option>
                                  <option value="3">Three</option>
                              </select> -->
                              <p class="form-control">
                                {{ $district->name }}
                              </p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg- mb-3">
                              <!-- <input class="form-control" type="text" placeholder="منطقة/ناحية"> -->
                              <p class="form-control">
                                {{ $user->profile->region }}
                              </p>
                            </div>

                        </div>
                        </div>
                    </div>
<!--
                    <div class="mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">أرسال</button>
                    </div> -->
                  </div>

            {{-- </form> --}}
          </class>
      </div>
    </div>
  </section>

@endsection





@section('js')

@endsection
