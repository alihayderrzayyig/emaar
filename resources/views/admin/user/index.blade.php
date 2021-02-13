@extends('layouts.appAdmin')

@php $active_sidebar = 'users'; @endphp

@section('content')
<section id="admin">
    <div class="row flex-row-reverse">

        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">


                {{-- <h1>{{ auth()->user()->authUserLogin() }}</h1> --}}

                <div class="mb-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-success">إضافة مستخدم</a>
                </div>
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
                                <th scope="col">الاسم</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($users)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ($users->currentPage()-1) * $users->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="d-flex">
                                            <div class="ml-2 flex btn btn-info btn-table">
                                                <a href="{{ route('admin.users.show', $user->id) }}"><i class="fas fa-eye"></i></a>
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
                                            <div class="ml-2 flex btn btn-warning btn-table ">
                                                <a href="{{ route('admin.users.edit', $user->id) }}"><i class="fas fa-cog"></i></a>
                                            </div>
                                            @if (!$user->authUserLogin())

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="ml-2 flex btn btn-danger btn-table">
                                                    <button type="submit"><i class="far fa-trash-alt"></i></button>
                                                    {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                                                </div>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endisset

                            </tbody>
                        </table>
                    </div>
                    <div class="paginet mt-3">
                        {{ $users->links() }}
                    </div>
                </div>


            </div>
    </div>
</section>
@endsection

