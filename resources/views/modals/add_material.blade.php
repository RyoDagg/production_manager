<div class="modal animated fade custo-fade register-modal" id="registerModal" tabindex="-1" role="dialog"
    aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="registerModalLabel">
                <h4 class="modal-title text-primary">Add New Material</h4>
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
                    <div class="form-row mb-4">
                        <div class="form-group mb-4 col-md-7">
                            {{-- <label>Example textarea</label> --}}
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="form-group mb-4 col-md-1">
                        </div>
                        <div class="form-group col-md-4">
                            <select class="placeholder js-states form-control">
                                <option>Unit...</option>
                                <option value="one">First</option>
                                <option value="two">Second</option>
                                <option value="three">Third</option>
                                <option value="four">Fourth</option>
                                <option value="five">Fifth</option>
                            </select>
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
                    <div class="col text-right mx-3">
                        <button type="submit"
                            class="btn btn-primary mb-2 mr-3 btn-rounded" id="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
