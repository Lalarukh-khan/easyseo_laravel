@if (session()->has('package-details'))
    <div class="alert alert-success alert-dismissible fade show" id="success-alert
        success-alert" style="background: #fad6b9 !important; border-color: #fcb986 !important; color: #ff750a !important;" role="alert">
        {!! session()->get('package-details') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('package-error'))
    <div class="alert alert-danger alert-dismissible fade show" id="danger-alert
        danger-alert" role="alert">
        {!! session()->get('package-error') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<br>
