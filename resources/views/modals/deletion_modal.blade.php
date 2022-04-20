<div class="modal animated fade custo-fade register-modal" tabindex="-1" role="dialog"
    id="deletionModal{{ $id }}" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body text-center">
                <h4>Are u Sure u want to delete {{ $label }}</h4>
                <h5 class="text-info">{{ $name }}</h5>
            </div>

            <div class="row mb-3 mx-1">
                <div class="col text-center mx-1">
                    <button class="btn btn-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Cancel</button>
                </div>
                <div class="col text-center mx-1">
                    <button class="btn btn-danger" onclick="submitForm('{{ $form_id }}')" type="sumbit"
                        class="btn btn-primary">Comfirm</button>
                </div>
            </div>

        </div>
    </div>
</div>
