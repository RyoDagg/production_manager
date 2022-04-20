@extends('layouts.dashboard')

@section('head')
    <title>Purchases Reports</title>
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
        $active_item = '';
    @endphp

    <div class="page-header">
        <div class="page-title">
            <h3>Purchases Reports</h3>
        </div>
    </div>
    <div class="col-md-12 text-right" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-secondary">Today</button>
    <button type="button" class="btn btn-secondary">Last 7 days</button>
    <button type="button" class="btn btn-secondary">This Month</button>
    <button type="button" class="btn btn-secondary">This Year</button>
    </div>

                <table class="table">
                    <tbody>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Date</th>
                        <tr>
                            <td scope="row"></td>
                            <td scope="row"></td>
                            <td scope="row"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
