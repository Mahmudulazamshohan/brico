@extends('layouts.dashboard')
@section('title', 'Customer Invoice')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body">
                    <!-- Main content -->
                    <section class="content">
                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <h5 style="text-align: center;font-size: 16px;"
                                        class="page-header">
                                        <b>{{ $site_title }}</b><br><br>{{ $general->number }} |
                                        {{ $general->email }}<br>{{ URL::to('/') }}<br>
                                        <small style="margin-top: -15px;font-size: 14px;color: #333;"
                                               class="pull-right">Date: {{ \Carbon\Carbon::now()->format('d-F-Y : h:i A') }}
                                        </small>
                                    </h5>

                                </div>
                                <!-- /.col -->
                            </div>
                            <hr>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-8 invoice-col">
                                    <strong>Customer Name:</strong> {{ $invoice->customer->name }}<br>
                                    <strong>Customer Address:</strong> @if( $invoice->customer->address == null){{ "Not Available" }}@else {{ $invoice->customer->address }}@endif<br>
                                    <strong>Customer E-mail:</strong> @if( $invoice->customer->email == null){{ "Not Available" }}@else {{ $invoice->customer->email }}@endif<br>

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-1 invoice-col">

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-3 invoice-col">
                                    <strong>Invoice No:</strong> #{{ $invoice->id }}<br>

                                    <br><br>
                                    <b>Sell By : </b><span class="label label-danger"><b>{!! $invoice->paid_by !!}</b></span>

                                    </p><br>
                                    <address></address>
                                    <address></address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Brick Name</th>
                                            <th>Brick Rate Par Pic</th>
                                            <th>Quantity</th>
                                            <th>Sub Total</th>
                                            <th>Date & Time</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $invoice->customer->brick->name }}</td>
                                            <td>{{ $invoice->customer->brick->currency->name }} - {{ $invoice->customer->brick->rate }}</td>
                                            <td>{{ $invoice->quantity }} Pic</td>
                                            <td>{{ $invoice->customer->brick->currency->name }} - {{ $invoice->quantity * $invoice->customer->brick->rate }}</td>
                                            <td>{{ date('d-M-y : h:i A', strtotime($invoice->created_date)) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div style="margin-top: 20px;" class="row">
                                <!-- accepted payments column -->
                                <div class="col-xs-6">

                                </div>
                                <!-- /.col -->
                                <div class="col-xs-6">
                                    <p class="lead">Amount</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">Total:</th>
                                                <td>
                                                    {{ $invoice->customer->brick->currency->name }} - {{ $invoice->quantity * $invoice->customer->brick->rate }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <a href="{{ route('customer-show') }}" class="btn btn-success"><i class="fa fa-eye"></i> View Invoice</a>
                                    <button onclick="window.print();" style="margin-right: 5px;"
                                            class="btn btn-primary "><i class="fa fa-print"></i> Print
                                    </button>
                                    <a href="{{ route('customer-create') }}" class="btn btn-danger"><i class="fa fa-shopping-cart"></i> New Sell</a>
                                    <a href="{{ route('customer-account') }}" class="btn btn-warning"><i class="fa fa-address-book" aria-hidden="true"></i> Customer Laser</a>
                                </div>
                            </div>
                        </section>
                    </section>


                </div> {{-- Body Close --}}
            </div> {{-- Border Close--}}
        </div> {{-- col-md-12 --}}
    </div><!-- ROW-->

@endsection

