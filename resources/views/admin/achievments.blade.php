@extends('layouts.appAdmin')
@php $active_sidebar = 'achievments'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                <div class="d-flex flex-row-reverse justify-content-around mb-5">
                    <a href="{{ route('branch.index') }}" class="btn-admin-header btn-admin-header-blue">
                        <div class="card d-flex flex-row-reverse">
                            <div class="icone m-0">
                                <i class="far fa-file-alt m-0 p-0"></i>
                            </div>
                            <div class="text">
                                <p class="m-0 p-0">فروعنا</p>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('project.index') }}" class="btn-admin-header btn-admin-header-green">
                        <div class="card d-flex flex-row-reverse">
                            <div class="icone m-0">
                                <i class="far fa-file-alt m-0 p-0"></i>
                            </div>
                            <div class="text">
                                <p class="m-0 p-0">مشاريع منجزة</p>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- <h1>tttttttttttttttt</h1> --}}
                <h1 class="text-center">جديد فروعنا </h1>

                <div class="mb-3">
                    <a href="{{ route('branch.create') }}" class="btn btn-success">إضافة فرع جديد</a>
                </div>

                <div class="card mb-5">
                    <table dir="rtl" class="table table-striped">
                        <thead class="thead-primary">
                            <tr>
                            <th scope="col">ت</th>
                            <th scope="col">صورة</th>
                            <th scope="col">العنوان</th>
                            <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branches as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td><img style="height: 30px; width: 50px;" src="{{ asset($item->image) }}" alt="" srcset=""></td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <div class="flex btn btn-info btn-table">
                                            <a href="{{ route('branch.show', $item->id) }}"><i class="fas fa-eye"></i></a>
                                        </div>
                                        <div class="flex btn btn-warning btn-table mx-3">
                                            <a href="{{ route('branch.edit', $item->id) }}"><i class="fas fa-cog"></i></a>
                                        </div>
                                        <div class="flex btn btn-danger btn-table">
                                            <button onclick="handldelete2('branch/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h1 class="text-center">جديد المشاريع المكتملة</h1>

                <div class="mb-3">
                    <a href="{{ route('project.create') }}" class="btn btn-success">إضافة مشروع منجز</a>
                </div>

                <div class="card">
                    <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">ت</th>
                                <th scope="col">الصورة</th>
                                <th scope="col">العنوان</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td><img style="height: 30px; width: 50px;" src="{{ asset($item->image) }}" alt="" srcset=""></td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        <div class="flex btn btn-info btn-table">
                                            <a href="{{ route('project.show', $item->id) }}"><i class="fas fa-eye"></i></a>
                                        </div>
                                        <div class="flex btn btn-warning btn-table mx-3">
                                            <a href="{{ route('project.edit', $item->id) }}"><i class="fas fa-cog"></i></a>
                                        </div>
                                        <div class="flex btn btn-danger btn-table">
                                            <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- مودل الحذف --}}
                @include('partials.admin.delete-model')
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
    <script>
        function handldelete2(id){
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action =  'achievments/'+id
        }
    </script>
@endsection

