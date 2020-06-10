@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Edit campaign: {{ $campaign->title }}</h2>
                    </div>
                    <div class="st_card_head_right">
                        @include('ddad.campaigns._status', ['status' => $campaign->status])
                    </div>
                </div>
                <div class="st_card_body">
                    <form action="{{ route('campaigns.update', $campaign) }}" id="edit-form" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="st_card_padd_25">
                            <div class="row">


                                <div class="col-lg-6">
                                    <div class="st_height_15 st_height_lg_15"></div>


                                    <div class="preview">
                                        <div class="title">Video</div>
                                        <div class="body">
                                            <div class="primary-video-preview-box">
                                                <span class="remove remove-primary-video">Remove</span>
                                                <video class="primary-video-box" style=" width: 100%; height: auto;" src="{{ $campaign->primary_src }}" controls>
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            <div class="primary-video-upload-box upload-box">
                                                <label for="primary-video" class="custom-file-upload">
                                                    <i class="fa fa-cloud-upload"></i> Select campaign Video
                                                </label>
                                                <input id="primary-video" name="primary_video" value="{{ old('primary_video') }}" type="file"/>
                                            </div>


                                            @if(\Auth::user()->isAdmin())
                                                @php
                                                    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
                                                @endphp

                                                <div style="padding: 15px; padding-bottom: 0px">
                                                    <div class="st_level_up form-group active1">
                                                        <label for="title">Queue position*</label>
                                                        <select required name="primary_queue" class="form-control">
                                                            @for($i = 0; $i <= setting_get('queue_size'); $i++)
                                                                <option value="{{ $i }}" @if(old('primary_queue', $campaign->primary_queue ?: 0) == $i) selected @endif>{{ $i !== 0 ? $numberFormatter->format($i) : "Please select queue" }}</option>
                                                            @endfor
                                                        </select>
                                                        @error('title')
                                                        <div class="st_error_message">{{ $messasge }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="st_height_25 st_height_lg_25"></div>




                                    <div class="preview">
                                        <div class="title">Image</div>
                                        <div class="body">
                                            <div class="secondary-video-preview-box">
                                                <span class="remove remove-secondary-video">Remove</span>
                                                <video class="secondary-video-box" src="{{ $campaign->secondary_src }}" style=" width: 100%; height: auto;" controls>
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            <div class="secondary-video-upload-box upload-box">
                                                <label for="secondary-video" class="custom-file-upload">
                                                    <i class="fa fa-cloud-upload"></i> Select campaign Video
                                                </label>
                                                <input id="secondary-video" name="secondary_video" value="{{ old('secondary_video') }}" type="file"/>
                                            </div>


                                            @if(\Auth::user()->isAdmin())
                                                @php
                                                    $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);
                                                @endphp

                                                <div style="padding: 15px; padding-bottom: 0px">
                                                    <div class="st_level_up form-group active1">
                                                        <label for="title">Queue position*</label>
                                                        <select name="secondary_queue" class="form-control">
                                                            <option value="">Queue position</option>
                                                            @for($i = 0; $i <= setting_get('queue_size'); $i++)
                                                                <option value="{{ $i }}" @if(old('secondary_queue', $campaign->secondary_queue ?: 0) == $i) selected @endif>{{ $i !== 0 ? $numberFormatter->format($i) : "Please select queue" }}</option>
                                                            @endfor
                                                        </select>
                                                        @error('title')
                                                        <div class="st_error_message">{{ $messasge }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>

                                </div>

                                <div class="col-sm-1 st_npcsf"></div>
                                <div class="col-lg-5">

                                    <div class="st_height_25 st_height_lg_25"></div>

                                    <div class="st_level_up form-group">
                                        <label for="title">Campaign title *</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $campaign->title) }}" required >
                                        @error('title')
                                            <div class="st_error_message">{{ $messasge }}</div>
                                        @enderror
                                    </div>

                                    @if(Auth::user()->isAdmin())
                                        <div class="st_level_up form-group active1">
                                            <label for="client">Client *</label>
                                            <select name="client_id" class="form-control" required>
                                                <option value="">Please select client</option>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}" @if($client->id == old('client_id', $campaign->client_id)) selected @endif>
                                                        {{ $client->full_name }}
                                                        @if($client->company_name)
                                                            -
                                                            {{ $client->company_name }}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('client')
                                            <div class="st_error_message">{{ $messasge }}</div>
                                            @enderror
                                        </div>
                                    @endif


                                    <div class="st_level_up form-group active1">
                                        <label for="package">Package *</label>
                                        <select name="package" class="form-control" @if(Auth::user()->isAdmin()) required @else disabled @endif>
                                            <option value="">Please select package</option>
                                            @foreach($packages as $package)
                                                <option value="{{ $package }}" @if((string) $package == old('package', $campaign->package->__toString())) selected @endif>{{ $package->name }} {{ $package->duration }}sec, {{ $package->rate }} taka/Day/TV</option>
                                            @endforeach
                                        </select>
                                        @error('package')
                                        <div class="st_error_message">{{ $messasge }}</div>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group active1">
                                                <label for="starting_date">Starting date*</label>
                                                <input type="date" name="starting_date" class="form-control @error('starting_date') is-invalid @enderror"
                                                       id="starting_date" value="{{ old('starting_date', $campaign->starting_date->format('Y-m-d')) }}"  @if(Auth::user()->isAdmin()) required @else disabled @endif>
                                                @error('starting_date')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="st_level_up form-group active1">
                                                <label for="ending_date">Ending date*</label>
                                                <input type="date" name="ending_date"
                                                       class="form-control @error('ending_date') is-invalid @enderror" id="ending_date"
                                                       value="{{ old('ending_date', $campaign->ending_date->format('Y-m-d')) }}"  @if(Auth::user()->isAdmin()) required @else disabled @endif>
                                                @error('ending_date')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="st_level_up form-group active1">
                                        <label for="locations">Target locations *</label>
                                        <select id="locations" name="locations[]" class="form-control" multiple  @if(Auth::user()->isAdmin()) required @else disabled @endif>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}" @if(in_array($location->id, old('locations', $campaign->locationsIds([])))) selected @endif>{{ $location->zone->name }}, {{ $location->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('location')
                                        <div class="st_error_message">{{ $messasge }}</div>
                                        @enderror
                                    </div>


                                    @if(Auth::user()->isAdmin())
                                        <div>
                                            <div class="st_level_up form-group">
                                                <label for="address">Reviewer note</label>
                                                <textarea name="reviewer_note" class=" form-control @error('reviewer_note') is-invalid @enderror" style="height: 92px;" rows="5" id="reviewer_note">{{ old('reviewer_note', $campaign->reviewer_note) }}</textarea>
                                                @error('reviewer_note')
                                                <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5" style="min-height: auto">
                                                <div class="st_iconbox_title">TV Count</div>
                                                <div class="st_iconbox_number" id="tv_count">0</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5" style="min-height: auto">
                                                <div class="st_iconbox_title">PRICE(TK)</div>
                                                <div class="st_iconbox_number" id="total_price">0</div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="st_height_25 st_height_lg_25"></div>


                                    @if(Auth::user()->isAdmin())
                                        <div style="width: calc(50% - 8px)">
                                            <div class="st_level_up form-group">
                                                <label for="address">Actual price</label>
                                                <input type="number" name="actual_price"
                                                       class=" form-control @error('actual_price') is-invalid @enderror" id="actual_price"
                                                       value="{{ old('actual_price', $campaign->actual_price ?: 0) }}" required>
                                                @error('actual_price')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif


                                    <div class="st_height_15 st_height_lg_15"></div>

                                    <div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="auto_renew" name="auto_renew" @if(old('auto_renew', $campaign->auto_renew)) checked @endif)>
                                            <label class="custom-control-label" for="customCheck1">Auto renew this campaign</label>
                                        </div>
                                    </div>
                                    <div class="st_height_20 st_height_lg_20"></div>

                                </div>


                            </div>

                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>

                            <div class="st_form_btns st_style1 text-right">
                                @csrf
                                <a href="{{ route('campaigns.index') }}" class="btn btn-outline-light">Cancel</a>
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
        function calculatePrice() {
            var starting_date = $('[name=starting_date]').val();
            var ending_date = $('[name=ending_date]').val();
            var package = $('[name=package]').val();
            var locations = $('#locations').val();

            $.post(
                "{{ route('campaigns.calculate') }}",
                {
                    "_token": "{{ csrf_token() }}",
                    starting_date,
                    ending_date,
                    package,
                    locations
                },
                function(response) {
                    $('#tv_count').html(response.number_of_tv)
                    $('#total_price').html(response.total_price)
                }
            )
        }

        $('[name=starting_date]').on('change', calculatePrice)
        $('[name=ending_date]').on('change', calculatePrice)
        $('[name=package]').on('change', calculatePrice)
        $('#locations').on('change', calculatePrice)

        calculatePrice();

        function changePrimaryVideo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.primary-video-box').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
                $('.primary-video-upload-box').hide();
                $('.primary-video-preview-box').show();
                return
            }
            $('.primary-video-upload-box').show();
            $('.primary-video-preview-box').hide();
        }


        $("#primary-video").change(function() {
            changePrimaryVideo(this)
        });

        $('.remove-primary-video').click(function() {
            $('[name=primary_video]').val(null)
            changePrimaryVideo($('[name=primary_video]'))
        });



        function changeSecondaryVideo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.secondary-video-box').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
                $('.secondary-video-upload-box').hide();
                $('.secondary-video-preview-box').show();
                return
            }
            $('.secondary-video-upload-box').show();
            $('.secondary-video-preview-box').hide();
        }


        $("#secondary-video").change(function() {
            changeSecondaryVideo(this)
        });

        $('.remove-secondary-video').click(function() {
            $('[name=secondary_video]').val(null)
            changeSecondaryVideo($('[name=secondary_video]'))
        });




        @if($campaign->primary_src)
            $('.primary-video-upload-box').hide();
            $('.primary-video-preview-box').show();
        @else
            ('.primary-video-upload-box').show();
            $('.primary-video-preview-box').hide();
        @endif



        @if($campaign->secondary_src)
            $('.secondary-video-upload-box').hide();
            $('.secondary-video-preview-box').show();
        @else
            ('.secondary-video-upload-box').show();
            $('.primary-preview-box').hide();
        @endif

    </script>

@endpush
