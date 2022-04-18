<div class="modal animated fade custo-fade register-modal" id="purchaseModal" tabindex="-1" role="dialog"
    aria-labelledby="purchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="purchaseModalLabel">
                <h4 class="modal-title text-primary">New Purchase</h4>
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
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <select name="material" class="placeholder js-states form-control">
                                <option value="">Material...</option>
                                @foreach ($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <select name="fournisseur" class="placeholder js-states form-control">
                                <option value="">Supplier...</option>
                                @foreach ($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <div class="input-group">
                                <input type="number" step="0.001" class="form-control integer" id="unitPrice"
                                    onchange="calculateTotal()" name="unitPrice" aria-describedby="basic-addon2"
                                    placeholder="Unit price...">
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
                    <div class="form-row form-inline">
                        <div class="form-group col-md-3">
                            <p>Total Price :</p id="total-price">
                            <input type="number" readonly id="totalPrice" 
                                class="form-control text-center"
                                aria-describedby="total-price">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </div>
    </div>
</div>
