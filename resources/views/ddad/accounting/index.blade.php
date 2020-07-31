@extends('ddad.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="st_card st_style1 st_card_fill st_border st_boxshadow st_radius_5">

                <div class="st_card_body">
                    <div class="st_data_table_wrap st_fixed_height1">
                        <div class="st_data_table_btn_group text-info">
                            <h3>Payment History</h3>
                        </div>
                        <table id="st_dataTable" class="display">
                            <thead>
                            <tr>
                                <th>Date<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Payment Title<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Campaign<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Client<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Amount<span class="st_filter_btn"><i class="material-icons">arrow_downward</i></span></th>
                                <th>Due</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ formateDate($payment->created_at) }}</td>
                                    <td>{{ $payment->payment_title ?: '-' }}</td>
                                    @if($payment->paymentable)
                                        <td><a href="{{ route('campaigns.show', $payment->paymentable_id) }}">{{ $payment->paymentable->title }}</a></td>
                                        <td>{{ $payment->paymentable->client->company_name }}</td>
                                    @else
                                        <td>Deleted campaign ID - {{ $payment->paymentable_id }}</td>
                                        <td></td>
                                    @endif
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->dueAmount() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="st_height_25 st_height_lg_25"></div>
@endsection
