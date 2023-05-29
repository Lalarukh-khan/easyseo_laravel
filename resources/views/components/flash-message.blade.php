<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 pr-5 pl-5">
        @if (session()->has('success-msg') && !empty(session()->get('success-msg')))

        <div class="alert alert-success alert-dismissible fade show" id="success-alert
        success-alert" role="alert">
            {{session()->get('success-msg')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @php
        session()->forget('success-msg')
        @endphp
        @endif
    </div>


    <div class="col-xl-12 col-lg-12 col-md-12 pr-5 pl-5 error-msg-div">

    </div>
</div>
