@extends('ddad.layout')
@section('content')


    <div class="row">

        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Edit zone</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <form action="{{ route('zones.update', $zone) }}" id="edit-form" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="st_height_25 st_height_lg_25"></div>
                        <div class="st_card_padd_25">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <div class="st_level_up form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $zone->name) }}" required >
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class=" form-control @error('description') is-invalid @enderror" style="height: 92px;" rows="5" id="description" required>{{ old('description', $zone->description) }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                </div>
                            </div>

                            <div class="st_height_15 st_height_lg_15"></div>
                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>

                            <div class="st_form_btns st_style1 text-right">
                                <a href="{{ route('zones.index') }}" class="btn btn-outline-light">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

