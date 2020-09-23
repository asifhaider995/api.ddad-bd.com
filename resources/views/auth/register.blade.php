@extends('auth.layout')

@section('content')


    <div class="st_forms st_style1 st_no_border">
        <div class="st_height_30 st_height_lg_30"></div>
        <div class="st_form_head">
            <h1 class="st_form_title">One minute please..</h1>
            <h4 class="st_form_subtitle">Fill up the registration form</h4>
        </div>

        <form method="POST" action="{{ route('register') }}" class="st_signup_form">
            @csrf

            <div class="st_level_up st_level_up_lg form-group">
                <label for="first_name" >First name</label>
                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                @error('first_name')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="st_level_up st_level_up_lg form-group">
                <label for="last_name" >Last name</label>
                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                @error('last_name')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label" for="gender">Gender</label>
                <select class="st_selectpicker1" name="gender" id="gender" data-size="7" required>
                    <option value="male" >Male</option>
                    <option value="female" >Female</option>
                </select>
                <div class="st_error_message"></div>
            </div>

            <div class="st_level_up st_level_up_lg form-group">
                <label for="dob" >Date of birth</label>
                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                @error('dob')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="st_level_up st_level_up_lg form-group">
                <label for="mobile_number" >Mobile Number</label>
                <input id="mobile_number" type="tel" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number" autofocus>
                @error('mobile_number')
                    <span class="st_error_message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="st_level_up st_level_up_lg form-group">
                <label for="email" >Email</label>
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
            <div class="st_level_up st_level_up_lg form-group st_form_group_password">
                <label for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" type="password" class="form-control  st_password @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                <i class="st_password_eye material-icons">visibility</i>
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
