@extends('layouts.appAdmin')
@php $active_sidebar = 'Situation'; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')

                    {{-- @if (!(isset($DisplayButton) && $DisplayButton)) --}}
                    @include('partials.admin.allRequestSituationAndSituation')
                    {{-- @endif --}}

                    <h1 class="text-center">الحــــــــــــــــــــالات</h1>

                    @if (!(isset($DisplayButton) && $DisplayButton))
                        <div class="mb-3">
                            <a href="{{ route('admin.situation.create') }}" class="btn btn-success">إضافة حالة</a>
                        </div>
                    @endif

                    @if ($situations->count())

                        <form
                            action="{{ isset($accept) ? route('admin.situation.waiting') : route('admin.situation.index') }}"
                            method="get" class="mb-4">
                            <div class="input-group flex-row-reverse mb-3">
                                <input type="text" value="{{ request()->query('search') }}" name="search"
                                    class="form-control" placeholder="بحث" aria-label="Example text with button addon"
                                    aria-describedby="button-addon1">
                                <div class="input-group-prepend">
                                    <button class="btn btn-secondary" type="submit" id="button-addon1"><i
                                            class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <table dir="rtl" class="table table-striped" style="overflow-y:auto;">
                                <thead class="thead-primary">
                                    <tr>
                                        <th scope="col">ت</th>
                                        {{-- @if (!(isset($DisplayButton) && $DisplayButton)) --}}
                                        <th scope="col">الرقم التسلسلي</th>
                                        {{-- @endif --}}
                                        <th scope="col">العنوان</th>
                                        <th scope="col">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($situations as $item)
                                        <tr>
                                            <th scope="row">
                                                {{ ($situations->currentPage() - 1) * $situations->perPage() + $loop->index + 1 }}
                                            </th>
                                            {{-- @if (!(isset($DisplayButton) && $DisplayButton)) --}}
                                            <td>{{ $item->id }}</td>
                                            {{-- @endif --}}
                                            <td>{{ $item->name }}</td>
                                            <td class="d-flex">
                                                <div class="ml-2 flex btn btn-info btn-table">
                                                    <a href="{{ route('admin.situation.show', $item->id) }}"><i
                                                            class="fas fa-eye"></i></a>
                                                </div>
                                                @if (!$item->status)
                                                    <form action="{{ route('admin.situation.agree', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="ml-2 flex btn btn-success btn-table">
                                                            <button type="submit"><i class="fas fa-check"></i></button>
                                                        </div>
                                                    </form>
                                                @endif
                                                @if ($item->status)
                                                    <div class="flex btn btn-success btn-table ml-2">
                                                        <button onclick="addGift('situation/{{ $item->id }}/addGift')"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="fas fa-donate"></i></button>
                                                    </div>
                                                @endif
                                                <div class="ml-2 flex btn btn-warning btn-table ">
                                                    <a href="{{ route('admin.situation.edit', $item->id) }}"><i
                                                            class="fas fa-cog"></i></a>
                                                </div>
                                                <form action="{{ route('admin.situation.destroy', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="ml-2 flex btn btn-danger btn-table">
                                                        <button onclick="return confirm('هل انت متاكد من عملية الحذف')"
                                                            type="submit"><i class="far fa-trash-alt"></i>
                                                        </button>
                                                        {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="paginet mt-3">
                            {{ $situations->links() }}
                        </div>

                    @else
                        <h4 class="text-center">لا يوجد حالات ليتم عرضها</h4>
                    @endif



                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-4">
                                    <form id="addGiftSituation" action="" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">كمية المال:</label>
                                            <input type="number" name="money" class="form-control"
                                                id="exampleInputPassword1">
                                        </div>
                                        {{-- <div class="mx-auto w-100"> --}}
                                        <button type="submit" class="btn btn-primary btn-block mx-auto">إدخال قيمة</button>
                                        {{-- </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
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

        .modal,
        .card .card-body,
        .card .card-header,
        .card .card-footer {
            direction: rtl;
        }

    </style>
@endsection
@section('js')
    <script>
        function addGift(id) {
            // console.log(id)
            var form = document.getElementById('addGiftSituation')
            form.action = id
        }

    </script>
@endsection
