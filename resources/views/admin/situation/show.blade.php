@extends('layouts.appAdmin')
@php $active_sidebar = 'Situation'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container d-flex flex-column">

                @include('partials.admin.success-m')

                <div class="d-flex justify-content-lg-start mb-2">
                    <form action="{{ route('admin-situation.destroy', $situation->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="ml-2 flex btn btn-danger btn-table">
                            <button type="submit"><i class="far fa-trash-alt"></i></button>
                            {{-- <button onclick="handldelete2('project/{{ $item->id }}')" data-toggle="modal" data-target="#deleteCategory"><i class="far fa-trash-alt"></i></button> --}}
                        </div>
                    </form>
                    <div class="ml-2 flex btn btn-warning btn-table ">
                        <a href="{{ route('admin-situation.edit', $situation->id) }}"><i class="fas fa-cog"></i></a>
                    </div>

                    @if (!$situation->status)
                    <form action="{{ route('admin-situation.accept2', $situation->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="ml-2 flex btn btn-success btn-table">
                            <button type="submit"><i class="fas fa-check"></i></button>
                        </div>
                    </form>
                    @endif
                </div>



                {{-- <h1 class="text-center">{{ $situation->status }}</h1> --}}
                <div class="card p-0">
                    <img src="{{ asset($situation->image) }}" class="card-img-top" alt="...">
                    <h5 class="card-header">الاسم: {{ $situation->name }}  <br>  هاتف: {{ $situation->phone }}</h5>
                    <div class="card-body">
                        <p class="card-text"><span class="font-weight-bold">الوصف:</span><br>{{ $situation->description }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><span class="font-weight-bold">العنوان:</span></p>
                        <p>{{ $governorate->name }} - {{ $district->name }} - {{ $situation->region }}</p>
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
        .card .card-body,
        .card .card-header,
        .card .card-footer{
            direction: rtl;
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

