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
                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
        </nav>
    </div>
</div>
@include('components.flash-message')
<!--end breadcrumb-->
<div class="row">
    <div class="col-12 col-lg-5">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">{{$page_action}} New Category</h4>
                </div>
                <hr>
                <div class="row">
                    <form action="{{ route('admin.blog.category.add') }}" class="ajaxForm">
                        @csrf
                        <input type="hidden" name="cat_id" value="{{@$cat_data->id}}">
                        <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                            <label for="template_name">Name</label>
                            <input type="text" class="form-control" name="cat_name" value="{{@$cat_data->name}}">
                            <p>The name is how it appears on your site.</p>
                        </div>
                        <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                            <label for="template_name">Slug</label>
                            <input type="text" class="form-control" name="cat_slug" value="{{@$cat_data->slug}}">
                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-xs btn-info first_form_submit" id="first_form_submit" style="background-color: #673ab7;border-color: #673ab7;">{{$page_action}} {{isset($cat_data) ? '' : 'New'}} Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-7">
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
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('page-scripts')
<script src="{{ asset('admin_assets') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
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
    ajax: "{{route('admin.blog.category.all')}}",
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
            data: 'slug',
            name: 'slug'
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

<script>
$(document).ready(function() {

    validations = $(".ajaxForm").validate();
    $('.ajaxForm').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        validations = $(".ajaxForm").validate();
        if (validations.errorList.length != 0) {
            return false;
        }
        var formData = new FormData(this);
        my_ajax(url, formData, 'post', function(res) {
        },true);
    });
});
</script>
@endsection
