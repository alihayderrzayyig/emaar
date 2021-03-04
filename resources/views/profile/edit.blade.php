@extends('layouts.app')

@php $active_sidebar = ''; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')

    <section id="profil">
        <div class="container">


            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show " role="alert">
                    {{-- <strong>Holy guacamole!</strong> You should check in on some of those fields below. --}}
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                    <ul class="m-0 p-0" style="list-style-type: none">
                        @foreach ($errors->all() as $error)
                            <li class="m-0 p-0">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <class class="card">
                {{-- <div class="img">
              <img src="
              {{ asset($user->profile->avatar) }}
              " alt="">
          </div> --}}
                <form action="{{ route('profile.update', $user->slug) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card2">
                        <div class="row justify-content-between">

                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="form-group">
                                    <label for="name">الاسم الثلاثي:</label>
                                    <input id="name" name="name" class="form-control" type="text"
                                        value="{{ $user->name }}">
                                    {{-- <p class="form-control">{{ $user->name }}</p> --}}
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف:</label>
                                    <input id="phone" name="phone" class="form-control" type="text"
                                        value="{{ $user->profile->phone }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="birthdate">تاريخ الميلاد:</label>
                                    <input id="birthdate" name="birthdate" class="form-control" type="date"
                                        value="{{ $user->profile->birthdate }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="governorate">عنوان السكن:</label>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                                            <select id="governorate" name="governorate" class="custom-select">
                                                @foreach ($governorates as $governorate)
                                                    <option value="{{ $governorate->id }}" @if ($governorate->id == $user->profile->governorate) selected @endif>
                                                        {{ $governorate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3">
                                            <select name="district" class="custom-select">
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}" @if ($district->id == $user->profile->district) selected @endif>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg- mb-3">
                                            <input name="region" class="form-control" type="text"
                                                value="{{ $user->profile->region }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">تحديت</button>
                            </div>
                        </div>
                </form>
            </class>
        </div>
        </div>
    </section>

@endsection





@section('js')
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
