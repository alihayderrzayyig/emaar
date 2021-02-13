@extends('layouts.appAdmin')
@php $active_sidebar = 'admin-message'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                @include('partials.admin.success-m')

                <h2 class="text-center mb-3">الرسائل المستلمة</h2>

                @if ($messags->count())
                    <div class="card">
                        <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">ت</th>
                                    {{-- <th scope="col">الصورة</th> --}}
                                    <th scope="col">الاسم</th>
                                    <th scope="col">هاتف</th>
                                    <th scope="col">البريد الالكتروني</th>
                                    <th scope="col">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messags as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        {{-- <td><img style="height: 30px; width: 50px;" src="1" alt="" srcset=""></td> --}}
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="d-flex">
                                            {{-- <div class="ml-2 flex btn btn-info btn-table">
                                                <a href="{{ route('admin-message.show', $item->id) }}"><i class="fas fa-eye"></i></a>
                                            </div> --}}
                                            <div class="ml-2 flex btn btn-info btn-table">
                                                <button onclick="handlshow('{{ $item->id }}')" type="button" data-toggle="modal" data-target="#messageShow{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                            </div>
                                            <div class="flex btn btn-danger btn-table ml-2">
                                                <button onclick="handldelete2('/admin/admin-message/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>

                                    
                                    <!-- View Modal -->
                                    <div class="modal fade" id="messageShow{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="ml-auto px-2">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="m-0">المرسل: {{ $item->name }}</p>
                                                    <p class="m-0">هاتف: {{ $item->phone }}</p>
                                                    <p class="m-0">البريد الالكتروني: {{ $item->email }}</p>
                                                    <p class="m-0">الوصف:</p>
                                                    <div class="border rounded px-2">
                                                        <p>{{ $item->description }}</p>
                                                    </div>
                                                </div>
                                                <div class="flex btn btn-danger btn-table mx-auto btn-sm mb-2">
                                                    <button onclick="handldelete2('/admin/admin-message/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory">حذف</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- مودل الحذف --}}
                    @include('partials.admin.delete-model')
                    {{-- نهاية مودل الحذف --}}
                @else
                    <h5 class="text-center mb-3">لا يوجد رسائل ليتم عرضها</h5>
                @endif

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
        .modal-body{
            direction: rtl
        }
        .modal-content .btn-table button {
            font-size: 1rem;
        }
    </style>
@endsection
@section('js')
    <script>
        function handldelete2(id){
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action = id
        }
    </script>
@endsection

