@extends('layouts.appAdmin')
@php $active_sidebar = 'admin-message'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                @include('partials.admin.success-m')

                <div class="card">

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
    </style>
@endsection
@section('js')
@endsection

