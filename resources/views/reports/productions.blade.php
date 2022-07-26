@extends('layouts.dashboard')

@section('head')
<title>Productions Reports</title>
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
        <h3>Productions Reports</h3>
    </div>
</div>
{{-- <div class="col-md-12 text-right" role="group" aria-label="Basic example"> --}}
<div>
    <ul>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                </div>
            </div>

            <div>
                <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
            </div>
            <div class="table-responsive mb-4 mt-4">
                <table id="records" class="display table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th class="checkbox-column">
                                    {{-- <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                    <input type="checkbox" class="new-control-input todochkbox" id="todoAll">
                                    <span class="new-control-indicator"></span>
                                </label> --}}
                            {{-- </th> --}}
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            {{-- <th class="text-center"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productions as $production)
                        <tr>
                            {{-- <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td> --}}
                            <td>{{ $production->products->name }}</td>
                            <td>{{ $production->quantity }}</td>
                            <td>
                                @switch($production->status)
                                @case('pending')
                                <span class="badge badge-info"> Pending... </span>
                                @break

                                @case('progress')
                                <span class="badge badge-secondary"> In Progress </span>
                                @break

                                @case('canceled')
                                <span class="badge badge-danger"> Canceled </span>
                                @break

                                @case('completed')
                                <span class="badge badge-success"> Completed </span>
                                @break
                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                            <tr>
                                {{-- <th>
                                </th> --}}
                    {{-- <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot> --}}
                </table>
            </div>
        </div>
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

    {{-- <div id="today">
            <div class="table-responsive mb-4 mt-4">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column">
                                    {{-- <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                    <input type="checkbox" class="new-control-input todochkbox" id="todoAll">
                                    <span class="new-control-indicator"></span>
                                </label> --}}
    {{-- </th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead> --}}
    {{-- <tbody>
                            @foreach ($dailyproductions as $productions)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $productions->products->name }}</td>
    <td>{{ $productions->quantity }}</td>
    <td>
        @switch($productions->status)
        @case('pending')
        <span class="badge badge-info"> Pending... </span>
        @break

        @case('progress')
        <span class="badge badge-secondary"> In Progress </span>
        @break

        @case('canceled')
        <span class="badge badge-danger"> Canceled </span>
        @break

        @case('completed')
        <span class="badge badge-success"> Completed </span>
        @break
        @endswitch
    </td>
    </tr>
    @endforeach --}}
    {{-- </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                </th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>  --}}
    <div id="week">

        <div id="month">

        </div>
        <div id="year">

        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<!-- Datepicker -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
</script>
<!-- Momentjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script>
    $(function() {
        $("#start_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
        $("#end_date").datepicker({
            "dateFormat": "yy-mm-dd"
        });
    });
    // Fetch records
    function fetch(start_date, end_date) {
        $.ajax({
            url: "{{ route('productions.records') }}"
            , type: "GET"
            , data: {
                start_date: start_date
                , end_date: end_date
            }
            , dataType: "json"
            , success: function(data) {
                // Datatables
                var i = 1;
                $('#records').DataTable({
                    "data": data.productions,
                    // buttons
                    //"dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                    // "<'row'<'col-sm-12'tr>>" +
                    //"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // "buttons": [
                    // 'copy', 'csv', 'excel', 'pdf', 'print'
                    // ],
                    // responsive
                    // "responsive": true,
                    "columns": [{
                            //"data": "product_id",
                            // "render": function(data, type, row, meta) {
                            //      return `${row.product_id}`;
                            //  }
                        }
                        , {
                            "data": "quantity"
                            , "render": function(data, type, row, meta) {
                                return `${row.quantity}`;
                            }
                        }
                        , {
                            "data": "status"
                            , "render": function(data, type, row, meta) {
                                return `${row.status}`;
                            }
                        }
                    ]
                });
            }
        });
    }
    fetch();
    // Filter
    $(document).on("click", "#filter", function(e) {
        e.preventDefault();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        if (start_date == "" || end_date == "") {
            alert("Both date required");
        } else {
            $('#records').DataTable().destroy();
            fetch(start_date, end_date);
        }
    });
    // Reset
    $(document).on("click", "#reset", function(e) {
        e.preventDefault();
        $("#start_date").val(''); // empty value
        $("#end_date").val('');
        $('#records').DataTable().destroy();
        fetch();
    });

</script>
@endsection
