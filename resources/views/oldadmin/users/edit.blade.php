@extends('layouts.admin')

@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.user.all')}}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
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
                                        <form method="POST" action="{{route('admin.user.update')}}" class="row g-3 ajaxForm" enctype="multipart/form-data">
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
                                                <label class="form-label">Email</label>
                                                <input type="text" value="{{$edit->email}}" name="email" readonly class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Password</label>
                                                <input type="password" value="" name="password" class="form-control">
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <label class="control-label">Status <span class="text-danger">*</span></label>
                                                <select name="user_status" id="user_status" class="form-control">
                                                    <option value="1" {{ isset($edit) && $edit->is_active == 1 ? 'selected' : null
                                                        }}>Active</option>
                                                    <option value="0" {{ isset($edit) && $edit->is_active == 0 ? 'selected' : null
                                                        }}>Deactive</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <label for="">Sign Up Date</label>
                                                <input type="text" readonly class="form-control"
                                                    value="{{ $edit->created_at->format('Y-m-d') }}">
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
            my_ajax(url, param, 'post', function(res) {

            },true);
        })
    });
</script>
@endsection
