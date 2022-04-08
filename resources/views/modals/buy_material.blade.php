<div class="modal animated fade custo-fade register-modal" id="buyMaterials" tabindex="-1" role="dialog"
    aria-labelledby="buyMaterialsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="registerModalLabel">
                <h4 class="modal-title text-primary">Buy (Material's Name Here...)</h4>
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
                        <div class="form-group col-md-12">
                            <input type="text" readonly class="form-control" value="Material's Name Here..."
                                id="inputZip">
                        </div>
                    </div>
                    <div class="form-row mb-0">
                        <div class="form-group col-md-7">
                            <div class="input-group">
                                <input type="number" step="0.001" class="form-control integer" id="unitPrice" onchange="calculateTotal()"
                                    name="unitPrice" aria-describedby="basic-addon2" placeholder="Unit price...">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="background-color: #dccff7;"
                                        id="basic-addon6"><strong>TND</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="number" placeholder="Quantity" id="quantity" onchange="calculateTotal()"
                                name="quantity" class="form-control integer">
                        </div>
                    </div>
                    <div class="form-row mb-4 form-inline">
                        <div class="form-group col-md-3">
                            <p>Total Price :</p id="total-price">
                            <input type="number" readonly id="totalPrice" class="form-control" aria-describedby="total-price">
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="form-group mb-4 col-md-12">
                            <select class="placeholder js-states form-control" data-live-search="true" name="material0">
                                <option>Fournisseur</option>
                                <option value="one">First</option>
                                <option value="two">Second</option>
                                <option value="three">Third</option>
                                <option value="four">Fourth</option>
                                <option value="five">Fifth</option>
                            </select>
                        </div>
                    </div>
                    <div class="col text-right mx-3">
                        <button type="submit" class="btn btn-primary mb-2 mr-3 btn-rounded" id="submit">
                            <strong>Submit</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
