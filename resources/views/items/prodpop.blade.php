<div class="modal animated fade custo-fade register-modal" id="prodmatModal" tabindex="-1" role="dialog"
    aria-labelledby="prodmatModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="prodmatModalLabel">
                <h4 class="modal-title text-primary">Add Product's Materials</h4>
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
                        <button type="button" style="background: 0%;border: none;">
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
