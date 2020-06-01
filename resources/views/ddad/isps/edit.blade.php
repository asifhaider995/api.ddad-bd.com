@extends('ddad.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Edit isp:</h2>
                    </div>
                    <div class="st_card_head_right">
                        <button data-toggle="modal" data-target="#devices-create-modal" class="btn btn-primary btn-sm">
                            <i class="material-icons">exit_to_app</i>Back
                        </button>
                    </div>
                </div>
                <div class="st_card_body" style="padding: 20px;">
                    <form action="{{ route('isps.update', $isp) }}" method="post" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="st_level_up form-group">
                                    <label for="name">ISP name*</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           id="name" value="{{ old('name', $isp->name) }}">
                                    @error('name')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="st_level_up form-group">
                                    <label for="contact_person">Contact person*</label>
                                    <input type="text" name="contact_person"
                                           class="form-control @error('contact_person') is-invalid @enderror" id="contact_person"
                                           value="{{ old('contact_person', $isp->contact_person) }}" >
                                    @error('contact_person')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="st_level_up form-group">
                                    <label for="mobile_number">Mobile nubmer*</label>
                                    <input type="text" name="mobile_number"
                                           class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number"
                                           value="{{ old('mobile_number', $isp->mobile_number) }}" >
                                    @error('mobile_number')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">

                                <div class="st_level_up form-group">
                                    <label for="package_name">Package name*</label>
                                    <input type="text" name="package_name"
                                           class="form-control @error('package_name') is-invalid @enderror" id="package_name"
                                           value="{{ old('package_name', $isp->package_name) }}" >
                                    @error('package_name')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="st_level_up form-group">
                                    <label for="package_price">Package price*</label>
                                    <input type="number" name="package_price" class="form-control @error('package_price') is-invalid @enderror"
                                           id="detector_label" value="{{ old('package_price', $isp->package_price) }}" >
                                    @error('package_price')
                                    <div class="st_error_message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save device</button>


                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="st_height_15 st_height_lg_15"></div>

@endsection

