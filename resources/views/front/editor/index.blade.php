@extends('layouts.front')
@section('after-css')
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<style>

</style>
@endsection
@section('content')
@include('components.flash-message')

<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-12">
			<h2>Legacy project - English (uk)</h2>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="text-align: right;">
			<a href="" class="nwwbedtrtpbtn1 nwwbedtrtpbtnmrrt"><i class="bx bx-cog"></i> Project Settings</a>
			<a href="" class="nwwbedtrtpbtn nwwbedtrtpbtnmrrt"><i class="bx bx-share-alt"></i> Add Keywords</a>
			<a href="{{ route('user.editor.create') }}" class="nwwbedtrtpbtn"><i class="bx bx-file"></i> Create Documents</a>
		</div>
	</div>
</div>
<br>
<br>
<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card radius-10">
            <div class="card-body">
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table table-bordered history_table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: black; display:none;">id</th>
                                <th style="color: black; text-align: left !important;">Latest Changed Document</th>
                                <th style="color:black; text-align: left !important;">Target Keyword</th>
                                <th style="color: black; text-align: left !important;">SEO Score</th>
                                <th style="color: black; text-align: left !important;">Words</th>
                                <th style="color: black; text-align: left !important;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('oldadmin') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
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
    ajax: "{{ route('user.editor.all') }}",
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
            data: 'target_keyword',
            name: 'target_keyword'
        },
        {
            data: 'score',
            name: 'score'
        },
        {
            data: 'words',
            name: 'words'
        },
        {
            data: 'status',
            name: 'status'
        }
    ]
});
});
</script>
@endsection
