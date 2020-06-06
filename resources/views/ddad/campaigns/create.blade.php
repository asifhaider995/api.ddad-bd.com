@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">New campaign form</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <form action="{{ route('campaigns.store') }}" id="edit-form" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="st_card_padd_25">
                            <div class="row">


                                <div class="col-lg-6">
                                    <div class="st_height_15 st_height_lg_15"></div>


                                </div>
                                <div class="col-sm-1 st_npcsf"></div>
                                <div class="col-lg-5">

                                    <div class="st_height_25 st_height_lg_25"></div>

                                    <div class="st_level_up form-group">
                                        <label for="title">Campaign title *</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required >
                                        @error('title')
                                            <div class="st_error_message">{{ $messasge }}</div>
                                        @enderror
                                    </div>

                                    @if(Auth::user()->isAdmin())
                                    <div class="st_level_up form-group active1">
                                        <label for="client">Client *</label>
                                        <select name="client" class="form-control">
                                            <option value="">Please select client</option>
                                            @foreach($clients as $client)
                                                <option>
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
                                        <select name="package" class="form-control" required>
                                            <option value="">Please select package</option>
                                            @foreach($packages as $package)
                                                <option value="{{ $package }}">{{ $package->name }} {{ $package->duration }}sec, {{ $package->rate }} taka/Day/TV</option>
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
                                                       id="starting_date" value="{{ old('starting_date') }}" >
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
                                                       value="{{ old('ending_date') }}" >
                                                @error('ending_date')
                                                    <div class="st_error_message">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="st_level_up form-group active1">
                                        <label for="locations">Target locations *</label>
                                        <select id="locations" name="locations[]" class="form-control" multiple required>
                                            @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->zone->name }}, {{ $location->name }}</option>
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
                                            <textarea name="reviewer_note" class=" form-control @error('reviewer_note') is-invalid @enderror" style="height: 92px;" rows="5" id="reviewer_note" required>{{ old('reviewer_note') }}</textarea>
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
    </script>

@endpush
