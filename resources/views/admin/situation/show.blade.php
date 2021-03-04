@extends('layouts.appAdmin')
@php $active_sidebar = 'Situation'; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container d-flex flex-column px-5">

                    @include('partials.admin.success-m')

                    <div class="d-flex justify-content-lg-start mb-2">
                        <div class="ml-2 flex btn btn-warning btn-table ">
                            <a href="{{ route('admin.situation.edit', $situation->id) }}"><i class="fas fa-cog"></i></a>
                        </div>

                        {{-- <div class="ml-2 flex btn btn-success btn-table ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-donate"></i></button>
                    </div> --}}
                        @if ($situation->status)
                            <div class="flex btn btn-success btn-table ml-2">
                                <button data-toggle="modal" data-target="#exampleModal"><i
                                        class="fas fa-donate"></i></button>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-4">
                                            <form action="{{ route('admin.situation.addGift', $situation->id) }}"
                                                method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">كمية المال:</label>
                                                    <input type="number" name="money" class="form-control"
                                                        id="exampleInputPassword1">
                                                </div>
                                                {{-- <div class="mx-auto w-100"> --}}
                                                <button type="submit" class="btn btn-primary btn-block mx-auto">إدخال
                                                    قيمة</button>
                                                {{-- </div> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (!$situation->status)
                            <form action="{{ route('admin.situation.agree', $situation->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="ml-2 flex btn btn-success btn-table">
                                    <button type="submit"><i class="fas fa-check"></i></button>
                                </div>
                            </form>
                        @endif
                    </div>



                    {{-- <h1 class="text-center">{{ $situation->status }}</h1> --}}
                    <div class="card p-0">
                        <img src="{{ asset($situation->image) }}" class="card-img-top" alt="...">
                        <div class="card-header">
                            <h5>الاسم: {{ $situation->name }}</h5>
                            <h5>هاتف: {{ $situation->phone }}</h5>
                            <h5>المبلغ المطلوب: {{ $situation->money }}</h5>
                            {{-- <h5>تم انجاز: {{ $situation->achieve }}%</h5> --}}
                            {{-- <h5>تم انجاز: {{ intval($situation->achieve/$situation->money*100) }}%</h5> --}}
                            <h5>تم انجاز: {{ $situation->completed() }}%</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><span
                                    class="font-weight-bold">الوصف:</span><br>{{ $situation->description }}</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text"><span class="font-weight-bold">العنوان:</span></p>
                            <p>{{ $governorate->name }} - {{ $district->name }} - {{ $situation->region }}</p>
                        </div>
                    </div>

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

        .modal,
        .card .card-body,
        .card .card-header,
        .card .card-footer {
            direction: rtl;
        }

    </style>
@endsection
@section('js')
    <script>
        function handldelete2(id) {
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action = 'achievments/' + id
        }

    </script>
@endsection
