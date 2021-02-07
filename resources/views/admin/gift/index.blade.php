@extends('layouts.appAdmin')
@php $active_sidebar = 'gift'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">

                {{-- <div class="mb-3">
                    <a href="#" class="btn btn-success">إضافة مستخدم</a>
                </div> --}}
                {{-- فورم البحث --}}
                <form action="#" method="post" class="mb-4">
                  <div class="input-group flex-row-reverse mb-3">
                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <div class="input-group-prepend">
                      <button class="btn btn-secondary" type="submit" id="button-addon1"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>

                  <div class="card">
                      <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                          <thead class="thead-primary">
                            <tr>
                              <th scope="col">ت</th>
                              <th scope="col">الاسم:</th>
                              <th scope="col">رقم الهاتف:</th>
                              <th scope="col">لحالة معينة:</th>
                              <th scope="col">Handle</th>
                            </tr>
                          </thead>
                          <tbody>
                            {{-- @isset($users) --}}
                                @foreach ($gifts as $gift)
                                <tr>
                                    <td>{{  $loop->index + 1 }}</td>
                                    {{-- <td>1</td> --}}
                                    <td><a href="{{ route('admin.users.show', $gift->user_id) }}">{{ $gift->name }}</a></td>
                                    <td>{{ $gift->phone }}</td>
                                    <td>
                                        @if ($gift->situation_id != null)
                                           <a href="{{ route('admin-situation.show' ,$gift->situation->id) }}">{{ $gift->situation->name}}</a>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <div class="ml-2 flex btn btn-info btn-table">
                                            <button onclick="handlshow('{{ $gift->id }}')" type="button" data-toggle="modal" data-target="#messageShow{{ $gift->id }}"><i class="fas fa-eye"></i></button>
                                            {{-- <a href="{{ route('admin.gift.show', $gift->id) }}"><i class="fas fa-eye"></i></a> --}}
                                        </div>
                                        {{-- @if (true)
                                        <form action="#" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="ml-2 flex btn btn-success btn-table">
                                                <button type="submit"><i class="fas fa-check"></i></button>
                                            </div>
                                        </form>
                                        @endif --}}
{{--
                                        <div class="ml-2 flex btn btn-warning btn-table ">
                                            <a href="#"><i class="fas fa-cog"></i></a>
                                        </div> --}}

                                        <form action="{{ route('admin.gift.destroy', $gift->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="ml-2 flex btn btn-danger btn-table">
                                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                                                {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                            </div>
                                        </form>
                                    </td>
                                  </tr>
                                <!-- View Modal -->
                                <div class="modal fade" id="messageShow{{ $gift->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="ml-auto px-2">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="m-0"><span class="font-weight-bold">المرسل:</span> {{ $gift->name }}</p>
                                                <p class="m-0"><span class="font-weight-bold">الهاتف:</span> {{ $gift->phone }}</p>
                                                {{-- <p class="m-0">البريد الالكتروني: {{ __('hbhbhhbhbh') }}</p> --}}
                                                <p class="m-0">
                                                    <span class="font-weight-bold">العنوان:</span>
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
                                                <p class="m-0"><span class="font-weight-bold">التبرع ب:</span></p>
                                                <div class="border rounded px-2">
                                                    <p>{{ $gift->gift }}</p>
                                                </div>
                                            </div>
                                            <div class="flex btn btn-danger btn-table mx-auto btn-sm mb-2">
                                                <button onclick="handldelete2('/admin/admin-joinus/{{ $gift->id }}')" data-toggle="modal" data-target="#deleteCategory">حذف</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            {{-- @endisset --}}

                          </tbody>
                      </table>
                    </div>
                    {{-- <div class="paginet mt-3">
                        {{ $users->links() }}
                    </div> --}}
                </div>
            </div>
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

