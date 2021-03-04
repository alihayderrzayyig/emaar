@extends('layouts.appAdmin')
@php $active_sidebar = 'achievments'; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">

                    <div class="d-flex flex-row-reverse justify-content-around mb-5">

                        <a href="{{ route('admin.branch.index') }}" class="btn-admin-header btn-admin-header-blue">
                            <div class="card d-flex flex-row-reverse">
                                <div class="icone m-0">
                                    <i class="far fa-file-alt m-0 p-0"></i>
                                </div>
                                <div class="text">
                                    <p class="m-0 p-0">كل الفروع</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.project.index') }}" class="btn-admin-header btn-admin-header-green">
                            <div class="card d-flex flex-row-reverse">
                                <div class="icone m-0">
                                    <i class="far fa-file-alt m-0 p-0"></i>
                                </div>
                                <div class="text">
                                    <p class="m-0 p-0">كل المشاريع</p>
                                </div>
                            </div>
                        </a>

                    </div>


                    <div class="card m-5 p-0">
                        <img src="{{ asset($project->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $project->title }}</h4>
                            <p class="card-text">{{ $project->body }}</p>
                            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        </div>
                    </div>


                </div>{{-- نهاية الكونتينر --}}





            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .card .card-body {
            direction: rtl;
        }

    </style>
@endsection
