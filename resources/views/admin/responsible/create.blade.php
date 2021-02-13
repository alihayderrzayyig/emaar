@extends('layouts.appAdmin')

@php $active_sidebar = ''; @endphp

@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                @include('partials.admin.success-m')
                @include('partials.admin.error-m')
                @if ($errors->any())
                    <div class="alert alert-danger text-left">
                        <ul class="list-unstyled m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ isset($responsible) ? route('admin.responsible.update', $responsible->id) : route('admin.responsible.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (isset($responsible))
                        @method('PUT')
                    @endif
                    <div class="card py-5 px-3 shadow">
                        @if (isset($responsible))
                            <div class="mx-auto mb-5" style="width: 15rem; height: 15rem;">
                                <img class="rounded-circle h-100 w-100 shadow" src="
                                {{ asset($responsible->image) }}
                                " alt="">
                            </div>
                        @endif

                        {{-- @method('PUT') --}}
                        {{-- <div class=""> --}}
                            <div class="row justify-content-between">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">الاسم الثلاثي:</label>
                                    <input id="name" name="name" class="form-control" type="text" value="{{ isset($responsible)? $responsible->name : old('name') }}" required>
                                    {{-- <p class="form-control">{{ $user->name }}</p> --}}
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="body">الوصف:</label>
                                    <textarea name="body" class="form-control" id="body" rows="5np" placeholder="تفاصيل اكثر" required>{{ isset($responsible)? $responsible->body : old('body') }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">إضافة صورة:</label>
                                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>

                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary btn-block">{{ isset($responsible) ? __('تحديث') : __('حفظ') }}</button>
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

