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
                            <p class="m-0">المرسل: {{ $message->name }}</p>
                            <p class="m-0">هاتف: {{ $message->phone }}</p>
                            <p class="m-0">
                                {{ $message->email }}
                                :
                                البريد الالكتروني
                            </p>
                            <p class="m-0">: الوصف</p>
                            <div class="border rounded px-2">
                                <p>{{ $message->description }}</p>
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
