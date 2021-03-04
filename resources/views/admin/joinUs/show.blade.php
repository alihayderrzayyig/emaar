@extends('layouts.appAdmin')
@php $active_sidebar = ''; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9 pl-0">
                <div class="container p-5">
                    <div class="card w-75 mx-auto text-left">
                        {{-- <div class="card-body">
                            <p class="m-0">المرسل: {{ $joinUs->name }}</p>
                            <p class="m-0">هاتف: {{ $joinUs->phone }}</p>
                            <p class="m-0">
                                {{ $joinUs->email }}
                                :
                                البريد الالكتروني
                            </p>
                            <p class="m-0">: الوصف</p>
                            <div class="border rounded px-2">
                                <p>{{ $joinUs->description }}</p>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <p class="m-0">المرسل: {{ $joinUs->name }}</p>
                            <p class="m-0">هاتف: {{ $joinUs->phone }}</p>
                            <p class="m-0">
                                {{ $joinUs->email }}
                               : البريد الالكتروني
                            </p>
                            <p class="m-0">
                                العنوان:
                                @foreach ($governorates as $item2)
                                    @if ($item2->id == $joinUs->governorate)
                                        {{ $item2->name }} -
                                    @endif
                                @endforeach
                                @foreach ($districts as $item2)
                                    @if ($item2->id == $joinUs->district)
                                        {{ $item2->name }} -
                                    @endif
                                @endforeach
                                {{ $joinUs->region }}
                            </p>
                            <p class="m-0">
                                :
                                الوصف
                            </p>
                            <div class="border rounded px-2">
                                <p>{{ $joinUs->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        .session-messages {
            width: 90%;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            margin-left: auto
        }

    </style>
@endsection
