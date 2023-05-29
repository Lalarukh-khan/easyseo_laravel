@extends('layouts.admin')
@section('after-css')
<link href="{{ asset('admin') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
@endsection
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created At</th>
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
    ajax: "{{ route('admin.contact_list') }}",
    columns: [
        {
            data: 'rownum',
            name: 'rownum',
            visible: false,
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data: 'phone',
            name: 'phone'
        },
        {
            data: 'subject',
            name: 'subject',
        },
        {
            data: 'message',
            name: 'message'
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
