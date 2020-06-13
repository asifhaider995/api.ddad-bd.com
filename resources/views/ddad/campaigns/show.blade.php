@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="st_card st_style1 st_border st_boxshadow st_radius_5">
                <div class="st_card_head">
                    <div class="st_card_head_left">
                        <h2 class="st_card_title">Campaign: {{ $campaign->title }}
                            @include('ddad.campaigns._status', ['status' => $campaign->status])
                        </h2>
                    </div>

                    <div class="st_card_head_right">
                        @if(Auth::user()->isAdmin())
                            <button data-toggle="modal" data-target="#received-payments-create-modal" class="btn btn-info btn-sm"><span
                                    class="material-icons">attach_money</span>Received payment
                            </button>

                            @if($campaign->status == 'awaiting_for_approval')
                                <a href="{{ route('campaigns.change-status', [$campaign, 'approved']) }}"
                                   class="btn btn-success btn-sm">
                                    <i class="material-icons">done_outline</i>Approve
                                </a>

                                <a href="{{ route('campaigns.change-status', [$campaign, 'rejected']) }}"
                                   class="btn btn-danger btn-sm">
                                    <i class="material-icons">cancel</i>Reject
                                </a>
                            @elseif($campaign->status == 'approved')
                                <a href="{{ route('campaigns.change-status', [$campaign, 'stopped']) }}"
                                   class="btn btn-danger btn-sm">
                                    <i class="material-icons">cancel</i>Stop
                                </a>
                            @elseif($campaign->status == 'stopped')
                                <a href="{{ route('campaigns.change-status',  [$campaign, 'approved']) }}"
                                   class="btn btn-success btn-sm">
                                    <i class="material-icons">cancel</i>Start again
                                </a>
                            @elseif($campaign->status == 'expired')
                                <a href="{{ route('campaigns.change-status', $campaign) }}"
                                   class="btn btn-success btn-sm">
                                    <i class="material-icons">cancel</i>Renew
                                </a>
                            @endif




                        @endif
                        <a href="{{ route('campaigns.edit', $campaign) }}" class="btn btn-primary btn-sm">
                            <i class="material-icons">create</i>Edit
                        </a>
                    </div>
                </div>
                <div class="st_card_body">

                    <div class="st_card_padd_25">


                        <div class="row">


                            <div class="col-lg-7">


                                <div class="st_height_15 st_height_lg_15"></div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                             style="min-height: auto">
                                            <div class="st_iconbox_title" title="Estimated price">E.PRICE(TK)</div>
                                            <div class="st_iconbox_number"
                                                 id="total_price">{{ (int) $campaign->calculatePrice() }}</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                             style="min-height: auto">
                                            <div class="st_iconbox_title">TV Count</div>
                                            <div class="st_iconbox_number"
                                                 id="tv_count">{{ $campaign->countTV() }}</div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                             style="min-height: auto">
                                            <div class="st_iconbox_title">Views</div>
                                            <div class="st_iconbox_number"
                                                 id="total_price">{{ $campaign->totalViews }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="st_height_15 st_height_lg_15"></div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                             style="min-height: auto">
                                            <div class="st_iconbox_title" title="Actual price">A.PRICE(TK)</div>
                                            <div class="st_iconbox_number"
                                                 id="total_price">{{ (int) $campaign->actual_price }}</div>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <a href="#" data-target="#received-payments-list" data-toggle="modal">
                                            <div class="st_iconbox st_style1 st_border st_boxshadow st_radius_5"
                                                 style="min-height: auto">
                                                <div class="st_iconbox_title">{{  Auth::user()->isAdmin() ? 'Received' : 'Paid' }}</div>
                                                <div class="st_iconbox_number">{{ $campaign->paidAmount() }}</div>
                                            </div>
                                        </a>
                                    </div>


                                    <div class="col-lg-4">
                                        <div
                                            class="st_iconbox st_style1 st_border st_boxshadow st_radius_5 bg-warning text-white"
                                            style="min-height: auto">
                                            <div class="st_iconbox_title text-white">Due</div>
                                            <div class="st_iconbox_number">{{ $campaign->dueAmount() }}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="st_height_15 st_height_lg_15"></div>

                                <div class="preview">
                                    <div class="title">Video - Queue {{ $campaign->primary_queue }}</div>
                                    <div class="body">
                                        <video style="width: 100%; height: auto;" controls>
                                            <source src="{{ $campaign->primary_src }}" type="video/mp4">
                                            <source src="{{ $campaign->primary_src }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                                <div class="st_height_25 st_height_lg_25"></div>


                                <div class="preview">
                                    <div class="title">Image - Queue {{ $campaign->primary_queue }}</div>
                                    <div class="body">
                                        @if($campaign->secondary_src)
                                            <video style="width: 100%; height: auto;" controls>
                                                <source src="{{ $campaign->secondary_src }}" type="video/mp4">
                                                <source src="{{ $campaign->secondary_src }}" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <h1>Unavailable</h1>
                                        @endif
                                    </div>
                                </div>
                                <div class="st_height_25 st_height_lg_25"></div>

                            </div>
                            <div class="col-sm-1 st_npcsf"></div>
                            <div class="col-lg-4">

                                <div class="st_height_25 st_height_lg_25"></div>

                                <div class="st_level_up form-group">
                                    <label for="title">Campaign title </label>
                                    <input class="form-control" value="{{ $campaign->title }}">
                                </div>

                                @if(Auth::user()->isAdmin())
                                    <div class="st_level_up form-group">
                                        <label for="title">Client</label>
                                        <input class="form-control"
                                               value="{{ $campaign->client->full_name }}@if($campaign->client->company_name)-{{ $campaign->client->company_name }} @endif">
                                    </div>
                                @endif


                                <div class="st_level_up form-group">
                                    <label for="title">Placement</label>
                                    <input class="form-control"
                                           value="{{ $campaign->placement->name }} {{ $campaign->placement->duration }}sec">
                                </div>

                                <div class="st_level_up form-group">
                                    <label for="title">Package</label>
                                    <input class="form-control"
                                           value="{{ $campaign->package->name }} {{ $campaign->package->duration }}sec, {{ $campaign->package->rate }} taka/Day/TV">
                                </div>


                                <div class="st_level_up form-group active1">
                                    <label for="starting_date">Duration</label>
                                    <input class="form-control"
                                           value="{{ $campaign->duration_month  }} month{{ $campaign->duration_month == 1 ? '' : 's' }}">
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="st_level_up form-group active1">
                                            <label for="starting_date">Starting date*</label>
                                            <input class="form-control"
                                                   value="{{ formateDate($campaign->starting_date) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="st_level_up form-group active1">
                                            <label for="starting_date">Ending date*</label>
                                            <input class="form-control"
                                                   value="{{ formateDate($campaign->ending_date) }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="st_level_up form-group active1">
                                    <label for="locations">Target locations</label>
                                    <textarea class=" form-control" style="height: 92px;"
                                              rows="5">{{ $campaign->locations->pluck('name')->join(',') }}</textarea>

                                </div>


                                @if(Auth::user()->isAdmin())
                                    <div>
                                        <div class="st_level_up form-group">
                                            <label for="address">Reviewer note</label>
                                            <textarea class=" form-control" style="height: 92px;"
                                                      rows="5">{{ $campaign->reviewer_note }}</textarea>
                                        </div>
                                    </div>
                                @endif


                                <div class="st_height_15 st_height_lg_15"></div>

                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="auto_renew"
                                               name="auto_renew"
                                               @if(old('auto_renew', $campaign->auto_renew)) checked @endif)>
                                        <label class="custom-control-label" for="customCheck1">Auto renew this
                                            campaign</label>
                                    </div>
                                </div>
                                <div class="st_height_20 st_height_lg_20"></div>

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
    <form id="received-payments-modal-form show" action="{{ route('campaigns.received-payment', $campaign) }}" method="post" autocomplete="off">
        @csrf
        <div class="modal fade" id="received-payments-create-modal" tabindex="-1" role="dialog" aria-labelledby="modal-createLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-createLabel">Receive payment</h5>
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
                        @forelse($campaign->payments as $payment)
                            <tr>
                                <td>{{ formateDate($payment->created_at) }}</td>
                                <td>{{ $payment->payment_title }}</td>
                                <td>{{ $payment->user->fullName }}</td>
                                <td>{{ formatCurrency($payment->amount) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No payment made yet...</td>
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
            $('#received-payments-create-modal').modal('show')
        }
    </script>
@endpush
