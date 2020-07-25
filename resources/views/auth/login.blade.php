@extends('auth.layout')

@section('content')

    <div class="st_forms st_style1 st_no_border">
        <div class="st_height_30 st_height_lg_30"></div>
        <div class="st_form_head">
            <h1 class="st_form_title">Wait..</h1>
            <h4 class="st_form_subtitle">Please log in your account to continue</h4>
        </div>
        <form method="POST" action="{{ route('login') }}" class="st_login_form">
            @csrf

            <div class="st_level_up st_level_up_lg form-group">
                <label for="email" >Enter email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="st_level_up st_level_up_lg form-group st_form_group_password">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control  st_password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <i class="st_password_eye material-icons">visibility</i>
                @error('password')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group st_group_type1">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember me</label>
                </div>
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="st_form_link" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot Your Password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100">Log In</button>

        </form>
        <div class="st_height_40 st_height_lg_40"></div>
    </div>

    @if (Route::has('register'))
        <div class="st_height_15 st_height_lg_15"></div>
        <div class="st_form_footer text-left">
            Don't have account? <a href="{{ route('register') }}" class="st_form_link">Sign up now</a>
        </div>
    @endif
@endsection
