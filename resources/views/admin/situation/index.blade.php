@extends('layouts.appAdmin')
@php $active_sidebar = 'Situation'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                @include('partials.admin.success-m')

                @if (!(isset($DisplayButton) && $DisplayButton))
                    <div class="d-flex flex-row-reverse justify-content-around mb-5">
                        <a href="#" class="btn-admin-header btn-admin-header-blue">
                            <div class="card d-flex flex-row-reverse">
                                <div class="icone m-0">
                                    <i class="far fa-file-alt m-0 p-0"></i>
                                </div>
                                <div class="text">
                                    <p class="m-0 p-0">فروعنا</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('admin-situation.waiting') }}" class="btn-admin-header btn-admin-header-green">
                            <div class="card d-flex flex-row-reverse">
                                <div class="icone m-0">
                                    <i class="far fa-file-alt m-0 p-0"></i>
                                </div>
                                <div class="text">
                                    <p class="m-0 p-0">{{ $situationAccept }} طلبات الموافقة</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif

                <h1 class="text-center">جديد فروعنا </h1>

                @if (!(isset($DisplayButton) && $DisplayButton))
                    <div class="mb-3">
                        <a href="{{ route('admin-situation.create') }}" class="btn btn-success">إضافة حالة</a>
                    </div>
                @endif

                <div class="card">
                    <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">ت</th>
                                {{-- <th scope="col">الصورة</th> --}}
                                <th scope="col">العنوان</th>
                                <th scope="col">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($situations as $item)

                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    {{-- <td><img style="height: 30px; width: 50px;" src="1" alt="" srcset=""></td> --}}
                                    <td>{{ $item->name }}</td>
                                    <td class="d-flex">
                                        <div class="ml-2 flex btn btn-info btn-table">
                                            <a href="{{ route('admin-situation.show', $item->id) }}"><i class="fas fa-eye"></i></a>
                                        </div>
                                        @if (!$item->status)
                                        <form action="{{ route('admin-situation.agree', $item->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="ml-2 flex btn btn-success btn-table">
                                                <button type="submit"><i class="fas fa-check"></i></button>
                                            </div>
                                        </form>
                                        @endif
                                        <div class="ml-2 flex btn btn-warning btn-table ">
                                            <a href="{{ route('admin-situation.edit', $item->id) }}"><i class="fas fa-cog"></i></a>
                                        </div>
                                        <form action="{{ route('admin-situation.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="ml-2 flex btn btn-danger btn-table">
                                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                                                {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
    <script>
        function handldelete2(id){
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action =  'achievments/'+id
        }
    </script>
@endsection

