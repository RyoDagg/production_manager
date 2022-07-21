<div class="modal animated fade custo-fade register-modal" id="editModal{{ $product->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="editModalLabel{{ $product->id }}">
                <h4 class="modal-title text-primary">Edit <i><strong>{{ $product->name }}</strong></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><svg aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg></button>
            </div>
            <div class="modal-body">
                <div class="mx-auto">
                    <div class="form-row mb-4">
                        <div class="form-group mb-2 col-md-12">
                            {{-- <label>Example textarea</label> --}}
                            <input type="text" required class="form-control" value="{{ $product->name }}"
                                name="name" placeholder="Name">
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <textarea class="form-control" name="description" placeholder="Description..." rows="3">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-row  mb-4">
                        <div class="form-group mb-4">
                            <div class="custom-file-container" data-upload-id="myEditImage{{ $product->id }}">
                                <label>Upload Image <a href="javascript:void(0)"
                                        class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name='photo' value="{{ asset('storage/materials/' . $product->photo) }}"
                                        class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <div class="col text-right mx-3">
                            <button type="submit" class="btn btn-primary mb-2 mr-2 btn-rounded">
                                <strong>Submit {{ $product->name }}</strong>
                            </button>
                        </div>
                        <a data-dismiss="modal" data-toggle="modal" href="#prodmatModal{{ $product->id }}"
                            class="btn btn-primary mb-2 mr-2 btn-rounded">
                            <strong>Next</strong>
                            <img src="icons/next.png" width="20" height="20" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal animated fade custo-fade register-modal" id="prodmatModal{{ $product->id }}" tabindex="-1"
    role="dialog" aria-labelledby="prodmatModalLabel{{ $product->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">

            <div class="modal-header" id="prodmatModalLabel{{ $product->id }}">
                <h4 class="modal-title text-primary">Add Product's Materials</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="mx-auto">
                    <div id="rowsEdit">
                        @foreach ($product->materials as $mat)
                            <div class="form-row mb-4" id="row{{ $loop->iteration }}">
                                <div class="form-group mb-4 col-md-8">
                                    <select id="select{{ $loop->iteration }}" required
                                        class="placeholder required selectpicker form-control" data-live-search="true"
                                        name="material[]">
                                        <option value="{{ $mat }}">{{ $mat->name }}</option>
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <input required type="number" name="quanity[]" step="0.001"
                                            class="form-control" placeholder="Quantity" id="inputZip"
                                            aria-describedby="basic-addon2" value="{{ $mat->pivot->quantity }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="background-color: #dccff7;"
                                                id="basic-addon6"><strong
                                                    id="unit_append{{ $loop->iteration }}">{{ $mat->units->symbole }}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <button type="button" id="cancel{{ $loop->iteration }}"
                                        style="background: 0%;border: none;"
                                        onclick="deleteRow('row{{ $loop->iteration }}')">
                                        <img src="icons/cancel.png" width="40" height="40" alt="">
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mb-3 mx-3">
                <div class="col my-3 mx-3">
                    <button type="button" style="background: 0%;border: none;">
                        <img id="add_field_edit" src="icons/add_succes.png" width="40" height="40"
                            alt="">
                    </button>
                </div>
            </div>
            <div class="row mb-3 mx-1">
                <div class="col text-left mx-3">
                    <a data-dismiss="modal" data-toggle="modal" href="#editModal{{ $product->id }}"
                        class="btn btn-primary mb-2 mr-2 btn-rounded">
                        <img src="icons/prev.png" width="20" height="20" alt="">
                        <strong>Previous</strong>
                    </a>
                </div>
                <div class="col text-right mx-3">
                    <button type="submit" class="btn btn-primary mb-2 mr-2 btn-rounded">
                        <strong>Submit {{ $product->name }}</strong>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
