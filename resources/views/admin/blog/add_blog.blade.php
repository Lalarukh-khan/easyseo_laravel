@extends('layouts.admin')
@section('after-css')
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/plugins/quill/quill.core.css">
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/assets/plugins/quill/quill.snow.css">
<style>
    .ck-editor__editable {
    min-height: 200px !important;
}
</style>
@endsection
@section('content')
<!--breadcrumb-->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog /</span> {{isset($edit) ? 'Edit' : 'Add'}}</h4> 
@include('components.flash-message')
<!--end breadcrumb-->

<form action="{{route('admin.blog.save')}}" method="post" class="ajaxForm">
    @csrf
    <input type="hidden" name="id" value="{{$edit->hashid ?? null}}">
    <div class="row reverse_div">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 quater" id="complete_text_dev" style="display:block;">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">{{$title}}</h4>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-4  mb-2 mt-3">
                            <label for="template_name">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$edit->title ?? ''}}"
                                required>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 mb-2 mt-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" cols="30"
                                rows="4" required>{{$edit->meta_description ?? ''}}</textarea>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 mb-2 mt-3">
                            <label for="">Description</label>
                            <div id="snow-editor">{!! $edit->description ?? '' !!}</div>
                            <input type="hidden" name="description" id="description" style="height: 300px;">
                            {{-- <textarea name="description" class="form-control" id="description" required>{!! $edit->description ?? '' !!}</textarea> --}}
                        </div>
                        <div class="form-group col-lg-6 col-md-6 mb-2" style=" margin-top: 90px; ">
                            <label for="">Category</label>
                            <select name="category" id="" class="form-control basic" required>
                                <option value="">Select</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ isset($edit) && $edit->category_id == $cat->id ? 'selected' : null }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-md-6 mb-2" style=" margin-top: 90px; ">
                            <label for="template_status">Author</label>
                            <input type="text" class="form-control" name="auther" placeholder="Author" value="{{$edit->auther ?? ''}}" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 mb-2 mt-3">
                            <label for="" class="mb-3">Image/Icon <span class="text-danger">(size 800x400)</span></label>
                            <br>
                            <img class="profile-pic upload-button" src="{{isset($edit->image) ? asset($edit->image) :
                            'https://via.placeholder.com/150/?text=upload%20icon'}}"
                                style="width:200px;height:200px;cursor: pointer;">
                            <i class="lni lni-circle-plus"
                                style=" font-size: 19px; position: absolute; margin-left: -18px; background-color: #f5f1f0; color: black; "></i>
                            <div class="p-image">
                                <input class="file-upload" name="image" type="file" accept="image/*"
                                    style="display: none">
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <button type="sumbit" class="btn btn-xs btn-secondary" style="background-color: #673ab7;border-color: #673ab7;">Publish</button>
                            <button type="button" class="btn btn-xs btn-secondary"
                            id="draft_btn">Save as draft</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>


@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ asset('admin_assets') }}/assets/plugins/quill/quill_new.min.js"></script>
<script src="{{asset('admin_assets')}}/assets/plugins/select2/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        // CKEDITOR.replace('description');
        var quill =	new Quill("#snow-editor",{theme:"snow",modules:{toolbar:[[{font:[]},{size:[]}],["bold","italic","underline","strike"],[{color:[]},{background:[]}],[{script:"super"},{script:"sub"}],[{header:[!1,1,2,3,4,5,6]},"blockquote","code-block"],[{list:"ordered"},{list:"bullet"},{indent:"-1"},{indent:"+1"}],["direction",{align:[]}],["link","image","video"],["clean"]]}});
        $('.basic').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

        $(function(){
            $('.selectpicker').selectpicker();
        });
        var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });

        $("#max_length").on('change', function() {
            $('#max_length_val').html($(this).val());
        })


        validations = $(".ajaxForm").validate();
        $('.ajaxForm').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var blog = quill.root.innerHTML;
                    $("#description").val(blog);
            validations = $(".ajaxForm").validate();
            if (validations.errorList.length != 0) {
                return false;
            }
            var formData = new FormData(this);
            my_ajax(url, formData, 'post', function(res) {
            },true);
        });

        $('#draft_btn').click(function(e){
            e.preventDefault();
            var url = $('.ajaxForm').attr('action');
            validations = $(".ajaxForm").validate();
            var blog = quill.root.innerHTML;
                    $("#description").val(blog);
            let ajaxForm = document.querySelector('.ajaxForm');
            if (validations.errorList.length != 0) {
                return false;
            }
            var formData = new FormData(ajaxForm);

            formData.append('status',0);

            my_ajax(url, formData, 'post', function(res) {
            },true);
        });
    });



</script>
@endsection
