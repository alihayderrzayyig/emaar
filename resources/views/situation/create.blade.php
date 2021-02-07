@extends('layouts.app')

@php $active_sidebar = 'addsituation'; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')
    <section id="addCases">
        <div class="container">
            @include('partials.success-message')
        <form action="{{ route('situation.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger text-left">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row justify-content-between">

                <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="name">الاسم الثلاثي:</label>
                    <input id="name" name="name" class="form-control" type="text" placeholder="" value="{{ old('name') }}" required>
                </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="phone">رقم الهاتف:</label>
                    <input id="phone" name="phone" class="form-control" type="text" placeholder="" value="{{ old('phone') }}" required>
                </div>
                </div>

                <div class="col-12">
                <div class="form-group">
                    <label for="test">عنوان السكن:</label>
                    <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                        <select name="governorate" id="test" class="custom-select" required>
                        <option value="" selected>المحافضة</option>
                        @foreach ($governorates as $governorate)
                          <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                        <select name="district" class="custom-select" required>
                        <option value="" selected>القضاء</option>
                        {{-- <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> --}}
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg- mb-34 ">
                        <input name="region" class="form-control" type="text" placeholder="منطقة/ناحية" value="{{  old('region') }}" required>
                    </div>
                    </div>
                </div>
                </div>

                <div class="col-12">
                <div class="form-group">
                    <label for="money">المبلغ المطلوب:</label>
                    <input id="money" name="money" class="form-control" type="text" placeholder="" value="{{ old('money') }}" required>
                </div>
                </div>

                <div class="col-12">
                <div class="form-group">
                    <label for="des">وصف الحالة:</label>
                    <textarea id="des" name="description" class="form-control" id="exampleFormControlTextarea1" rows="5np" placeholder="" required>{{ old('description') }}</textarea>
                </div>
                </div>

                <div class="col-12">
                <div class="form-group">
                    <label for="exampleFormControlFile1">إضافة صورة:</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
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
