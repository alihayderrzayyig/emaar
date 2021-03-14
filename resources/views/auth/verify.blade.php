@extends('layouts.app')

@section('content')
    <section id="varify-email">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            {{ __('قبل المتابعة ، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق. إذا لم تفعل') }}
                            {{ __('إذا لم تستلم البريد الإلكتروني') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('انقر هنا لطلب مرة اخرا') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
<style>
    #varify-email{
        height: 90vh;
        padding-top: 6rem;
    }
    #varify-email .card .card-body{
        direction: rtl
    }
</style>
@endsection

