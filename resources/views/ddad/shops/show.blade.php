@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Shop: {{ $shop->name }}</h2>
                    </div>

                    <div class="st_card_head_right">
                            <button data-toggle="modal" data-target="#make-payments-create-modal" class="btn btn-info btn-sm">
                                <span class="material-icons">attach_money</span>Make payment
                            </button>

                            <a href="{{ route('shops.edit', $shop) }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">create</i>Edit
                        </a>
                    </div>
                </div>
                <div class="st_card_body">
                        <div class="st_card_padd_25">
                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="st_height_25 st_height_lg_25"></div>



                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                                 style="min-height: auto">
                                                <div class="st_iconbox_title" title="Actual price">Running AD</div>
                                                <div class="st_iconbox_number"
                                                     id="total_price">{{ (int) $shop->countRunningAd() }}</div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div
                                                class="st_iconbox st_style1 st_border st_boxshadow st_radius_5 bg-warning text-white"
                                                style="min-height: auto">
                                                <div class="st_iconbox_title text-white">Monthly bill</div>
                                                <div class="st_iconbox_number">{{ $shop->monthlyBill() }}</div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <a href="#" data-target="#received-payments-list" data-toggle="modal">
                                                <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                                     style="min-height: auto">
                                                    <div class="st_iconbox_title">{{ 'Paid' }}</div>
                                                    <div class="st_iconbox_number">{{ $shop->totalPaidAmount() }}</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>


                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label for="name">Shop Name *</label>
                                                <input type="text" name="name" class="form-control" value="{{  $shop->name}}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_name">Owner's Name *</label>
                                                <input type="text" name="owner_name" class="form-control" value="{{  $shop->owner_name }}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_name">KCP Name *</label>
                                                <input type="text" name="kcp_name" class="form-control" value="{{  $shop->kcp_name }}"  >
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="st_level_up form-group">
                                                <label>Payment Per Ad *</label>
                                                <input type="text" name="payment_per_ad" class="form-control" value="{{  $shop->payment_per_ad }}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="owner_nid">Owner's NID *</label>
                                                <input type="text" name="owner_nid" class="form-control" value="{{  $shop->owner_nid }}"  >
                                            </div>
                                            <div class="st_level_up form-group">
                                                <label for="kcp_mobile_number">KCP Mobile *</label>
                                                <input type="text" name="kcp_mobile" class="form-control" value="{{  $shop->kcp_mobile_number }}"  >
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="st_level_up form-group">
                                            <label for="address">Shop Address</label>
                                            <textarea type="text" name="shop_address" class="form-control">{{  $shop->address }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="form-label" for="isp_id">ISP</label>
                                            <input type="text" name="isp_name" class="form-control" value="{{  $shop->isp->name ?? '-' }}"  >
                                        </div>

                                        <div class="col-lg-6">
                                            <label class="form-label" for="location_id">Location</label>
                                            <input type="text" name="location" class="form-control" value="{{  $shop->location->name ?? '-' }}"  >
                                        </div>

                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Document(NID front page)</label>
                                                <a href="{{ $shop->nid_src }}" target="_blank">
                                                    <img src="{{  $shop->nid_src }}" style="max-width: 100%">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Document(Trade Licence)</label>
                                                <a href="{{ $shop->licence_src }}" target="_blank">
                                                    <img src="{{  $shop->licence_src }}" style="max-width: 100%">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="st_height_25 st_height_lg_25"></div>
                                </div>

                                <div class="col-sm-1 st_npcsf"></div>
                                @php($device = $shop->device ?: new \App\Models\Ddad\Device())

                                <div class="col-lg-3">
                                    <div class="st_height_20 st_height_lg_20"></div>

                                    <div class="st_level_up form-group">
                                        <label for="name">Android label*</label>
                                        <input type="text" name="android_label" class="form-control" value="{{  $device->android_label ?? '-' }}"  >
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="android_imei">Android IMEI*</label>
                                        <input type="text" name="android_imei" class="form-control" value="{{  $device->android_imei ?? '-' }}"  >
                                    </div>

                                    <div class="st_level_up form-group">
                                        <label for="name">Detector label*</label>
                                        <input type="text" name="detector_label" class="form-control" value="{{  $device->detector_label ?? '-' }}"  >
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">Detector serial*</label>
                                        <input type="text" name="detector_serial" class="form-control" value="{{  $device->detector_serial ?? '-' }}"  >
                                    </div>


                                    <div class="st_level_up form-group">
                                        <label for="name">TV label*</label>
                                        <input type="text" name="tv_label" class="form-control" value="{{  $device->tv_label ?? '-' }}"  >
                                    </div>
                                    <div class="st_level_up form-group">
                                        <label for="owner_name">TV serial*</label>
                                        <input type="text" name="tv_serial" class="form-control" value="{{  $device->tv_serial ?? '-' }}"  >
                                    </div>

                                </div>
                            </div>

                            <hr>
                            <div class="st_height_25 st_height_lg_25"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="st_height_25 st_height_lg_25"></div>


        <!--  create model -->
        <form id="make-payments-modal-form show" action="{{ route('shops.make-payment', $shop) }}" method="post" autocomplete="off">
            @csrf
            <div class="modal fade" id="make-payments-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-createLabel">Make payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="st_level_up form-group">
                                <label for="payment_title">Payment title*</label>
                                <input type="text" name="payment_title" class="form-control @error('payment_title') is-invalid @enderror"
                                       id="payment_title" value="{{ old('payment_title') }}">
                                @error('payment_title')
                                <div class="st_error_message">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="st_level_up form-group">
                                        <label for="amount">Received Amount*</label>
                                        <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror"
                                               id="amount" value="{{ old('amount') }}">
                                        @error('amount')
                                        <div class="st_error_message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="st_level_up form-group">
                                        <label for="amount_confirmation">Confirm Amount*</label>
                                        <input type="text" name="amount_confirmation" class="form-control @error('amount_confirmation') is-invalid @enderror"
                                               id="amount_confirmation" value="{{ old('amount_confirmation') }}">
                                        @error('amount_confirmation')
                                        <div class="st_error_message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info alert-important">Double check! You cannot undone this action.</div>
                            <button type="submit" class="btn btn-primary">Save payment</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>


        <div class="modal fade" id="received-payments-list" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-createLabel">Payment history</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Date</th>
                                <th>Payment title</th>
                                <th>Added by</th>
                                <th>Amount</th>
                            </tr>
                            @forelse($shop->payments as $payment)
                                <tr>
                                    <td>{{ formateDate($payment->created_at) }}</td>
                                    <td>{{ $payment->payment_title }}</td>
                                    <td>{{ $payment->user->fullName }}</td>
                                    <td>{{ formatCurrency(abs($payment->amount)) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No payment made yet...</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @endsection

        @push('script')
            <script type="text/javascript">
                var  error = false;
                @error('payment_title') error = true; @enderror
                    @error('amount')  error = true; @enderror
                if(error) {
                    $('#make-payments-create-modal').modal('show')
                }
            </script>
    @endpush
