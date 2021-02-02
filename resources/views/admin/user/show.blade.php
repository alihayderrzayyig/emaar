@extends('layouts.appAdmin')

@php $active_sidebar = 'users'; @endphp

@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                <section id="profil">
                    <div class="container">
                        <div class="card py-5 px-3 shadow">
                                <div class="mx-auto mb-5" style="width: 20rem; height: 20rem;">
                                    <img class="rounded-circle h-100 w-100 shadow" src="
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
                                        <!--<div class="mx-auto">
                                            <button type="submit" class="btn btn-primary btn-block">أرسال</button>
                                        </div> -->
                                    </div>

                                {{-- </form> --}}
                            </class>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
@endsection


@section('css')
    <style>
        .modal-header .close {
            padding: 1rem 1rem;
            margin: -1rem -1rem -1rem -1rem;
        }
        .card .row,
        .card .card-body,
        .card .card-header,
        .card .card-footer{
            direction: rtl;
        }

    </style>
@endsection



@section('js')

<script>

</script>

@endsection
