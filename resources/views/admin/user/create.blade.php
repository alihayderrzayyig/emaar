@extends('layouts.appAdmin')

@php $active_sidebar = 'users'; @endphp

@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                @include('partials.admin.success-m')
                <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger text-left">
                        <ul class="list-unstyled m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="card py-5 px-3 shadow">
                        @if (isset($user))
                            <div class="mx-auto mb-5" style="width: 20rem; height: 20rem;">
                                <img class="rounded-circle h-100 w-100 shadow" src="
                                {{ asset($user->profile->avatar) }}
                                " alt="">
                            </div>
                        @endif

                        {{-- @method('PUT') --}}
                        {{-- <div class=""> --}}
                            <div class="row justify-content-between">

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="name">الاسم الثلاثي:</label>
                                    <input id="name" name="name" class="form-control" type="text" value="{{ isset($user)? $user->name : old('name') }}">
                                    {{-- <p class="form-control">{{ $user->name }}</p> --}}
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <label for="phone">رقم الهاتف:</label>
                                <input id="phone" name="phone" class="form-control" type="text" value="{{ isset($user)? $user->profile->phone : old('phone') }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <label for="email">البريد الالكتروني:</label>
                                <input id="email" name="email" class="form-control" type="email" value="{{ old('email') }}" placeholder="{{ isset($user)?$user->email: '' }}">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                <label for="birthdate">تاريخ الميلاد:</label>
                                <input id="birthdate" name="birthdate" class="form-control" type="date" value="{{ isset($user) ? $user->profile->birthdate : old('birthdate') }}">
                                </div>
                            </div>

                                 @if (isset($user))
                                    <div class="col-12 ">
                                        <p class="m-0">أذا كنت ترغب بتغيير كلمة السر</p>
                                    </div>
                                @endif
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                    <label for="password">{{ isset($user)?__('كلمة السر الجديدة:'):__('كلمة السر:') }}</label>
                                    <input id="password" name="password" class="form-control" type="password" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                    <label for="password2">أعد كتابة كلمة السر:</label>
                                    <input id="password2" name="password_confirmation" class="form-control" type="password" value="">
                                    </div>
                                </div>


                            <div class="col-12">
                                <div class="form-group">
                                <label for="governorate">عنوان السكن:</label>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                                            <select id="governorate"  name="governorate" class="custom-select">
                                                @foreach ($governorates as $governorate)
                                                    <option value="{{ $governorate->id }}"
                                                        @if (isset($user))
                                                            @if ($governorate->id == $user->profile->governorate)
                                                                selected
                                                            @endif
                                                        @endif
                                                        >
                                                        {{ $governorate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                                            <select name="district" class="custom-select">
                                                <option value="">قضاء</option>
                                                @if (isset($user))
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            @if ($district->id == $user->profile->district)
                                                                selected
                                                            @endif
                                                            >
                                                            {{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-4 col-lg- mb-3">
                                            <input name="region" class="form-control" type="text" value="{{ isset($user) ? $user->profile->region : old('region') }}" placeholder="منطقة/ناحية">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group form-check">
                                    <input name="isAdmin" type="checkbox" class="form-check-input" id="exampleCheck1"
                                    @if (isset($user) && $user->isAdmin)
                                        checked
                                    @endif
                                    >
                                    <label class="form-check-label ml-2" for="exampleCheck1">اجعل مسؤول</label>
                                  </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">إضافة صورة:</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>

                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">{{ isset($user) ? __('تحديث') : __('حفظ') }}</button>
                            </div>
                            </div>
                        {{-- </div> --}}
                    </div>
                </form>
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
