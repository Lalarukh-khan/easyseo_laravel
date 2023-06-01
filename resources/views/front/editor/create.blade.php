@extends('layouts.front')
@section('after-css')
@endsection
@section('content')
@include('components.flash-message')

<div class="container">
	<div class="row">
		<!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12">
			<div class="card radius-10">
				<div class="card-body">
					<h3 class="edtrtrgtrp">Target Keyword Report</h3>
					<p class="edtrp">Type in the primary keyword the content needs to rank for, and get SEO score and AI recommendations based on:</p>
					<ul>
						<li class="edtrp">Semantic Keywords</li>
						<li class="edtrp">Search Intents</li>
						<li class="edtrp">Title and heading recommendations</li>
						<li class="edtrp">Word count target</li>
					</ul>
					<div style="text-align: center;">
						<input type="text" placeholder="Enter Target Keyword..." class="edtrinp" autocomplete="off">
						<button class="edtrrptbtn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Create report</button>
					</div>
					<p class="text-center">Use 1 audit credit to generate</p>
				</div>
			</div>
		</div> -->
		<div class="col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card radius-10" style="height: 450px;">
				<div class="card-body">
				</div>
			</div>
		</div>
	</div>
</div>
  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  	<h3 class="edtrtrgtrp">Target Keyword Report</h3>
		<p class="edtrp">Type in the primary keyword the content needs to rank for, and get SEO score and AI recommendations based on:</p>
		<ul>
			<li class="edtrp">Semantic Keywords</li>
			<li class="edtrp">Search Intents</li>
			<li class="edtrp">Title and heading recommendations</li>
			<li class="edtrp">Word count target</li>
		</ul>
		<div style="text-align: center;">
			<input type="text" placeholder="Enter Target Keyword..." class="edtrinp" autocomplete="off">
			<button class="edtrrptbtn" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Create report</button>
		</div>
		<p class="text-center">Use 1 audit credit to generate</p>
      </div> 
    </div>
  </div>
</div>
@endsection
@section('page-scripts')
<script>
    $(window).on('load', function() {
        $('#exampleModalCenter').modal('show');
    });
</script>
@endsection
