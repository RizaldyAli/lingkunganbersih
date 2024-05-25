<div class="modal fade" id="reset-password_modal" tabindex="-1" aria-labelledby="reset-password_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="title">
                    Reset Password
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reset-password_form" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="reset-password_form" class="btn btn-light-primary text-primary font-medium waves-effect text-start">
                    Reset
                </button>
            </div>
        </div>
    </div>
</div>
