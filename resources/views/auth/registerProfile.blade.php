@extends('layouts.app')

@section('content')
    <section id="register" style="background: url('{{ asset('img/bg-register.PNG') }}') content-box">
        <div class="container py-5">
            <h1 class="text-center my-3">أهلاً وسهلاً بكم في إعمار</h1>
            <div class="card mx-auto">
                <h2 class="header text-center">
                    الرجاء
                </h2>
                <p class="sub-header text-center">إكمال معلوات الحساب</p>
                <form action="{{ route('profile-store-completed', $profile->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="رقم الهاتف" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">تاريخ الميلاد</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ old('birthdate') }}">
                    </div>
                    <div class="form-group">
                        <select name="governorate" class="custom-select">
                            <option selected>المحافضة</option>
                            @foreach ($governorates as $governorate)
                                <option value="{{ $governorate->id }}"
                                    {{-- @if ($governorate->id == old('governorate'))
                                    selected
                                    @endif --}}
                                    >{{ $governorate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="district" class="custom-select">
                            <option selected>القضاء</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input name="region" class="form-control" type="text" placeholder="منطقة/ناحية" value="{{ old('region') }}">
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger text-left">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <button type="submit" class="btn btn-primary mb-3">أكمال الحساب</button>
                </form>
            </div>
        </div>
    </section>




@endsection



@section('css')
    <style>
        .custom-select {
            direction: rtl !important;
        }

        #test1 {
            /* background-image: url("{{ asset('img/bg-register.PNG') }}"); */
            background-image: url("{{ asset('img/bg-register.PNG') }}");
        }

    </style>
@endsection



@section('js')


    <script>

        // $(document).ready(function () {
        //     var governorate_id = $('select[name="governorate"]').val();
        //     if(governorate_id){
        //         $.ajax({
        //             url: '/district/'+governorate_id+'/get',
        //             type: 'POST',
        //             data: { somefield: "Some field value", _token: '{{ csrf_token() }}' },
        //             dataType: 'json',
        //             success: function (data) {
        //                 $('select[name="district"]').empty();
        //                 $.each(data, function (key, value) {
        //                     $('select[name="district"]').append('<option value="'+key+'">'+value+'</option>');
        //                 });
        //             }
        //         });
        //     }
        // });


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
