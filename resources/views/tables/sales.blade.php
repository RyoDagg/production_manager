@extends('layouts.dashboard')

@section('head')
    <title>Sales</title>
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    </script>
    <script src="plugins/table/datatable/datatables.js"></script>
    <script>
        /* Custom filtering function which will search data in column four between two values */
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = parseInt($('#min').val(), 10);
                var max = parseInt($('#max').val(), 10);
                var age = parseFloat(data[3]) || 0; // use data for the age column

                if ((isNaN(min) && isNaN(max)) ||
                    (isNaN(min) && age <= max) ||
                    (min <= age && isNaN(max)) ||
                    (min <= age && age <= max)) {
                    return true;
                }
                return false;
            }
        );
        $(document).ready(function() {
            var table = $('#range-search').DataTable({
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });
            // Event listener to the two range filtering inputs to redraw on input
            $('#min, #max').keyup(function() {
                table.draw();
            });
        });
    </script>
@endsection


@section('content')
    <?php
    $active_menu = 'accounting';
    $active_item = 'sales';
    // ddd($sales);
    ?>

    {{-- Modals --}}
    <form action="{{ route('sales.new') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('modals.add_sale')
    </form>

    <div class="page-header">
        <div class="page-title">
            <h3>Sales</h3>
        </div>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right">
                    <button data-toggle="modal" data-target="#saleModal" type="button"
                        class="btn btn-lg btn-secondary mb-2 mr-2 btn-rounded">
                        <strong>New Sale</strong>
                        <img src="icons/add.png" style="margin-left: 6px" width="25" height="25" alt="">
                    </button>
                </div>

                <div class="table-responsive mb-4 mt-4">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td class="checkbox-column">
                                        <label class="new-control new-checkbox checkbox-primary"
                                            style="height: 18px; margin: 0 auto;">
                                            <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                            <span class="new-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td>{{ $sale->products->name }}</td>
                                    <td>{{ $sale->clients->name }}</td>
                                    <td>{{ date('d-m-y', strtotime($sale->created_at)) }}</td>
                                    <td>{{ $sale->quantity }}</td>
                                    <td>{{ $sale->prix_unit }}</td>
                                    <td>{{ $sale->prix_tot }}</td>
                                    <td>
                                        @switch($sale->status)
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
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li><a href="{{ route('sales.view', $sale->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="View"><img src="icons/view.png" width="25"
                                                        height="25" alt=""></a>
                                            </li>
                                            <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                    title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2 text-danger">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Date</th>
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
        </div>
    </div>
@endsection
