@extends('auth.master')

@section('title', __('Reset Password'))

@section('content')

    <section class="auth-page">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
        <div class="animation-circle"><i></i><i></i><i></i></div>
        <div class="auth-card">
            <div class="text-center">
                <h2>{{ __('Reset Password') }}</h2>
                <div class="line"></div>
                <p>{{ __('Welcome To Chatloop, Please Create your Password.') }}</p>
            </div>
            <div class="main">
                {!! Form::open(['route' => 'password.update', 'method' => 'POST', 'class' => 'auth-form']) !!}
                {!! Form::hidden('token', $token) !!}
                <div class="form-group">
                    {!! Form::label('email', __('static.e-mail_address')) !!}<i class="fa fa-envelope-o"></i>
                    {!! Form::email('email', $email ?? old('email'), [
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
                    {!! Form::label('password', __('static.password')) !!}<i class="fa fa-lock"></i>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('static.password')]) !!}
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('Confirm Password', __('static.password')) !!}<i class="fa fa-lock"></i>
                    {!! Form::password('password_confirmation', [
                        'class' => 'form-control',
                        'placeholder' => __('Confirm Password'),
                    ]) !!}
                    @error('password_confirmation')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::submit(__('Reset Password'), ['class' => 'btn submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection
