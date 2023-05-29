@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12 col-lg-3">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-primary text-primary rounded-circle"><i class='fadeIn animated bx bx-up-arrow-alt'></i>
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
<br>
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
<br>
    <div class="card radius-15">
        <div class="card-body">
            <div class="card-title" style=" display: flex; justify-content: space-between; ">
                <h4 class="mb-0">Total Requests: {{$total_req}}</h4>
            </div>
            <hr />
            <div class="table-responsive">
                <table id="zero-config" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="color: black; display:none">id</th>
                            <th>User ID</th>
                            <th>Template ID</th>
                            <th>Template Name</th>
                            <th>Total Words</th>
                            <th>Total Tokens</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<br>
            </div>
            <!-- / Content -->
@endsection
@section('page-scripts')
<script src="{{ asset('admin_assets') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {

var table = $('#zero-config').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 0,
    lengthMenu: [
        [10, 10, 25, 50, -1],
        [10, 10, 25, 50, "All"]
    ],
    ajax: "{{ route('admin.home') }}",
    columns: [
        {
            data: 'rownum',
            name: 'rownum',
            visible: false,
        },
        {
            data: 'user_id',
            name: 'user_id'
        },
        {
            data: 'template_id',
            name: 'template_id'
        },
        {
            data: 'template_name',
            name: 'template_name'
        },
        {
            data: 'total_words',
            name: 'total_words'
        },
        {
            data: 'total_tokens',
            name: 'total_tokens'
        },
        {
            data: 'created_at',
            name: 'created_at'
        },
    ]
});
});
</script>
@endsection