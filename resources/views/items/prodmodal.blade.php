<div class="modal-content">

    <div class="modal-header" id="productModalLabel">
        <h4 class="modal-title text-primary">Add New Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg></button>
    </div>
    <div class="modal-body">
        <div class="widget-content widget-content-area animated-underline-content">
            <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-info-tab" data-toggle="tab" href="#product-info" role="tab"
                        aria-controls="product-info" aria-selected="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>Basic Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="produc-materials-tab" data-toggle="tab" href="#produc-materials"
                        role="tab" aria-controls="produc-materials" aria-selected="false"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> Materials</a>
                </li>
            </ul>

            <div class="tab-content" id="animateLineContent-4">
                <div class="tab-pane fade show active" id="product-info" role="tabpanel"
                    aria-labelledby="product-info-tab">
                    <div class="mx-auto">
                        <div class="form-row mb-4">
                            <div class="form-group mb-4 col-md-7">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-1">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control" placeholder="Quantity" id="inputZip">
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <textarea class="form-control" name="description" placeholder="Description..." rows="3"></textarea>
                        </div>
                        <div class="form-row  mb-4">
                            <div class="form-group mb-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload Image <a href="javascript:void(0)"
                                            class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                            accept="image/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            {{-- <a data-toggle="modal" data-target="#prodmatModal" type="button"
                                href="{{ route('materials_form') }}" class="btn btn-primary mb-2 mr-2 btn-rounded">
                                <strong>Next</strong>
                                <img src="icons/next.png" width="20" height="20" alt="">
                            </a> --}}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="produc-materials" role="tabpanel"
                    aria-labelledby="produc-materials-tab">
                    <div class="mx-auto">
                        <div id="rows">
                            <div class="form-row mb-4" id="row0">
                                <div class="form-group mb-4 col-md-7">
                                    <select class="placeholder js-states form-control" name="material0">
                                        <option>Material</option>
                                        <option value="one">First</option>
                                        <option value="two">Second</option>
                                        <option value="three">Third</option>
                                        <option value="four">Fourth</option>
                                        <option value="five">Fifth</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="number" name="quanity0" class="form-control" placeholder="Quantity"
                                        id="inputZip">
                                </div>
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <button type="button" id="add_field" style="background: 0%;border: none;">
                                <img id="add_field" src="icons/add_succes.png" width="40" height="40" alt="">
                            </button>
                        </div>
                        <div class="col-md-12 text-right">
                            <button data-toggle="modal" data-target="#prodmatModal" type="submit"
                                href="{{ route('materials_form') }}" class="btn btn-primary mb-2 mr-2 btn-rounded">
                                <strong>Submit</strong>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <form>
    <div class="mx-auto">
        <div class="form-row mb-4">
            <div class="form-group mb-4 col-md-7">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group col-md-1">
            </div>
            <div class="form-group col-md-4">
                <input type="number" class="form-control" placeholder="Quantity" id="inputZip">
            </div>
        </div>

        <div class="form-group mb-4">
            <textarea class="form-control" name="description" placeholder="Description..." rows="3"></textarea>
        </div>
        <div class="form-row  mb-4">
            <div class="form-group mb-4">
                <div class="custom-file-container" data-upload-id="myFirstImage">
                    <label>Upload Image <a href="javascript:void(0)" class="custom-file-container__image-clear"
                            title="Clear Image">x</a></label>
                    <label class="custom-file-container__custom-file">
                        <input type="file" class="custom-file-container__custom-file__custom-file-input"
                            accept="image/*">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-right">
            <button data-toggle="modal" data-target="#prodmatModal" type="button" href="{{ route('materials_form') }}"
                class="btn btn-primary mb-2 mr-2 btn-rounded">
                <strong>Next</strong>
                <img src="icons/next.png" width="20" height="20" alt="">
            </button>
            @include('items.prodpop')
        </div>
    </div>
</form> --}}
