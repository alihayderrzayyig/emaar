@extends('layouts.appAdmin')
@php $active_sidebar = 'gift'; @endphp
@section('content')
<section id="admin">
    <div class="row flex-row-reverse">
        @include('partials.admin.side-bar')
        <div class="admin-content col-9">
            <div class="container">
                <h1>show page</h1>
            </div>
        </div>
    </div>
</section>
@endsection
