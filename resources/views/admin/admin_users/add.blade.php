@extends('layouts.admin')

@section('content')
<!--breadcrumb-->

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin Users /</span> Edit Admin</h4> 
@include('components.flash-message')
<!--end breadcrumb-->
<div class="user-profile-page">
    <div class="card radius-15">
        <div class="card-body">

            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="Edit-Profile">
                    <div class="card shadow-none border mb-0 radius-15">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 border-right">
                                        <form method="POST" action="{{route('admin.admin-users.save')}}" class="row g-3 ajaxForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-6">
                                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                                <input type="text" name="first_name" value="{{$edit->first_name ?? null}}" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" value="{{$edit->last_name ?? null}}" class="form-control">
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Username <span class="text-danger">*</span></label>
                                                <input type="text" value="{{$edit->username ?? null}}" name="username" {{ !isset($edit) && 'readonly'  }}  class="form-control">
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="text" value="{{$edit->email ?? null}}" name="email" {{ !isset($edit) && 'readonly'  }} class="form-control">
                                            </div>

                                            @if (!isset($edit))
                                                <div class="col-6">
                                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                                    <input type="password" value="" name="password" class="form-control">
                                                </div>
                                            @endif

                                            <div class="col-6 ">
                                                <label class="form-label">Status <span class="text-danger">*</span></label>
                                                <select name="user_status" id="user_status" class="form-control">
                                                    <option value="1" {{ isset($edit) && $edit->is_active == 1 ? 'selected' : null
                                                        }}>Active</option>
                                                    <option value="0" {{ isset($edit) && $edit->is_active == 0 ? 'selected' : null
                                                        }}>Deactive</option>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Profile Image </label>
                                                <input type="file" name="profile_image" class="form-control">
                                            </div>



                                            <input type="hidden" name="user_id" value="{{$edit->id ?? null}}">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary form-submit-btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (isset($edit))
<div class="user-profile-page">
    <div class="card radius-15">
        <div class="card-body">
            <h5>Update Password</h5>
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="Edit-Profile">
                    <div class="card shadow-none border mb-0 radius-15">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 border-right">
                                        <form method="POST" action="{{route('admin.admin-users.update_password')}}" class="row g-3 ajaxForm2" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password_confirmation"  class="form-control">
                                            </div>

                                            <input type="hidden" name="user_id" value="{{$edit->id ?? null}}">

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary form-submit-btn">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

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


        validations2 = $(".ajaxForm2").validate();
        $('.ajaxForm2').submit(function(e) {
            e.preventDefault();
            validations2 = $(".ajaxForm2").validate();
            if (validations2.errorList.length != 0) {
                return false;
            }
            var url = $(this).attr('action');
            var param = new FormData(this);
            my_ajax(url, param, 'post', function(res) {

            },true);
        })
    });
</script>
@endsection
