@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-12 col-lg-3">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-primary text-primary rounded-circle"><i class='fadeIn animated bx bx-up-arrow-alt'></i></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3">{{$total_req}}</h4>
                <p class="mb-0">Total Requests</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-secondary text-secondary rounded-circle"><i class='bx bx-comment-detail'></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3">{{$total_words}}</h4>
                <p class="mb-0">Total Words</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto rounded-circle" style="color:#9200FF !important;"><i class='bx bx-group'></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3">{{$total_users}}</h4>
                <p class="mb-0">Total Users</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto rounded-circle" style="color: #f47300 !important;"><i class='fadeIn animated bx bx-coin-stack'></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3">{{$total_token}}</h4>
                <p class="mb-0">Total Tokens</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-3">
        <div class="card radius-15 bg-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold text-white">{{$month_words}}</h4>
                        <p class="mb-0 text-white">This Month Words</p>
                    </div>
                    <div class="font-35 text-white ms-auto"><i class='fadeIn animated bx bx-message-square-detail'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15" style="background-color: #141517 !important;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold text-white">{{$month_token}}</h4>
                        <p class="mb-0 text-white">This Month Tokens</p>
                    </div>
                    <div class="font-35 text-white ms-auto"><i class='fadeIn animated bx bx-coin-stack'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15" style="background:linear-gradient(180deg, #E35F01 0%, #FD7E00 100%);">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold text-white">{{$month_req}}</h4>
                        <p class="mb-0 text-white">This Month Requests</p>
                    </div>
                    <div class="font-35 text-white ms-auto"><i class='fadeIn animated bx bx-up-arrow-alt'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card radius-15" style="background: linear-gradient(90deg, #590BFF -10.41%, #9200FF 143.42%);">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <h4 class="mb-0 font-weight-bold text-white">{{$month_users}}</h4>
                        <p class="mb-0 text-white">This Month Users</p>
                    </div>
                    <div class="font-35 text-white ms-auto"><i class='bx bx-group'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@endsection
