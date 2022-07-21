@extends('layouts.dashboard')

@section('head')
<title>Sales Reports</title>
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
@php
$active_menu = 'reports';
$active_item = 'sales_reports';
@endphp

<div class="page-header">
    <div class="page-title">
        <h3>Sales Reports</h3>
    </div>
</div>
{{-- <div class="col-md-12 text-right" role="group" aria-label="Basic example"> --}}
<div>
<ul>
    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <li class="active">
            <a href="#today" id='today'>
            <button type="button" class="btn btn-secondary">Today</button>
            </a>
            <script>
                function triggerbtnClick() {
                    document.getElementById("today").click();
                }

            </script>
        </li>
        <li>
            <a href="#week">
                <button type="button" class="btn btn-secondary">Last 7 days</button>
            </a>
        </li>
        <li>
            <a href="#month">
                <button type="button" class="btn btn-secondary">This Month</button>
            </a>
        </li>
        <li>
            <a href="#year">
                <button type="button" class="btn btn-secondary">This Year</button>
            </a>
        </li>
    </div>
</ul>
<br><br><br>
    <div id="today">
        <div class="table-responsive mb-4 mt-4">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailysales as $sales)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $sales->products->name }}</td>
                                    <td>{{ $sales->clients->name }}</td>
                                    <td>{{ $sales->quantity }}</td>
                                    <td>{{ $sales->prix_unit }}</td>
                                    <td>{{ $sales->prix_tot }}</td>
                                    <td>
                                        @switch($sales->status)
                                            @case('pending')
                                                <span class="badge badge-info"> Pending... </span>
                                            @break

                                            @case('accepted')
                                                <span class="badge badge-success"> Accepted </span>
                                            @break

                                            @case('refused')
                                                <span class="badge badge-danger"> Refused </span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    </div>
    <div id="week">
        {{-- <div class="table-responsive mb-4 mt-4" style="width:100%;">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($weeklysales as $sales)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $sales->products->name }}</td>
                                    <td>{{ $sales->clients->name }}</td>
                                    <td>{{ $sales->quantity }}</td>
                                    <td>{{ $sales->prix_unit }}</td>
                                    <td>{{ $sales->prix_tot }}</td>
                                    <td>
                                        @switch($sales->status)
                                            @case('pending')
                                                <span class="badge badge-info"> Pending... </span>
                                            @break

                                            @case('accepted')
                                                <span class="badge badge-success"> Accepted </span>
                                            @break

                                            @case('refused')
                                                <span class="badge badge-danger"> Refused </span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    </div> --}}
    <div id="month">
        {{-- <div class="table-responsive mb-4 mt-4" style="width:100%;">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monthlysales as $sales)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $sales->products->name }}</td>
                                    <td>{{ $sales->clients->name }}</td>
                                    <td>{{ $sales->quantity }}</td>
                                    <td>{{ $sales->prix_unit }}</td>
                                    <td>{{ $sales->prix_tot }}</td>
                                    <td>
                                        @switch($sales->status)
                                            @case('pending')
                                                <span class="badge badge-info"> Pending... </span>
                                            @break

                                            @case('accepted')
                                                <span class="badge badge-success"> Accepted </span>
                                            @break

                                            @case('refused')
                                                <span class="badge badge-danger"> Refused </span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    </div> --}}
    </div>
    <div id="year">
        {{-- <div class="table-responsive mb-4 mt-4" style="width:100%;">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($annualsales as $sales)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $sales->products->name }}</td>
                                    <td>{{ $sales->clients->name }}</td>
                                    <td>{{ $sales->quantity }}</td>
                                    <td>{{ $sales->prix_unit }}</td>
                                    <td>{{ $sales->prix_tot }}</td>
                                    <td>
                                        @switch($sales->status)
                                            @case('pending')
                                                <span class="badge badge-info"> Pending... </span>
                                            @break

                                            @case('accepted')
                                                <span class="badge badge-success"> Accepted </span>
                                            @break

                                            @case('refused')
                                                <span class="badge badge-danger"> Refused </span>
                                            @break
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
    </div> --}}
    </div>
</div>
</div>
@endsection
