@extends('auth.master')

@section('title', __('Login'))

@section('content')
    <section class="login-section">
        <div class="login-box">
            <div class="text-center mb-4">
                <h2 class="mb-2">{{ __('auth.sign_in') }}</h2>
                <div class="line"></div>
                <p>{{ __('auth.welcome_note') }}</p>
            </div>
            <div class="">
                {!! Form::open(['route' => 'admin.login', 'method' => 'POST', 'class' => 'auth-form']) !!}
                <div class="form-group">
                    {!! Form::label('email', __('auth.e-mail_address'), ['class' => 'form-label']) !!}<i class="fa fa-envelope-o"></i>
                    {!! Form::email('email', old('email'), [
                        'class' => 'form-control',
                        'placeholder' => __('auth.e-mail_address'),
                        'id' => 'email-input',
                    ]) !!}

                </div>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    {!! Form::label('password', __('auth.password'), ['class' => 'form-label']) !!}<i class="fa fa-lock"></i>
                    {!! Form::password('password', [
                        'class' => 'form-control',
                        'id' => 'password-input',
                        'placeholder' => __('auth.password'),
                    ]) !!}
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="btn btn-default forgot-pass">{{ __('Forgot ?') }}</a>
                    @endif
                </div>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('g-recaptcha-response')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (session('error'))
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ session('error') }}</strong>
                </span>
                @endif
                <div class="form-group mb-0">
                    {!! Form::submit(__('auth.sign_in'), ['class' => 'btn-solid']) !!}
                </div>
                {!! Form::close() !!}

                <div class="copy-data">
                    <div class="copy-data-div">
                        <label>Admin</label>
                        <p><span id="email"><i class="fa fa-envelope-o"></i></span><span>admin@example.com</span></p>
                        <p><span id="password"><i class="fa fa-lock"></i></span><span>12345678</span></p>
                    </div>
                    <div>
                        <button class="code-box-copy__btn btn-clipboard" id="autofill-btn" title="Copy">
                            <i class="ri-file-copy-line"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#autofill-btn').on('click', function() {
                var username = $('#email').next('span').text();
                var password = $('#password').next('span').text();
                $('#email-input').val(username);
                $('#password-input').val(password);
            });
        });
    </script>
@endpush
