@extends('layouts.admin')
@section('after-css')
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
@endsection
@section('content')
<!--breadcrumb-->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Template /</span> Blogs</h4> 
@include('components.flash-message')
<!--end breadcrumb-->

<div class="card radius-15">
    <div class="card-body">
        <div class="card-title" style=" display: flex; justify-content: space-between; ">
            <h4 class="mb-0">{{$title}}</h4>

            <a href="{{route('admin.blog.add')}}" class="btn btn-info" style="background-color: #673ab7;border-color: #673ab7;">Add New</a>
        </div>
        <hr />
        <div class="table-responsive">
            <table id="zero-config" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th style="color: black; display:none">id</th>
                        <th>Blog Title</th>
                        <th>Auther</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

 <!-- Center modal content -->
 <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="mycategory_modalLabel"><span id="modal_title"></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="ajaxForm" action="{{ route('admin.template.category.save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input class="form-control" name="category_name" type="text" id="category_name"
                            required="required" />

                        <label for="" class="mt-2">Status</label>
                        <select name="status" id="category_status" class="form-control" required="required">
                            <option value="1">Active</option>
                            <option value="0">De-active</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <input class="form-control" name="category_id" type="hidden" id="category_id" />
                        <button class="btn btn-xs btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        validations = $(".ajaxForm").validate();
        $('.ajaxForm').submit(function(e) {
            e.preventDefault();
            validations = $(".ajaxForm").validate();
            if (validations.errorList.length != 0) {
                return false;
            }
            var url = $(this).attr('action');
            var param = new FormData(this);
            my_ajax(url, param, 'post', function(res) {

            },true);
        })



        var table = $('#zero-config').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 0,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: "{{ route('admin.blog.all') }}",
                columns: [
                    {
                        data: 'rownum',
                        name: 'rownum',
                        visible: false,
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'auther',
                        name: 'auther'
                    },
                    {
                        data: 'categoryName',
                        name: 'categoryName'
                    },
                    {
                        data: 'status',
                        name: 'status',
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

    function add_category(is_update = false, category_id = null, category_name = null, status = 1) {
            $("#category_id").val(category_id);
            $("#category_name").val(category_name);
            $("#category_status").val(status);
            if (is_update) {
                $("#modal_title").html('Update ' + category_name);
            } else {
                $("#modal_title").html('Add New Template Category');
            }

            $("#category_modal").modal('show');
        }
</script>
@endsection
