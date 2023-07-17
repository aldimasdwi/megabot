@extends('auth.master')

@section('title', __('Verify'))

@section('content')
<section class="auth-page">
    <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
    <div class="animation-circle"><i></i><i></i><i></i></div>
    <div class="auth-card">
        <div class="text-center">
            <h2>{{ __('Verify Your Email Address') }}</h2>
        </div>
        <div class="main">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            {!! Form::open(['route' => 'verification.resend', 'method' => 'POST', 'class' => 'auth-form']) !!}
            {!! Form::submit(__('click here to request another'), ['class' => 'btn submit']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection
