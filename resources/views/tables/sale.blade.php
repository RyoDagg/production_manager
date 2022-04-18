@extends('layouts.dashboard')

@section('head')
    <title>Sales | Sale#{{ $sale->id }}</title>
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/elements/breadcrumb.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/table/datatable/datatables.js"></script>
@endsection

{{-- Modals --}}
@section('content')
    <?php
    $active_menu = 'accounting';
    $active_item = 'sales';
    // ddd($sales);
    ?>

    <div class="page-header">
        <div class="page-title">
            <h3>Sale#{{ $sale->id }}</h3>
        </div>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                @if (session('status'))
                    <div class="row">
                        <div class="col"></div>
                        <div class="col-md-4 text-center alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-capitalize">{{ session('status') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-10">
                        <nav class="breadcrumb-two" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li
                                    class="breadcrumb-item pending
                            {{ $sale->status == 'pending' ? 'active' : '' }}">
                                    <a class="px-5">Pending</a>
                                </li>

                                <li
                                    class="breadcrumb-item refused
                            {{ $sale->status == 'refused' ? 'active' : '' }}">
                                    <a class="px-5">Refused</a>
                                </li>

                                <li
                                    class="breadcrumb-item accepted
                        {{ $sale->status == 'accepted' ? 'active' : '' }}">
                                    <a class="px-5">Accepted</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    @if ($sale->status == 'pending')
                        <div class="col mx-0 px-0">
                            <form method="POST" action="{{ route('sale.validate', [$sale->id, 'accepted']) }}">
                                @csrf
                                <button type="submit" class="btn btn-rounded btn-success">Accept</button>
                            </form>
                        </div>
                        <div class="col mx-0 px-0">
                            <form method="POST" action="{{ route('sale.validate', [$sale->id, 'refused']) }}">
                                @csrf
                                <button type="submit" class="btn btn-rounded btn-danger">Refuse</button>
                            </form>
                        </div>
                    @endif

                </div>

                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="row">{{ $sale->products->name }}</td>
                            <td scope="row">{{ $sale->clients->name }}</td>
                            <td scope="row">{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                            <td scope="row">{{ $sale->quantity }}</td>
                            <td scope="row">{{ $sale->prix_unit }}</td>
                            <td scope="row">{{ $sale->prix_tot }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
