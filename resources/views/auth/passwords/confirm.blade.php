@extends('auth.master')

@section('title', __('Confirm Password'))

@section('content')

    <section class="auth-page">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
        <div class="animation-circle"><i></i><i></i><i></i></div>
        <div class="auth-card">
            <div class="text-center">
                <h2>{{ __('Confirm Password') }}</h2>
                <div class="line"></div>
            </div>
            <div class="main">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {!! Form::open(['route' => 'password.confirm', 'method' => 'POST', 'class' => 'auth-form']) !!}
                <div class="form-group">
                    {!! Form::label('password', __('static.password')) !!}<i class="fa fa-lock"></i>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('static.password')]) !!}
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="btn btn-default forgot-pass">{{ __('Forgot ?') }}</a>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit(__('Confirm Password'), ['class' => 'btn submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection
