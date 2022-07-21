<div class="modal animated fadeInRight custo-fadeInRight register-modal" id="supplierModal" tabindex="-1" role="dialog"
    aria-labelledby="supplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {{-- alert message --}}
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="modal-header" id="supplierModalLabel">
                <h4 class="modal-title text-primary">New Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <div class="mx-auto">
                    
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>

                    <div class="form-row mb-4">
                        <div class="form-group col-md-7">
                            {{-- <label>Example textarea</label> --}}
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                         <div class="form-group mb-4 col-md-6">
                                            {{-- <label>Example textarea</label> --}}
                                            <input type="number" class="form-control" name="tel" placeholder="Phone Number">
                                        </div>
                        <div class="form-group col-md-3">
                            <label>
                                <strong style="color: #1b55e2 ">Is Company?</strong>
                            </label>
                        </div>
                        <div class="form-group col-md-1">
                            <label class="switch s-icons s-outline  s-outline-success  mb-4 mr-2">
                                <input type="checkbox" name="is_company">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <textarea class="form-control" name="address" placeholder="Address..." rows="3"></textarea>
                    </div>
                    <div class="form-row  mb-4">
                        <div class="form-group mb-4">
                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                <label>Upload Image <a href="javascript:void(0)"
                                        class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name="photo"
                                        class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
            </div>
        </div>
    </div>
</div>
