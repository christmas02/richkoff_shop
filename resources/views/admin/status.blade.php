<div class="row">
    <div class="col-lg-12">
        <div class="live-preview">
            <div class="row">
                <div class="col-xl-12">
                    @if(Session::has('success'))

                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                        <i class="ri-notification-off-line label-icon"></i><strong>Succès</strong>
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @elseif(Session::has('error'))

                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show mb-xl-0" role="alert">
                        <i class="ri-error-warning-line label-icon"></i><strong>Erreur</strong>
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
