@extends('layouts.front')
@section('after-css')
<style>

</style>
@endsection
@section('content')
@include('components.flash-message')

<div class="user-profile-page">
    <div class="card nwhlcard radius-15">
        <div class="card-body">
           {{-- <div class="row">
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
            </div>  --}}
            <!--end row-->
			<h5>Account Information:</h5>

            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="Edit-Profile">
                    <div class="card border mb-0 radius-15 nwstcard">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12 border-right">
                                        <form method="POST" action="{{route('user.profile.update')}}" class="row g-3 ajaxForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-6">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" value="{{$edit->name}}" class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Email</label>
                                                <input type="text" value="{{$edit->email}}" readonly class="form-control">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Profile Image</label>
                                                <input type="file" id="profile_image" name="profile_image" class="form-control">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Password</label>
												<div class="input-group" style="border: 1px solid #ced4da; border-radius: 0.25rem;">
													<input type="password" value="" name="password" id="nwpass" class="form-control nwkstempsearchbar">
													<button class="btn btn-search nwksbtn-search"   onclick="showpassword()" type="button"><i class="lni lni-eye"></i></button>
												</div>
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
			<br>
			<br>

            <h5>Current Plan: </h5>
			<div class="row">
				<div class="col-12 col-lg-12">
					<div class="card nwstcard2 radius-15">
						<div class="card-body text-center">
							<div class="widgets-icons mx-auto bg-light-primary text-primary rounded-circle"><i class='fadeIn animated bx bx-up-arrow-alt'></i></i>
							</div>
							<h4 class="mb-0 font-weight-bold mt-3">{{ $user_package->package->title }}</h4>
							<p class="mb-0">Current Subscription</p>
						</div>
					</div>
				</div>
			</div>
            <a  href="{{route('web.pricing')}}"  class="template-category btn bg-primary text-light">Upgrade Subscription</a>
            @if (session()->get('UserPackages')->workspace_users > 0)
                <br>
                <br>

                <h5>Add user to workspace:  </h5>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card nwstcard2 radius-15">
                            <div class="card-body text-center">
                                <div class="widgets-icons mx-auto bg-light-primary text-primary rounded-circle"><i class='fadeIn animated bx bx-group'></i></i>
                                </div>
                                <h4 class="mb-0 font-weight-bold mt-3">{{ $user_package->workspace_users }}</h4>
                                <p class="mb-0">Workspace Users Limit</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a  href="{{route('user.invite.all')}}"  class="template-category btn bg-primary text-light">Invite Users</a>
            @endif

        </div>
    </div>
</div>
@endsection
@section('page-scripts')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
	function showpassword() {
		var x = document.getElementById("nwpass");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

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
