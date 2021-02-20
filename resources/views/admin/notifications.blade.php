@extends('layouts.appAdmin')
@php $active_sidebar = ''; @endphp
@section('content')
    <section id="admin">
        <div class="row flex-row-reverse">
            @include('partials.admin.side-bar')
            <div class="admin-content col-9 pl-0">
                <div class="session-messages mt-3">
                    @include('partials.error-message')
                    @include('partials.success-message')
                </div>

                <div class="container p-5">
                    <div class="card">

                        <table class="table">
                            <tbody>
                                @foreach ($notifications as $item)
                                    @if ($item->type == 'App\Notifications\NewMessageAdded')
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.notifications.message.show', $item->id) }}"
                                                    class="btn btn-info btn-sm">view</a>
                                            </td>
                                            <td class="">
                                                <p class="m-0 text-left font-s">
                                                    تم تلقي رسالة جديدة
                                                </p>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($item->type == 'App\Notifications\NewSituationAdded')
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.situation.show', $item->data['situation']['id']) }}"
                                                    class="btn btn-info btn-sm">view</a>
                                            </td>
                                            <td class="">
                                                <p class="m-0 text-left font-s">
                                                    تم تلقي طلب اضافة حالة
                                                </p>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($item->type == 'App\Notifications\NewGiftAdded')
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.notifications.gift.show', $item->id) }}"
                                                    class="btn btn-info btn-sm">view</a>
                                            </td>
                                            <td class="">
                                                <p class="m-0 text-left font-s">
                                                    طلب تقديم مساعدة
                                                </p>
                                            </td>
                                        </tr>
                                    @endif

                                    @if ($item->type == 'App\Notifications\NewJoinUsAdded')
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.notifications.joinUs.show', $item->id) }}"
                                                    class="btn btn-info btn-sm">view</a>
                                            </td>
                                            <td class="">
                                                <p class="m-0 text-left font-s">
                                                    تم تلقس طلب انضمام جديد
                                                </p>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('css')
    <style>
        .session-messages {
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
        function handledit(id) {
            // console.log(id)
            var form = document.getElementById('editImage')
            form.action = 'admin/achievements?image=' + id
        }

        function handldelete2(id) {
            // console.log(id)
            var form = document.getElementById('formedeletecategoy')
            form.action = id
        }

    </script>
@endsection
