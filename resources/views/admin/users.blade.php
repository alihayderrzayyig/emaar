@extends('layouts.appAdmin')

@php $active_sidebar = 'users'; @endphp

@section('content')
<section id="admin">
    <div class="row flex-row-reverse">

        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">

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
                            {{-- @php
                                $i = 1;
                            @endphp --}}
                                @foreach ($users as $user)
                                <tr>
                                    {{-- <th scope="row">{{ $no++ }}</th> --}}
                                    <td>{{ ($users->currentPage()-1) * $users->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@mdo</td>
                                  </tr>
                                @endforeach
                            @endisset
                            {{-- <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr>
                            <tr>
                              <th scope="row">3</th>
                              <td>Larry</td>
                              <td>the Bird</td>
                              <td>@twitter</td>
                            </tr> --}}
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

