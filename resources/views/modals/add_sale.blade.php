<div class="modal animated fade custo-fade register-modal" id="saleModal" tabindex="-1" role="dialog"
    aria-labelledby="saleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" id="saleModalLabel">
                <h4 class="modal-title text-primary">New Sale</h4>
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
                            <div class="input-group">
                                <select required name="product" id="product" aria-describedby="basic-addon2"
                                    class="placeholder js-states form-control">
                                    <option value="">Product...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text" style="background-color: #dccff7;"
                                        id="basic-addon6"><strong id='stock'></strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <select required name="client" class="placeholder js-states form-control">
                                <option value="">Client...</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <div class="input-group">
                                <input required type="number" step="0.001" class="form-control integer" id="unitPrice"
                                    onchange="calculateTotal()" name="unitPrice" aria-describedby="basic-addon2"
                                    placeholder="Unit price...">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="background-color: #dccff7;"
                                        id="basic-addon6"><strong>TND</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <input required type="number" placeholder="Quantity" id="quantity"
                                onchange="calculateTotal()" name="quantity" class="form-control integer">
                        </div>
                    </div>
                    <div class="form-row form-inline">
                        <div class="form-group col-md-3">
                            <p>Total Price :</p id="total-price">
                            <input type="number" readonly id="totalPrice" class="form-control text-center"
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
