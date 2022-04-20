<div class="modal animated fade custo-fade register-modal" id="productionModal" tabindex="-1" role="dialog"
    aria-labelledby="productionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header" id="productionModalLabel">
                <h4 class="modal-title text-primary">New Production</h4>
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
                            <select name="product" id="product" class="placeholder params js-states form-control">
                                <option value="">Product...</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <input type="number" placeholder="Quantity" min="1" id="quantity" name="quantity"
                                class="form-control params integer">
                        </div>
                    </div>
                    <div id="req_mats" class="container text-center">
                        <div class="row">
                            <div class="col-md-6 border rounded p-1">
                                <strong>Materials</strong>
                            </div>
                            <div class="col-md-2 border rounded p-1">
                                <strong>Cost/pcs</strong>
                            </div>
                            <div class="col-md-2 border rounded p-1">
                                <strong>Total Cost</strong>
                            </div>
                            <div class="col-md-2 border rounded p-1">
                                <strong>Available</strong>
                            </div>
                        </div>
                        <div id="materials">
                            <div class="row">
                                <div class="col-md-6 card">
                                    sdfgsfdgsdfgsdfgsdfg
                                </div>
                                <div class="col-md-2 card">
                                    15615 kg
                                </div>
                                <div class="col-md-2 card">
                                    145159565
                                </div>
                                <div class="col-md-2 card">
                                    14515156159565
                                </div>
                            </div>
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
