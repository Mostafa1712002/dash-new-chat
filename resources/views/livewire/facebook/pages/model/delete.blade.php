<div>
    <div class="modal fade" id="delete" wire:ignore.self data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel">@lang('trans.delete') </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label='@lang("trans.Close")'></button>
                </div>
                <form wire:submit.prevent="destroy">
                        <div class="modal-body">
                            <div class="row gx-5">
                                <div class="col-xxl-12 col-12 col-lg-12 col-md-6">
                                    <div class="card custom-card shadow-none mb-0">
                                        <div class="card-body p-0">
                                            <div class="container">
                                                <div class="alert bg-danger text-white text-center my-4">@lang('trans.delete_data')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">@lang("trans.close")

                            </button>
                            <button type="submit" class="btn btn-danger">
                                <span class="indicator-label" wire:loading.class="d-none">
                                    @lang("trans.delete")

                                </span>
                                <span class="d-none" wire:loading.class.remove="d-none">
                                    @lang("trans.wait")
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>

                        </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
