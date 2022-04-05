@extends('layouts.dashboard')

@section('head')
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="assets/js/scrollspyNav.js"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
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
    <script>
        index = 1
        function fields(index) {
            let code = '<div class="form-row mb-4" id="row'+index+'">\
                            <div class="form-group mb-4 col-md-7">\
                                <select class="placeholder js-states form-control" name="material'+index+'">\
                                    <option>Material</option>\
                                    <option value="one">First</option>\
                                    <option value="two">Second</option>\
                                    <option value="three">Third</option>\
                                    <option value="four">Fourth</option>\
                                    <option value="five">Fifth</option>\
                                </select>\
                            </div>\
                            <div class="form-group col-md-3">\
                                <input type="number"  name="quanity'+index+'" class="form-control" placeholder="Quantity" id="inputZip">\
                            </div>\
                            <div class="form-group col-md-2">\
                                <button type="button" id="cancel'+index+'"\
                                    style="background: 0%;border: none;" onclick="deleteRow(\'row'+index+'\')">\
                                    <img id="add_field" src="icons/cancel.png" width="40" height="40" alt="">\
                                </button>\
                            </div>\
                        </div>'

            return code
        }

        function deleteRow(id) {
            console.log(id);
            let row = document.getElementById(id);
            row.remove();
        }
        
                    
        var btn = document.getElementById('add_field');
        var rows = document.getElementById('rows');

        btn.onclick = function() {
            rows.innerHTML += fields(index);
            index++;
        }
    </script>
@endsection

@section('content')
    <?php
    $active_menu = 'production';
    $active_item = 'products';
    ?>

    <div class="page-header">
        <div class="page-title">
            <h3>Products</h3>
        </div>
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="#add_new" class="btn btn-lg btn-secondary mb-2 mr-2 btn-rounded">
                        <strong>Add Material</strong>
                        <img src="icons/add.png" style="margin-left: 5px;" width="25" height="25" alt="">
                    </a>
                </div>
            </div>
        </div> --}}
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="col-md-12 text-right">
                    <button data-toggle="modal" data-target="#productModal" type="button"
                        href="{{ route('materials_form') }}" class="btn btn-lg btn-secondary mb-2 mr-2 btn-rounded">
                        <strong>Add Product</strong>
                        <img src="icons/add.png" style="margin-left: 6px" width="25" height="25" alt="">
                    </button>
                </div>

                <div class="modal animated fade custo-fade register-modal" id="productModal" tabindex="-1" role="dialog"
                    aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header" id="productModalLabel">
                                <h4 class="modal-title text-primary">Add New Product</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mx-auto">
                                        <div class="form-row mb-4">
                                            <div class="form-group mb-4 col-md-7">
                                                {{-- <label>Example textarea</label> --}}
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-1">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="number" class="form-control" placeholder="Quantity"
                                                    id="inputZip">
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <textarea class="form-control" name="description" placeholder="Description..." rows="3"></textarea>
                                        </div>
                                        <div class="form-row  mb-4">
                                            <div class="form-group mb-4">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Upload Image <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear"
                                                            title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file"
                                                            class="custom-file-container__custom-file__custom-file-input"
                                                            accept="image/*">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <div class="custom-file-container__image-preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button data-toggle="modal" data-target="#prodmatModal" type="button"
                                                class="btn btn-primary mb-2 mr-2 btn-rounded">
                                                <strong>Next</strong>
                                                <img src="icons/next.png" width="20" height="20" alt="">
                                            </button>
                                            @include('items.prodpop')
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mb-4 mt-4">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todoAll">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>Materials</th>
                                <th>Cost</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Tiger Nixon</td>
                                <td>61</td>
                                <td>System Architect</td>
                                <td>$320,800</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Garrett Winters</td>
                                <td>63</td>
                                <td>Accountant</td>
                                <td>$170,750</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Ashton Cox</td>
                                <td>66</td>
                                <td>Junior Technical Author</td>
                                <td>$86,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Cedric Kelly</td>
                                <td>22</td>
                                <td>Senior Javascript Developer</td>
                                <td>$433,060</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Airi Satou</td>
                                <td>33</td>
                                <td>Accountant</td>
                                <td>$162,700</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Brielle Williamson</td>
                                <td>61</td>
                                <td>Integration Specialist</td>
                                <td>$372,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Herrod Chandler</td>
                                <td>59</td>
                                <td>Sales Assistant</td>
                                <td>$137,500</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Rhona Davidson</td>
                                <td>55</td>
                                <td>Integration Specialist</td>
                                <td>$327,900</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Colleen Hurst</td>
                                <td>39</td>
                                <td>Javascript Developer</td>
                                <td>$205,500</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Sonya Frost</td>
                                <td>23</td>
                                <td>Software Engineer</td>
                                <td>$103,600</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Jena Gaines</td>
                                <td>30</td>
                                <td>Office Manager</td>
                                <td>$90,560</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Quinn Flynn</td>
                                <td>22</td>
                                <td>Support Lead</td>
                                <td>$342,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Charde Marshall</td>
                                <td>36</td>
                                <td>Regional Director</td>
                                <td>$470,600</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Haley Kennedy</td>
                                <td>43</td>
                                <td>Senior Marketing Designer</td>
                                <td>$313,500</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Tatyana Fitzpatrick</td>
                                <td>19</td>
                                <td>Regional Director</td>
                                <td>$385,750</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Michael Silva</td>
                                <td>66</td>
                                <td>Marketing Designer</td>
                                <td>$198,500</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Paul Byrd</td>
                                <td>64</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td>$725,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Gloria Little</td>
                                <td>59</td>
                                <td>Systems Administrator</td>
                                <td>$237,500</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Bradley Greer</td>
                                <td>41</td>
                                <td>Software Engineer</td>
                                <td>$132,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Dai Rios</td>
                                <td>35</td>
                                <td>Personnel Lead</td>
                                <td>$217,500</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Jenette Caldwell</td>
                                <td>30</td>
                                <td>Development Lead</td>
                                <td>$345,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Yuri Berry</td>
                                <td>40</td>
                                <td>Chief Marketing Officer (CMO)</td>
                                <td>$675,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Caesar Vance</td>
                                <td>21</td>
                                <td>Pre-Sales Support</td>
                                <td>$106,450</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Doris Wilder</td>
                                <td>23</td>
                                <td>Sales Assistant</td>
                                <td>$85,600</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Angelica Ramos</td>
                                <td>47</td>
                                <td>Chief Executive Officer (CEO)</td>
                                <td>$1,200,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Gavin Joyce</td>
                                <td>42</td>
                                <td>Developer</td>
                                <td>$92,575</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Jennifer Chang</td>
                                <td>28</td>
                                <td>Regional Director</td>
                                <td>$357,650</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Brenden Wagner</td>
                                <td>28</td>
                                <td>Software Engineer</td>
                                <td>$206,850</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                            <tr>
                                <td class="checkbox-column">
                                    <label class="new-control new-checkbox checkbox-primary"
                                        style="height: 18px; margin: 0 auto;">
                                        <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                        <span class="new-control-indicator"></span>
                                    </label>
                                </td>
                                <td>Fiona Green</td>
                                <td>48</td>
                                <td>Chief Operating Officer (COO)</td>
                                <td>$850,000</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Shop"><img src="icons/cart.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="View"><img src="icons/view.png" width="25" height="25" alt=""></a>
                                        </li>
                                        <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top"
                                                title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a></li>
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
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="checkbox-column"></th>
                                <th>Name</th>
                                <th>Stock</th>
                                <th>description</th>
                                <th>Last Purchases Price</th>
                                <th class="text-center"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
