@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">User registration form</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <form action="{{ route('users.store') }}" id="edit-form" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="st_card_padd_25">
                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="st_height_25 st_height_lg_25"></div>

                                    <div class="custom-control custom-radio">
                                        <input checked type="radio" id="is_client_yes" name="is_client" @if(old('is_client') == 'yes') checked @endif value="yes" class="custom-control-input">
                                        <label class="custom-control-label" for="is_client_yes">I want to create client profile</label>
                                    </div>

                                    <div class="st_height_10 st_height_lg_10"></div>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="is_client_no"  @if(old('is_client') == 'no') checked @endif name="is_client" value="no" class="custom-control-input">
                                        <label class="custom-control-label" for="is_client_no">I want to create admin profile</label>
                                    </div>

                                    @error('is_client')
                                        <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                    <div class="st_height_25 st_height_lg_25"></div>


                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label for="first_name">First name *</label>
                                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}" required >
                                                @error('first_name')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="last_name">Last name *</label>
                                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name') }}" required >
                                                @error('last_name')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>


                                            <div class="st_level_up form-group">
                                                <label for="mobile_number">Mobile number *</label>
                                                <input type="text" name="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" value="{{ old('mobile_number') }}" required >
                                                @error('mobile_number')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="gender_male" name="gender" value="male" @if(old('gender') == 'male') checked @endif checked class="custom-control-input">
                                                    <label class="custom-control-label" for="gender_male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="gender_female" name="gender" value="female" @if(old('gender') == 'female') checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="gender_female">Female</label>
                                                </div>
                                                @error('gender')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                                <div class="st_height_15 st_height_lg_15"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label for="company_name">Company name</label>
                                                <input type="text" name="company_name" class="form-control @error('st_level_up') is-invalid @enderror" id="st_level_up" value="{{ old('company_name') }}" >

                                                @error('company_name')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="address">Address</label>
                                                <textarea name="address" class=" form-control @error('address') is-invalid @enderror" style="height: 92px;" rows="5" id="address">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="st_level_up form-group">
                                            <label for="description">Descriptions</label>
                                            <textarea name="description" class=" form-control @error('description') is-invalid @enderror" style="height: 92px;" rows="5" id="description" >{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="st_error_message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>
                                </div>

                                <div class="col-sm-1 st_npcsf"></div>

                                <div class="col-lg-3">
                                    <div class="st_height_10 st_height_lg_10"></div>
                                    <h4>Credential</h4>
                                    <div class="st_height_15 st_height_lg_15"></div>


                                    <div class="st_level_up form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required >
                                        @error('email')
                                            <div class="st_error_message">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="st_level_up form-group">
                                        <label for="password">Password*</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" required >
                                        <div>Minimum 8 character</div>
                                        @error('password')
                                            <div class="st_error_message">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="st_level_up form-group">
                                        <label for="password_confirmation">Password Confirmation*</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="{{ old('password_confirmation') }}" required >
                                        @error('password_confirmation')
                                            <div class="st_error_message">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                            </div>

                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>

                            <div class="st_form_btns st_style1 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="st_height_25 st_height_lg_25"></div>
@endsection


@push('script')
    <script type="text/javascript">
        $('#is_client_no').click(function() {
            alert($(this).checked());
        })
    </script>
@endpush
