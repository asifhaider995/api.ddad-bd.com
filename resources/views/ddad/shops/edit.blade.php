@extends('ddad.layout')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Edit Product</h2>
                    </div>
                </div>
                <div class="st_card_body">
                    <form action="{{ route('shops.update', $shop) }}" id="edit-form" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="st_height_25 st_height_lg_25"></div>
                        <div class="st_card_padd_25">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label for="name">Shop Name *</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $shop->name) }}" required >
                                                <div class="st_error_message"></div>
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_name">Owner's Name *</label>
                                                <input type="text" name="owner_name" class="form-control @error('owner_name') is-invalid @enderror" id="owner_name" value="{{ old('owner_name', $shop->owner_name) }}" required >
                                                <div class="st_error_message"></div>
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_name">KCP Name *</label>
                                                <input type="text" name="kcp_name" class="form-control @error('kcp_name') is-invalid @enderror" id="kcp_name" value="{{ old('kcp_name', $shop->kcp_name) }}" required >
                                                <div class="st_error_message"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label>Payment Per Ad *</label>
                                                <input name="payment_per_ad" type="number" min="0" value="{{ old('payment_per_ad', $shop->payment_per_ad) }}" class="form-control">
                                                <div class="st_error_message"></div>
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_nid">Owner's NID *</label>
                                                <input type="text" name="owner_nid" class="form-control @error('owner_nid') is-invalid @enderror" id="owner_nid" value="{{ old('owner_nid', $shop->owner_nid) }}" required >
                                                <div class="st_error_message"></div>
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_mobile_number">KCP Mobile *</label>
                                                <input type="text" name="kcp_mobile_number" class="form-control @error('kcp_mobile_number') is-invalid @enderror" id="kcp_mobile_number" value="{{ old('kcp_mobile_number', $shop->kcp_mobile_number) }}" required >
                                                <div class="st_error_message"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="st_level_up form-group">
                                            <label for="address">Shop Address</label>
                                            <textarea name="address" class=" form-control @error('address') is-invalid @enderror" style="height: 92px;" rows="5" id="address" required>{{ old('address', $shop->address) }}</textarea>
                                            <div class="st_error_message"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="form-label" for="isp_id">ISP</label>
                                            <select class="st_selectpicker2 mb-3" name="isp_id" id="isp_id" data-size="7" required>
                                                @foreach($isps as $isp)
                                                    <option value="{{ $isp->id }}" @if(old('isp_id') == $isp->id) selected @endif>{{ $isp->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="st_error_message"></div>
                                        </div>

                                        <div class="col-lg-2">
                                            <label class="form-label" for="shop_type">Zone</label>
                                            <select class="st_selectpicker1" name="zone_id" id="zone_id" data-size="7" required>
                                                @foreach($zones as $zone)
                                                    <option value="{{ $zone->id }}" @if(old('zone_id') == $zone->id) selected @endif>{{ $zone->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="st_error_message"></div>
                                        </div>


                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Document</label>
                                                <div class="form-control-wrap">
                                                    <div class="custom-file">
                                                        <input type="file" multiple="" name="document" class="custom-file-input  @error('name') is-invalid @enderror" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                        <div class="st_error_message"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-1 st_npcsf"></div>

                                <div class="col-lg-3">
                                    <div class="col">
                                        <label class="form-label" for="tv_id">TV</label>
                                        <select class="st_selectpicker1 mb-3" name="tv_id" id="tv_id" data-size="7" required>
                                            @foreach($tvs as $tv)
                                                <option value="{{ $tv->id }}" @if(old('tv_id') == $tv->id) selected @endif>{{ $tv->serial_number }}</option>
                                            @endforeach
                                        </select>
                                        <div class="st_error_message"></div>
                                    </div>

                                    <div class="col">
                                        <label class="form-label" for="detector_id">Detector</label>
                                        <select class="st_selectpicker2 mb-3" name="detector_id" id="detector_id" data-size="7" required>
                                            @foreach($detectors as $detector)
                                                <option value="{{ $detector->id }}" @if(old('detector_id') == $detector->id) selected @endif>{{ $detector->unique_id }}</option>
                                            @endforeach
                                        </select>
                                        <div class="st_error_message"></div>
                                    </div>

                                    <div class="col">
                                        <label class="form-label" for="android_box_id">Android Box</label>
                                        <select class="st_selectpicker1 mb-3" name="android_box_id" id="android_box_id" data-size="7" required>
                                            @foreach($android_boxs as $android_box)
                                                <option value="{{ $android_box->id }}" @if(old('android_box_id') == $android_box->id) selected @endif>{{ $android_box->label }}</option>
                                            @endforeach
                                        </select>
                                        <div class="st_error_message"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="st_height_15 st_height_lg_15"></div>
                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>

                            <div class="st_form_btns st_style1 text-right">
                                <a href="{{ route('shops.index') }}" class="btn btn-outline-light">Cancel</a>
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

@push('script')
    <script>
        $(function () {
            const purchase = $('#purchase_price');
            const retail = $('#retail_price');
            const retailDiscount = $('#retail_discount_percentage');
            let discountAmount = 0;
            let discountPercent = 0;
            function setRetailDiscount() {
                discountAmount = retail.val() - purchase.val();
                discountPercent = ((discountAmount * 100)/retail.val()).toFixed(2);
                retailDiscount.val(discountPercent);
            }
            purchase.on('change keyup', function () {
                setRetailDiscount();
            })

            retail.on('change keyup', function () {
                setRetailDiscount();
            })
        })
    </script>
@endpush
