@extends('layouts.admin')

@section('content')
<!--breadcrumb-->
<h4 class="fw-bold py-3 mb-4">Profile</h4> 
@include('components.flash-message')
<!--end breadcrumb-->
<div class="user-profile-page">
    <div class="card radius-15">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-12 border-right">
                    <div class="d-md-flex align-items-center">
                        <div class="mb-md-0 mb-3">
                            <img src="{{check_file($edit->image,'user')}}" class="rounded-circle shadow" width="130" height="130" alt="" />
                        </div>
                        <div class="ms-md-4 flex-grow-1">
                            <div class="d-flex align-items-center mb-1">
                                <h4 class="mb-0">{{$edit->full_name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="Edit-Profile">
                    <div class="card shadow-none border mb-0 radius-15">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 border-right">
                                        <form method="POST" action="{{route('admin.profile.update')}}" class="row g-3 ajaxForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" name="first_name" value="{{$edit->first_name}}" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" name="last_name" value="{{$edit->last_name}}" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Username</label>
                                                <input type="text" value="{{$edit->username}}" readonly class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input type="text" value="{{$edit->email}}" name="email" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
                                                <input type="password" value="" name="password" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" id="profile_image" name="profile_image" class="form-control">
                                            </div>


                                            <input type="hidden" name="id" value="{{$edit->id}}">
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
            var files = $('#profile_image')[0].files[0] ?? '';
            param.append('profile_image', files);
            my_ajax(url, param, 'post', function(res) {

            },true);
        })
    });
</script>
@endsection
