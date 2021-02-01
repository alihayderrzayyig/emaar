@extends('layouts.appAdmin')
@php $active_sidebar = 'Situation'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container d-flex flex-column">

                @include('partials.admin.success-m')


                <form action="{{ (isset($situation)) ? route('admin-situation.update', $situation->id) : route('admin-situation.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($situation))
                        @method('PUT')
                    @endif
                    <div class="card p-3">
                    <div class="row justify-content-between">

                        <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="name">الاسم الثلاثي:</label>
                            <input id="name" name="name" class="form-control" type="text" value="{{ (isset($situation)) ? $situation->name : '' }}">
                        </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label for="phone">رقم الهاتف:</label>
                            <input id="phone" name="phone" class="form-control" type="text" value="{{ (isset($situation)) ? $situation->phone : '' }}">
                        </div>
                        </div>

                        <div class="col-12">
                        <div class="form-group">
                            <label for="test">عنوان السكن:</label>
                            <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                                <select name="governorate" id="test" class="custom-select">
                                {{-- <option selected>المحافضة</option> --}}
                                @foreach ($governorates as $governorate)
                                    <option value="{{ $governorate->id }}"
                                        @if (isset($situation) && ($situation->governorate == $governorate->id))
                                            selected
                                        @endif

                                        >{{ $governorate->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-3" >
                                <select name="district" class="custom-select">
                                    @if (isset($situation))
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                @if (isset($situation) && ($situation->district == $district->id))
                                                    selected
                                                @endif

                                                >{{ $district->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg- mb-34 ">
                                <input name="region" class="form-control" type="text" placeholder="منطقة/ناحية" value="{{ (isset($situation)) ? $situation->region : '' }}">
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-12">
                        <div class="form-group">
                            <label for="money">المبلغ المطلوب:</label>
                            <input id="money" name="money" class="form-control" type="text" value="{{ (isset($situation)) ? $situation->money : '' }}">
                        </div>
                        </div>

                        <div class="col-12">
                        <div class="form-group">
                            <label for="des">وصف الحالة:</label>
                            <textarea id="des" name="description" class="form-control" id="exampleFormControlTextarea1" rows="5np" placeholder="">{{ (isset($situation)) ? $situation->description : '' }}</textarea>
                        </div>
                        </div>

                        @if (isset($situation))
                            <div class="col-12">
                                <div class="form-group">
                                    <img src="{{ asset($situation->image) }}" alt="" srcset="" style="width: 100%; height: 25rem; border-radius: 5px">
                                </div>
                            </div>
                        @endif

                        @if (isset($situation))
                            <div class="col-12">
                                <fieldset class="form-group">
                                    <div class="form-check">
                                        {{-- checked --}}
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="1"
                                    @if (isset($situation) && $situation->status)
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="gridRadios1">
                                        الموافقة على إضافة الحالة
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0"
                                    @if (isset($situation) && $situation->status == 0)
                                    checked
                                    @endif
                                    >
                                    <label class="form-check-label" for="gridRadios2">
                                        عدم الموافقة على إضافة الحالة
                                    </label>
                                    </div>
                                </fieldset>
                            </div>
                        @endif


                        <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">إضافة صورة:</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        </div>

                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">{{ (isset($situation)) ? 'تحديث' : 'حفظ' }}</button>
                        </div>
                    </div>
                    </div>
                </form>


                {{-- مودل الحذف --}}
                {{-- @include('partials.admin.delete-model') --}}
                {{-- نهاية مودل الحذف --}}
            </div>{{-- نهاية الكونتينر --}}

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
        function handldelete2(id){
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action =  'achievments/'+id
        }


        // $(document).ready(function () {
        //     var governorate_id = $('select[name="governorate"]').val();
        //     if(governorate_id){
        //         $.ajax({
        //             url: '/district/'+governorate_id+'/get',
        //             type: 'POST',
        //             data: { somefield: "Some field value", _token: '{{csrf_token()}}' },
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
                            // console.log(data);
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




