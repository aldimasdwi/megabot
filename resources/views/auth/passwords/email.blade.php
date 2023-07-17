@extends('auth.master')

@section('title', __('Forgot Password'))

@section('content')

    <section class="auth-page">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
        <div class="animation-circle"><i></i><i></i><i></i></div>
        <div class="auth-card">
            <div class="text-center">
                <h2>{{ __('Forgot Password') }}</h2>
                <div class="line"></div>
            </div>
            <div class="main">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open(['route' => 'password.email', 'method' => 'POST', 'class' => 'auth-form']) !!}
                <div class="form-group">
                    {!! Form::label('email', __('static.e-mail_address')) !!}<i class="fa fa-envelope-o"></i>
                    {!! Form::email('email', old('email'), [
                        'class' => 'form-control',
                        'placeholder' => __('static.e-mail_address'),
                    ]) !!}
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit(__('Send Password Reset Link'), ['class' => 'btn submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection
