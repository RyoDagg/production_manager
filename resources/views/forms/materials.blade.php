@extends('layouts.dashboard')

@section('head')
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
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
@endsection

@section('content')
    <?php $active_menu = 'production'; ?>
    <div class="container">

        <div class="page-header">
            <div class="page-title">
            </div>
        </div>
        <div class="row layout-top-spacing">

            <div id="basic" class="col-xl-7 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row-xl-12 row-md-12 row-sm-12 row-12">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h3 class="text-primary" style="margin-top: 20px">Add new Material</h3>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <form>
                                    <div class="mx-auto">
                                        <div class="form-row mb-4">
                                            <div class="form-group mb-4 col-md-6">
                                                {{-- <label>Example textarea</label> --}}
                                                <input type="text" class="form-control" name="name" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <select class="placeholder js-states form-control">
                                                    <option>Unit...</option>
                                                    <option value="one">First</option>
                                                    <option value="two">Second</option>
                                                    <option value="three">Third</option>
                                                    <option value="four">Fourth</option>
                                                    <option value="five">Fifth</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
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
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
