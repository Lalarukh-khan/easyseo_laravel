@extends('layouts.admin')

@section('content')
<!--breadcrumb-->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Edit</h4>
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
                                            {{-- <div class="col-lg-6 mb-4">
                                                <label class="control-label">Subscription</label>
                                                <select name="user_package" id="user_package" class="form-control">
                                                    <option value="0" {{ isset($edit) && $edit->has_package == 0 ? 'selected' : null
                                                        }}>Free</option>
                                                    <option value="1" {{ isset($edit) && $edit->has_package == 1 ? 'selected' : null
                                                        }}>Pro - 20,000</option>
                                                    <option value="2" {{ isset($edit) && $edit->has_package == 2 ? 'selected' : null
                                                        }}>Pro - 40,000</option>
                                                    <option value="3" {{ isset($edit) && $edit->has_package == 3 ? 'selected' : null
                                                        }}>Pro - 120,000</option>
                                                    <option value="4" {{ isset($edit) && $edit->has_package == 4 ? 'selected' : null
                                                        }}>Pro - 300,000</option>
                                                </select>
                                            </div> --}}

                                            {{-- package ID --}}
                                            <input type="hidden" name="package_id" value="{{$user_packages_id->id}}" class="form-control">

                                            <div class="col-6 mb-4">
                                                <label class="form-label">Words Limit</label>
                                                <input type="text" name="words_limit" value="{{$user_packages_id->words}}" class="form-control">
                                            </div>

                                            <div class="col-6 mb-4">
                                                <label class="form-label">End Date</label>
                                                <input type="date" name="end_date" value="{{$user_packages_id->end_date}}" class="form-control">
                                            </div>

                                            {{-- <div class="col-6 mb-4">
                                                <label class="form-label">Package ID</label>
                                                <input type="text" name="package_id" value="{{$user_packages_id->id}}" class="form-control">
                                            </div>
                                            <div class="col-6 mb-4">
                                                <label class="form-label">User ID</label>
                                                <input type="text" name="user_id" value="{{$user_packages_id->user_id}}" class="form-control">
                                            </div> --}}

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

<div class="card radius-15 mt-5">
    <div class="card-body">
        <div class="form-body">
            <div class="row">
                <div class="col-12 col-lg-12 border-right">
                    <form method="POST" action="{{route('admin.user.update_subscription')}}" class="row g-3 ajaxForm2" enctype="multipart/form-data">
                        @csrf

                        <div class="col-lg-4 mb-4">
                            <label class="control-label">Subscriptions</label>
                            <select name="subscription" id="package" class="form-control">
                                <option value="">Choose Subscription</option>
                                @foreach ($packages as $val)
                                    <option value="{{ $val->id }}" data-data="{{ $val }}"> {{$val->plan_code == 'FRP0' ? 'Free -' : 'Pro -' }}  {{ number_format($val->words,0,',') }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4 mb-4">
                            <label class="control-label">Subscription Fee</label>
                            <input type="text" value="0" id="subscripiton_fee" readonly class="form-control">
                        </div>

                        <div class="col-4 mb-4">
                            <label class="control-label">Words Limit</label>
                            <input type="text" value="0" id="subscripiton_words_limit" readonly class="form-control">
                        </div>

                        <input type="hidden" name="user_id" value="{{$edit->id}}">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary form-submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>

    $('#package').change(function (e) {
        e.preventDefault();
        let val = $(this).val();
        if(val == ''){
            $("#subscripiton_fee").val(0);
            $("#subscripiton_words_limit").val(0);
            return false;
        }
        let data = $(this).find(':selected').data('data');
        $("#subscripiton_fee").val(data.price);
        $("#subscripiton_words_limit").val(data.words);
    });

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
        });


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
