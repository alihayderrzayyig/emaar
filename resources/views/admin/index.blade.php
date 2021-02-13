@extends('layouts.appAdmin')
@php $active_sidebar = 'main'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        {{-- <div class="admin-side-bar col-3 p-0 m-0">
            <div class="admin-info">
                <img src="{{ asset('img/08.jpg ') }}" alt="" class="bg-img">
                    <img src="{{ asset('img/01.jpg ') }}" alt="">
                <h4>علي حيدر رزيك</h4>
                <p class="m-0">ali.hayder.rzayyig@gmail.com</p>
            </div>
            <div class="admin-link">
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الصفحة الرئيسية</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse active">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">اجزاء الموقع </p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الرسائل</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الحالات</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">التبرعات</p>
                </a>
                <a href="{{ route('admin.users.index') }}" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">الاعظاء</p>
                </a>
                <a href="#" class="d-flex flex-row-reverse">
                    <i class="fab fa-facebook-square align-self-center"></i>
                    <p class="align-self-center">خروج</p>
                </a>


            </div>
        </div> --}}
        @include('partials.admin.side-bar')
        <div class="admin-content col-9 pl-0" >
            <div class="session-messages mt-3">
                @include('partials.error-message')
                @include('partials.success-message')
            </div>

            <div class="container p-5">
                <div class="card">
                    <img src="{{ asset('img/1.jpg') }}" alt="">
                </div>
            </div>
            {{-- قسم لقطة منجزات --}}
            <div class="container p-5" style="background-color: rgb(220, 230, 247)">
                <h2 class="text-center mb-4">تعديل قسم لقطة منجزات</h2>
                <div class="card">
                    <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                        <thead class="thead-primary">
                            <tr>
                            <th scope="col">ت</th>
                            <th scope="col">الصورة</th>
                            <th scope="col">حجم الصورة</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <img style="width: 40px; height: 30px;" src="{{ asset('img/achievements01.jpg') }}" alt="">
                                </td>
                                <td>(550*480)</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td >
                                    <div class="ml-2 flex btn btn-warning btn-table">
                                        <button onclick="handledit('achievements01.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <img style="width: 40px; height: 30px;" src="{{ asset('img/achievements02.jpg') }}" alt="">
                                </td>
                                <td>(270*320)</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td >
                                    <div class="ml-2 flex btn btn-warning btn-table">
                                        <button onclick="handledit('achievements02.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <img style="width: 40px; height: 30px;" src="{{ asset('img/achievements03.jpg') }}" alt="">
                                </td>
                                <td>(270*320)</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td >
                                    <div class="ml-2 flex btn btn-warning btn-table">
                                        <button onclick="handledit('achievements03.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <img style="width: 40px; height: 30px;" src="{{ asset('img/achievements04.jpg') }}" alt="">
                                </td>
                                <td>(265*480)</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td >
                                    <div class="ml-2 flex btn btn-warning btn-table">
                                        <button onclick="handledit('achievements04.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <img style="width: 40px; height: 30px;" src="{{ asset('img/achievements05.jpg') }}" alt="">
                                </td>
                                <td>(265*240)</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td >
                                    <div class="ml-2 flex btn btn-warning btn-table">
                                        <button onclick="handledit('achievements05.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>
                                    <img style="width: 40px; height: 30px;" src="{{ asset('img/achievements06.jpg') }}" alt="">
                                </td>
                                <td>(265*240)</td>
                                {{-- <td>{{ $user->email }}</td> --}}
                                <td >
                                    <div class="ml-2 flex btn btn-warning btn-table">
                                        <button onclick="handledit('achievements06.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- View Modal -->
                <!-- Modal -->
                <div class="modal fade" id="ching-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <form id="editImage" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleFormControlFile1">:إضافة صورة</label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-block mx-auto">حفظ</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>

            </div>

            {{-- قسم القائمين على الموقع --}}
            <div class="container p-5">
                <h2 class="text-center mb-4">تعديل قسم القائمين على الموقع</h2>
                <div class="mb-3">
                    <a href="{{ route('admin.responsible.create') }}" class="btn btn-success">إضافة مسؤول</a>
                </div>
                @if ($responsibles->count())
                    <div class="card">
                        <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                            <thead class="thead-primary">
                                <tr>
                                <th scope="col">ت</th>
                                <th scope="col">الصورة</th>
                                <th scope="col">الاسم</th>
                                <th scope="col">الوصف</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($responsibles as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img style="width: 40px; height: 30px;" src="{{ asset($item->image) }}" alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ str_limit($item->body , 30) }}</td>
                                        <td >
                                            {{-- <div class="ml-2 flex btn btn-warning btn-table">
                                                <button onclick="handledit('achievements01.jpg')" type="button" data-toggle="modal" data-target="#ching-img"><i class="fas fa-cog"></i></button>
                                            </div> --}}

                                            <div class="ml-2 flex btn btn-warning btn-table ">
                                                <a href="{{ route('admin.responsible.edit', $item->id) }}"><i class="fas fa-cog"></i></a>
                                            </div>
                                            <div class="flex btn btn-danger btn-table ml-2">
                                                <button onclick="handldelete2('/admin/responsible/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- مودل الحذف --}}
                        @include('partials.admin.delete-model')
                    </div>
                @else
                    <h5 class="text-center mb-4">لا يوجد مسؤولين ليتم عرضهم</h5>
                @endif

                <!-- View Modal -->
                <!-- Modal -->
                <div class="modal fade" id="ching-img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <form id="editImage" action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleFormControlFile1">:إضافة صورة</label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-block mx-auto">حفظ</button>
                            </div>
                        </form>
                        </div>
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
        .session-messages{
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



@section('js')
    <script>
        function handledit(id){
            // console.log(id)
            var form = document.getElementById('editImage')
            form.action = 'admin/achievements?image='+id
        }
        function handldelete2(id){
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action = id
        }
    </script>
@endsection
