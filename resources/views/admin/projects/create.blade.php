@extends('layouts.appAdmin')
@php $active_sidebar = 'achievments'; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9">
                <div class="container">
                    @include('partials.admin.success-m')
                    @include('partials.admin.error-m')
                    @if ($errors->any())
                        <div class="alert alert-danger text-left">
                            <ul class="list-unstyled m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h1 class="text-center mb-4">{{ isset($project) ? __('تحديث مشروع منجز'): __('إضافة مشروع جديد تم انجازة') }}</h1>
                    <form
                        action="{{ isset($project) ? route('admin.project.update', $project->id) : route('admin.project.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($project))
                            @method('PUT')
                        @endif
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input id="title" name="title" type="text" class="form-control"
                                            value="{{ isset($project) ? $project->title : '' }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="body">الوصف</label>
                                        <textarea name="body" id="body" rows="5"
                                            class="form-control">{{ isset($project) ? $project->body : '' }}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="col-12">
                                    <fieldset class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="show" id="gridRadios1"
                                                value="1" @if (isset($project) && $project->show) checked @endif>
                                            <label class="form-check-label" for="gridRadios1">
                                                عرض في جديد فروعنا
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="show" id="gridRadios2"
                                                value="0" @if (isset($project) && $project->show == 0) checked @endif>
                                            <label class="form-check-label" for="gridRadios2">
                                                اخفاء من جديد فروعنا
                                            </label>
                                        </div>
                                    </fieldset>
                                </div> --}}

                                @if (isset($project))
                                    <div class="col-12">
                                        <div class="form-group">
                                            <img src="{{ asset($project->image) }}" alt="" srcset=""
                                                style="width: 100%; height: 25rem; border-radius: 5px">
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">إضافة صورة:</label>
                                        <input type="file" name="image" class="form-control-file"
                                            id="exampleFormControlFile1">
                                    </div>
                                </div>



                                <div class="mx-auto">
                                    <button type="submit"
                                        class="btn btn-submit">{{ isset($project) ? 'تحديت' : 'حفظ' }}</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .card {
            direction: rtl !important;
        }

    </style>
@endsection
