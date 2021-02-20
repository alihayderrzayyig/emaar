@extends('layouts.appAdmin')
@php $active_sidebar = ''; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9 pl-0">
                <div class="container p-5">
                    <div class="card w-75 mx-auto text-left">
                        <div class="card-body">
                            <p class="m-0"><span class="font-weight-bold">المرسل:</span>
                                {{ $gift->name }}</p>
                            <p class="m-0"><span class="font-weight-bold">الهاتف:</span>
                                {{ $gift->phone }}</p>
                            {{-- <p class="m-0">البريد الالكتروني: {{ __('hbhbhhbhbh') }}</p> --}}
                            <p class="m-0 text-left">
                                <span class="font-weight-bold">
                                    العنوان
                                    :
                                </span>
                                @foreach ($governorates as $item2)
                                    @if ($item2->id == $gift->governorate)
                                        {{ $item2->name }} -
                                    @endif
                                @endforeach
                                @foreach ($districts as $item2)
                                    @if ($item2->id == $gift->district)
                                        {{ $item2->name }} -
                                    @endif
                                @endforeach
                                {{ $gift->region }}
                                @if ($gift->description != null)
                                    -
                                    {{ $gift->description }}
                                @endif
                            </p>
                            <p class="m-0">
                                <span class="font-weight-bold">
                                    التبرع ب
                                    :
                                </span>
                            </p>
                            <div class="border rounded px-2">
                                <p>{{ $gift->gift }}</p>
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
        .card-body {
            direction: rtl
        }

    </style>
@endsection
