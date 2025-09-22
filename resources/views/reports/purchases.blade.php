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
$active_item = 'purchases_reports';
@endphp

<div class="page-header">
    <div class="page-title">
        <h3>Purchases Reports</h3>
    </div>
</div>
{{-- <div class="col-md-12 text-right" role="group" aria-label="Basic example"> --}}
<ul>
    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
        <li class="active">
            <a href="#today" id='today'></a>
            <script>
                function triggerbtnClick() {
                    document.getElementById("today").click();
                }

            </script>
            <button type="button" class="btn btn-secondary">Today</button>
        </li>
        <li>
            <a href="#week">
                <button type="button" class="btn btn-secondary">Last 7 days</button>
        </li>
        <li>
            <a href="#month">
                <button type="button" class="btn btn-secondary">This Month</button>
        </li>
        <li>
            <a href="#year">
                <button type="button" class="btn btn-secondary">This Year</button>
        </li>
    </div>
</ul>
    <div id="today">
    <div class="table-responsive mb-4 mt-4">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th>Material</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Supplier</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dailypurchases as $purchases)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $purchases->materials->name }}</td>
                                    <td>{{ $purchases->quantity }}</td>
                                    <td>{{ $purchases->prix_unit }}</td>
                                    <td>{{ $purchases->prix_tot }}</td>
                                    <td>{{ $purchases->fournisseurs->name }}</td>
                                    <td>
                                        @switch($purchases->status)
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
                                <th>Material</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Supplier</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>


                </div>
    </div>
    <div id="week">
    </div>
    <div id="month">
    </div>
    <div id="year">
    </div>
</div>
@endsection
