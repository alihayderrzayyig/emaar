@extends('layouts.app')

@php $active_sidebar = ''; @endphp

@section('header')
    @include('partials.loginModal')
    @include('partials.nav')
@endsection

@section('content')

<div class="row">
    <div class="col-6">
        <ul>
            @foreach ($gov as $item)
                <li>{{ $item->name }}</li>
                <div class="col-6">
                    <ul>
                        @foreach ($item->districts as $item)
                            <li>{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </ul>
    </div>
</div>


@endsection





@section('js')

@endsection
