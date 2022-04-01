@extends('layouts.dashboard')

@section('content')
    <?php $active_menu = 'production'; ?>
    
    <div class="page-header">
        <div class="page-title">
            <h3>Products</h3>
        </div>
        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="#add_new" class="btn btn-lg btn-secondary mb-2 mr-2 btn-rounded">
                        <strong>Add Product</strong>
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
                    <a href="#add_new" class="btn btn-lg btn-secondary mb-2 mr-2 btn-rounded">
                        <strong>Add Product</strong>
                        <img src="icons/add.png" style="margin-left: 6px" width="25" height="25" alt="">
                    </a>
                </div>

                <div class="table-responsive mb-4 mt-4">
                    <table id="range-search" class="display table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Stock</th>

                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
