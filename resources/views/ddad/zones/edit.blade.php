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
                                <div class="col-lg-6">
                                    <div class="st_level_up form-group">
                                        <label for="name">Zone name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $zone->name) }}" required >
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <strong>Locations</strong><br/>
                                    <div class="locations">
                                        @foreach($zone->locations as $location)
                                            <div class="location" style="margin-bottom: 10px">
                                                <div class="row">
                                                    <div class="col-sm-10">
                                                        <input type="text" name="locations[{{ $location->id }}]" class="form-control" value="{{ $location->name }}" required >
                                                        <input type="hidden" name="previous_locations[{{ $location->id }}]" value="{{ $location->id }}" required >
                                                    </div>
                                                    <div class="col-sm-2"><a class="btn btn-danger" href="{{ route('zones.detach.location',  ['zone' => $zone, 'location' => $location]) }}">-</a></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-secondary add-new-location">+ Add New Location</button>
                                </div>
                                <div class="col-lg-3"></div>
                                @if($unAttachedLocations->isNotEmpty())
                                <div class="col-lg-3">
                                    <h5>Location without region</h5>
                                    @foreach($unAttachedLocations as $location)
                                        <a class="btn btn-info" href="{{ route('zones.attach.location', ['zone' => $zone, 'location' => $location]) }}">Add {{ $location->name }}</a>
                                        <div class="st_height_5 st_height_lg_5"></div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <div class="st_height_15 st_height_lg_15"></div>
                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>

                            <div class="st_form_btns st_style1 text-left">
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

    <div class="st_height_15 st_height_lg_15"></div>
@endsection

@push('script')
    <script type="text/javascript">
        $('.add-new-location').click(function() {
            var html = '<div class="location" style="margin-bottom: 10px">\n' +
                '                                                <div class="row">\n' +
                '                                                    <div class="col-sm-10">\n' +
                '                                                        <input type="text" name="locations[]" class="form-control" >\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-sm-2"><button type="button" class="btn btn-danger remove">-</button></div>\n' +
                '                                                </div>\n' +
                '                                            </div>'
            $('.locations').append($(html))
        });

        $(document).on('click', '.locations .remove', function() {
            alert('1')
            $(this).closest('.location').remove();
        });
    </script>

@endpush
