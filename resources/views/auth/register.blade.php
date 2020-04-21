@extends('auth.layout')

@section('content')


    <div class="st_forms st_style1 st_no_border">
        <div class="st_height_30 st_height_lg_30"></div>
        <div class="st_form_head">
            <h1 class="st_form_title">One minute please..</h1>
            <h4 class="st_form_subtitle">Fill up the registration form. We know, long registration form is disgusting.</h4>
        </div>

        <form method="POST" action="{{ route('register') }}" class="st_signup_form">
            @csrf

            <div class="st_level_up st_level_up_lg form-group">
                <label for="name" >Your name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="st_level_up st_level_up_lg form-group">
                <label for="email" >Your email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="st_level_up st_level_up_lg form-group st_form_group_password">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control  st_password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <i class="st_password_eye material-icons">visibility</i>
                        @error('password')
                            <span class="st_error_message" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div>Use 8 or more characters with a mix of letters, numbers & symbols</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="st_level_up st_level_up_lg form-group st_form_group_password">
                        <label for="password_confirmation">Confirm password</label>
                        <input id="password_confirmation" type="password" class="form-control  st_password @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                        <i class="st_password_eye material-icons">visibility</i>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Sign Up</button>

        </form>
        <div class="st_height_40 st_height_lg_40"></div>
    </div>

    @if (Route::has('register'))
        <div class="st_height_15 st_height_lg_15"></div>
        <div class="st_form_footer text-left">
            Already have an account? <a href="{{ route('login') }}" class="st_form_link">Login now</a>
        </div>
    @endif

@endsection
