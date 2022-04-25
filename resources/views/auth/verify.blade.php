@extends('layouts.app')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="px-4 row px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="mb-0 h2 text-uppercase">{{ __('Verify Your Email Address') }}</h1>
                </div>
                <div class="col-lg-6 text-lg-right">

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class="mb-4 h5 text-uppercase">{{ __('Verify Your Email Address') }}</h2>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="p-0 m-0 align-baseline btn btn-link">{{ __('click here to request another') }}</button>.
                </form>
            </div>
        </div>
    </section>
@endsection
