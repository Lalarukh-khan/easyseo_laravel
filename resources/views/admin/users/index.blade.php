@extends('layouts.admin')
@section('after-css')
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
@endsection
@section('content')
<!--breadcrumb-->

<h4 class="fw-bold py-3 mb-4">Users</h4> 
@include('components.flash-message')
<!--end breadcrumb-->

<div class="card radius-15">
    <div class="card-body">
        <div class="card-title" style=" display: flex; justify-content: space-between; ">
            <h4 class="mb-0">{{$title}}</h4>
        </div>
        <hr />
        <div class="table-responsive">
            <table id="zero-config" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="color: black; display:none">id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Package</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


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
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
    ],
    ajax: "{{ route('admin.user.all') }}",
    columns: [
        {
            data: 'rownum',
            name: 'rownum',
            visible: false,
        },
        {
            data: 'first_name',
            name: 'first_name'
        },
        {
            data: 'last_name',
            name: 'last_name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'status',
            name: 'status',
            className: 'text-center'
        },
        {
            data: 'package',
            name: 'package',
            className: 'text-center'
        },
        {
            data: 'created_at',
            name: 'created_at'
        },
        {
            data: 'action',
            name: 'action',
            className: 'text-center'
        },
    ]
});
});
</script>
@endsection
