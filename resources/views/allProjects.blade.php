@extends('layouts.app')

@php $active_sidebar = 'achievements'; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')
    <section id="prjects-header" style="background-image: url('{{ asset('img/allprojects.png') }}')">
        <div class="container">
            <h1 class="">معاً <span>لإعمار</span> الوطن</h1>
        </div>
    </section>

    <section id="projects-body">
        <div class="container">
            <div class="row">
                @foreach ($projects as $item)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card shadow-lg">
                            <img src="{{ asset($item->image) }}" alt="" srcset="" />
                            <div class="card-body">
                                <h4 class="text-center mb-3">{{ $item->title }}</h4>
                                <p>{{ $item->body }}</p>
                            </div>
                            <div class="card-footer">
                                {{-- <button class="btn btn-info">المزيد</button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="paginet mt-5 mx-auto">
            {{ $projects->links() }}
        </div>
    </section>

@endsection


@section('css')

    <style>
        /* body {
            text-align: left
        } */

        .pagination .page-item:first-child .page-link {
            margin-right: 0;
            border-top-left-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
            border-top-right-radius: 0rem;
            border-bottom-right-radius: 0rem;
        }

        .pagination .page-item:last-child .page-link {
            border-top-left-radius: 0rem;
            border-bottom-left-radius: 0rem;
            border-top-right-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

    </style>

@endsection


@section('js')

@endsection
