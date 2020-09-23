@extends('auth.layout')

@section('content')
    <div class="st_forms st_style1 st_no_border">
        <div class="st_height_30 st_height_lg_30"></div>
        <div class="st_form_head">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="st_form_title">Forgot Password..</h1>
            <h4 class="st_form_subtitle">Enter your email address and we'll send you link to reset your password.</h4>
        </div>
        <form method="POST" action="{{ route('password.email') }}" class="st_login_form">
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

            <button type="submit" class="btn btn-primary btn-lg w-100">Send Email</button>

        </form>
        <div class="st_height_40 st_height_lg_40"></div>
    </div>

    @if (Route::has('login'))
        <div class="st_height_15 st_height_lg_15"></div>
        <div class="st_form_footer text-left">
            <a href="{{ route('login') }}" class="st_form_link">Back to login</a>
        </div>
    @endif
@endsection
