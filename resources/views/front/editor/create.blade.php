@extends('layouts.front')
@section('after-css')
<style>
	body{
		overflow-y: scroll !important;
	}
</style>
@endsection
@section('content')
@include('components.flash-message')

<div class="container" style="max-width: inherit !important;">
    <div class="row">
		<div class="col-xl-8 col-lg-8 col-8">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<i class="bx bx-arrow-back" id="edtrback"></i>
					<input type="text" name="docname" placeholder="Untitled document" class="edtdocrname">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
					<button class="edtrhd" id="h1place" onclick="h1place()">H1</button>
					<button class="edtrhd" id="h2place" onclick="h2placenew()">H2</button>
					<button class="edtrhd" id="h3place">H3</button>
					<button class="edtrhd" id="bplace" onclick="bplace()">B</button>
					<button class="edtrhd" id="iplace"><span class="bx bx-italic"></span></button>
					<button class="edtrhd" id="ulplace"><span class="bx bx-list-ul"></span></button>
					<button class="edtrhd" id="olplace"><span class="bx bx-list-ol"></span></button>
					<button class="edtrhd" id="cplace"><span class="bx bx-comment"></span></button>
					<button class="edtrhd" id="aplace"><span class="bx bx-link-alt"></span></button>
					<button class="edtrhd" id="cpplace"><span class="bx bx-copy"></span></button>
					<!-- <div style="text-align: right; display: inline-block;">
						<button class="edtrgnrt"><i class="bx bx-edit-alt"></i> Generate</button>
					</div> -->
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 col-12">
					<button class="edtrgnrt"><i class="bx bx-edit-alt"></i> Generate</button>
				</div>
				<div class="cpyhvtext">Copy to clipboard</div>
			</div>
			<br>
			<!-- style="height:500px; min-height: 100%; display: flex;flex-direction: column;" -->
			<div class="card" style="min-height: 500px;">
				<div class="card-body edtrtpcard">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12 col-sm-12 brdrleft" data-bs-toggle="modal" data-bs-target="#briefModal">
							<p class="edtrrwt">Brief</p>
							<p class="edtrrws" id="takeedtrbrieftext"> </p>
						</div>
						<!-- <div class="col-lg-2 col-md-2 col-12 col-sm-12 brdrleft" data-bs-toggle="modal" data-bs-target="#audienceModal">
							<p class="edtrrwt">Audience</p>
							<p class="edtrrws" id="takeaudedtraudinp">united states</p>
						</div> -->
						<div class="col-lg-3 col-md-3 col-12 col-sm-12 brdrleft"
						data-bs-toggle="modal" data-bs-target="#toneModal">
							<p class="edtrrwt">Tone of voice</p>
							<!-- <p class="edtrrws" id="edtrtvvalmain">Professional, informat..</p> -->
							<p class="edtrrws" id="edtrtvvalmain"></p>
						</div>
						<div class="col-lg-3 col-md-3 col-12 col-sm-12 edtrbrdrn"
						data-bs-toggle="modal" data-bs-target="#blogModal">
							<p class="edtrrwt">Type of content</p>
							<p class="edtrrws" id="takeblgedtraudinp">Blog post</p>
						</div>
					</div>
					<div class="edtrmn">
						<div style="text-align: right;">
						 	<p class="edtrttc">Title (H1): <strong>0</strong> characters</p>	
						</div>
							<input type="text" class="edtrmainval" name="edtrmainval" id="edtrmainval" placeholder="Enter Title">
							<br>
							<br>
						<!-- <div style="text-align: right;">
							<p class="edtrttm">Meta desc + Visualisation <i class="bx bx-chevron-down"></i></p>
						</div> -->
					</div>
					<div id="forscoring" contenteditable="true" style="outline: none;">
						<div id="resultdata" style="display: none !important;"></div>
						<div class="edtrval" id="extrcttngrsltdata"></div>
						<div id="quesdata"></div>
					</div>
				</div>
				<div class="edtrbtrwf">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 edtrinput-container">
						<div class="edtrinputwithbutton">
							<input type="text" placeholder="Fill in instructions for the AI or choose from list" class="edtrchoosefrmlist" id="edtrmyInput">
							<button type="submit" id="manwrtnbyuser"><img src="{{asset('admin_assets')}}/assets/images/chatsender.png" alt=""></button>
						</div>
							<!-- <input type="text" placeholder="Fill in instructions for the AI or choose from list" class="edtrchoosefrmlist" id="edtrmyInput"> -->

							<ul class="edtrdropdownlist">
								<li id="edtrpara">Paraphrase</li>
								<li id="edtrttls">Suggest titles</li>
								<li id="edtrshd">Suggest subheadings</li>
								<li id="edtrint">Write introduction</li>
								<li id="edtrfct">Facts</li>
							</ul>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<p class="edtror">or</p>
							<form id="semform" style="display: inline-block;">
							<input type="hidden" id="semmainrval" name="semmainrval">
							<button type="submit" class="edtrjstwm" id="edtrjstwm">Just write more</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-4">
			<div class="row" style="visibility: hidden;">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<i class="bx bx-arrow-back" id="edtrback"></i>
					<input type="text" name="docname" placeholder="Untitled document" class="edtdocrname">
					<button class="edtrgnrt"><i class="bx bx-edit-alt"></i> Generate</button>
				</div>
			</div>
			<br>
			<div class="card" style="min-height: 500px;">
				<div class="card-body">
					<div id="ai-loader" style="text-align:center;display:none">
						<img src="{{asset('front')}}/images/ai-loader.gif" alt="ai-loader" style="width:100%; height: auto;">
					</div>
					<div id="ans_div" style="display:none">
						<h3 id="sww" style="display: none;">Something went wrong!</h3>
						<div id="norspnse">
							<div id="semantics" style="display: none !important;"></div>
							<div id="questions" style="display: none !important;"></div>
							<div>
								<h3 id="edtrtrgtkwrd" class="edtrtrgtkwrd"></h3>
								
								<div class="row">
									<div class="col-lg-2"></div>
									<div class="col-lg-8">
									<svg viewBox="0 0 200 160" class="w-full block px-12 relative"><defs><linearGradient id="gradient0.7493432638616075" x1="99%" y1="41%" x2="1%" y2="59%"><stop offset="5.56%" stop-color="#FA517D"></stop><stop offset="39.64%" stop-color="#E49F32"></stop><stop offset="98.89%" stop-color="#43D975"></stop></linearGradient><filter id="filter0_i_6_30" x="0.432007" y="0" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dx="4" dy="4"></feOffset><feGaussianBlur stdDeviation="2"></feGaussianBlur><feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"></feComposite><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix><feBlend mode="normal" in2="shape" result="effect1_innerShadow_6_30"></feBlend></filter></defs><circle filter="url(#filter0_i_6_30)" transform="rotate(171 100 100)" id="path" cx="100" cy="100" r="78" stroke-width="28" stroke-dasharray="490.0884539600077" stroke-dashoffset="220.53980428200347" fill="none" stroke="#504E58" stroke-linecap="butt"></circle><circle class="drop-shadow" transform="rotate(171 100 100)" id="takersltdscore" cx="100" cy="100" r="78" stroke-width="28" fill="none" stroke="url(#gradient0.7493432638616075)" stroke-linecap="butt" style="transition: stroke-dashoffset 0.5s ease 0s;"></circle></svg>
										<div id="edtrscore">
											<div id="resulted_score"></div>
											<p class="edtrrws text-center" style="margin-top: -15px">SEO Score</p>
										</div>
									</div>
									<div class="col-lg-2"></div>
								</div>
								<p class="edtrrwt text-center">Target Keyword</p>
								<p class="edtrrwt text-center">Improve score by addressing report elements</p>
							</div>
							<div class="card radius-10 edtrcard">
								<div class="card-body">
									<h5>Semantic Keywords <i class="bx bx-chevron-down"></i></h5>
									<hr>
									<div id="sem1" class="semall"></div>
									<div id="sem2" class="semall"></div>
									<div id="sem3" class="semall"></div>
									<div id="sem4" class="semall"></div>
									<div id="sem5" class="semall"></div>
									<div id="sem6" class="semall"></div>
									<div id="sem7" class="semall"></div>
									<div id="sem8" class="semall"></div>
									<div id="sem9" class="semall"></div>
									<div id="sem10" class="semall"></div>
								</div>
							</div>
							<div class="card radius-10 edtrcard">
								<div class="card-body">
									<h5>Search intents <i class="bx bx-chevron-down"></i></h5>
									<hr>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que1" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que2" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que3" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que4" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que5" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que6" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que7" ></span>
											</div>
										</div>
									</div>
									<div class="queall">
										<div class="row">
											<div class="col-lg-1 col-1">
												<i class="bx bx-plus"></i>
											</div>
											<div class="col-lg-10 col-10">
												<span id="que8" ></span>
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
	</div>
</div>
<div id="cpydone" class="edtrhidden">
 <span class="bx bx-check" style="color: #fff; font-size: 20px !important;"></span> &nbsp; Copied to clipboard successfully
</div>
<div class="customdiv" id="ttcustomDiv">
	<div class="row cstdvfd">
		<div class="col-lg-10 col-md-10 col-sm-10 col-10">
			<p class="cstmtttp">Title Competitive Score (TCS)</p>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-2" style="text-align: center;">
			<button type="button" id="closettdiv" style="margin-top: -15px; border: none; font-size: 35px; color: #fff; background: transparent;"><span class="bx bx-x" ></span></button>
		</div>
	</div>
	<hr style="background: rgb(203, 203, 203) !important;">
	<div class="row  m-b-20" style="padding-left: 30px;">
		<div class="col-lg-4 col-md-4 col-sm-4 col-4 cstm93 text-center">
			<p class="ttcsm93">93</p>
			<div class="cstm3p">
				<p style="color: #fff; font-size: 15px; margin-bottom: 0px !important; padding: 0px 5px;">3%</p>
				<p style="color: rgb(77, 145, 119); font-size: 12px; padding: 0px 5px;">vs competing <span style="margin-top: -5px;">score</span></p>
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-8">
			<p class="cstmsdtrgt" style="margin-top: 7px;">Include target keyword</p>
			<p class="cstmsdtrgt">keyword string density</p>
			<p class="cstmsdtrgt">Target keyword in initial part</p>
			<p class="cstmsdtrgt">Between 40-60 characters long</p>
			<p class="cstmsdtrgt">Uniqueness vs competitors</p>
		</div>
	</div>
	<div class="cstmideas">
		<h5 class="edtrideas">Ideas</h5>
		<hr style="margin: 0px 0px 10px 0px;">
		<div class="audtttlist">
			<h4 class="audttlistval" id="tt1"></h4>
			<h4 class="audttlistval" id="tt2"></h4>
			<h4 class="audttlistval" id="tt3"></h4>
			<h4 class="audttlistval" id="tt4"></h4>
			<h4 class="audttlistval" id="tt5"></h4>
			<div id="ttgenshow" style="display: none;">
				<h4 class="audttlistval" id="tt6"></h4>
				<h4 class="audttlistval" id="tt7"></h4>
				<h4 class="audttlistval" id="tt8"></h4>
				<h4 class="audttlistval" id="tt9"></h4>
				<h4 class="audttlistval edtnbrdrbtm" id="tt10"></h4>
			</div>
		</div>
		<br>
		<div class="text-center">
			<button class="ttgenm" id="ttgenm">Generate more</button>
		</div>
	</div>
</div>
<form id="quesform">
  <input type="hidden" id="quescontent" name="quescontent">
  <button type="submit" id="quesubmit" style="display: none !important;">Submit</button>
</form>

<form id="contentform">
  <input type="hidden" id="mainrval" name="mainrval">
  <button type="submit" id="mnsubmit" style="display: none !important;">Submit</button>
</form>
<!-- Main Value taker of titles -->
<div>
	<input type="hidden" id="mncontent" name="mncontent">
  	<input type="hidden" id="getmnval" name="getmnval">
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
		<form id="ajaForm">
			<div style="text-align: center;">
				<input type="text" placeholder="Enter Target Keyword..." class="edtrinp" name="prompt" autocomplete="off" class="form-control" required>
				<button class="edtrrptbtn" type="submit" id="hidemodal">Create report</button>
			</div>
			<p class="text-center">Use 1 audit credit to generate</p>
		</form>
      </div> 
    </div>
  </div>
</div>

<!-- Brief Modal -->
<div class="modal" id="briefModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
    <div class="modal-content">
      <div class="modal-body">
		<div style="text-align: right !important;">
        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
	  	<h5 class="text-center">Brief</h5>
		<p class="text-center">Provide context for the AI by giving it information on <br> the topic you are writing about.</p>
		<div class="text-center">
			<textarea type="text" class="edtrbrieftext" id="edtrbrieftext" required rows="10"></textarea>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- Audience Modal -->
<!-- <div class="modal" id="audienceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
		<div style="text-align: right !important;">
        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
	  	<h5 class="text-center">Target audience</h5>
		<p class="text-center">Setting the right target audience will help the AI <br> create better headlines and stronger content.</p>
		<div class="text-center">
			<input type="text" class="edtraudinp" id="audedtraudinp" value="united states">
		</div>
		<h4 class="edtraudfr">Frequent used  Target audience</h4>
      </div>
    </div>
  </div>
</div> -->

<!-- Tone Modal -->
<div class="modal" id="toneModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
    <div class="modal-content">
      <div class="modal-body">
		<div style="text-align: right !important;">
        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
	  	<h5 class="text-center">Tone of voice</h5>
		<p class="text-center">Choose what tone of voice style the AI shall try to <br> write content in.</p>
		<div class="text-center">
			<input type="text" class="edtraudinp" id="edtrtvval" value="Professional, informative, straightforward; Write clearly and concisely.">
		</div>
		<h4 class="edtraudfr">Frequent used  Tone of voice</h4>
		<div class="audttonelist">
			<h4 class="audtonelistval" id="tv1">Formal, Professional: Showcase your expertise and attention to detail.</h4>
			<h4 class="audtonelistval" id="tv2">Persuasive, Compelling: Inspire the reader to take action using solid arguments and emotional appeals.</h4>
			<h4 class="audtonelistval" id="tv3">Conversational, Friendly: Use a casual tone, as if you were talking to a close friend.</h4>
			<h4 class="audtonelistval" id="tv4">Analytical, Data-Driven: Present logical arguments and support your claims with evidence.</h4>
			<h4 class="audtonelistval" id="tv5">First Person, Personal Experience: In the first person, use vivid language and sensory details to bring the experience to life.</h4>
			<h4 class="audtonelistval" id="tv6">Sales-oriented, Persuasive: Create a sense of urgency and highlight the product or service's benefits.</h4>
			<h4 class="audtonelistval" id="tv7">Empathetic, Compassionate: Connect with the reader emotionally and show that you understand their struggles.</h4>
			<h4 class="audtonelistval" id="tv8">Optimistic, Upbeat: Inspire hope and positivity, even in difficult situations.</h4>
			<h4 class="audtonelistval" id="tv9">Steve Jobs, Visionary: Use persuasive rhetoric to motivate the audience.</h4>
			<h4 class="audtonelistval edtnbrdrbtm" id="tv10">Oprah Winfrey, Empowerment: Connect with readers emotionally and encourage personal growth.</h4>
      </div>
    </div>
  </div>
</div>

<!-- Blog Modal -->
<div class="modal" id="blogModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
    <div class="modal-content">
      <div class="modal-body">
		<div style="text-align: right !important;">
        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
	  	<h5 class="text-center">Type of content</h5>
		<p class="text-center">Choose what type of content the AI shall try to write <br> content for.</p>
		<div class="text-center">
			<input type="text" class="edtraudinp" id="blgedtraudinp" value="Blog post">
		</div>
		<h4 class="edtraudfr">Frequent used  Type of content</h4>
		<div class="audttonelist">
			<h4 class="audtonelistval">Blog post</h4>
			<h4 class="audtonelistval">Blog post (how to)</h4>
			<h4 class="audtonelistval">Blog post (listicle)</h4>
			<h4 class="audtonelistval">Blog post (best)</h4>
			<h4 class="audtonelistval">Blog post (alternatives)</h4>
			<h4 class="audtonelistval">Blog post (beginners guide)</h4>
			<h4 class="audtonelistval">Blog post (what is)</h4>
			<h4 class="audtonelistval">Blog post (comparison)</h4>
			<h4 class="audtonelistval">Blog post (product review)</h4>
			<h4 class="audtonelistval">Press release</h4>
			<h4 class="audtonelistval">Product description page</h4>
			<h4 class="audtonelistval">Products description (category page)</h4>
			<h4 class="audtonelistval edtnbrdrbtm">Service page</h4>
		</div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('page-scripts')
<script>
    // $(window).on('load', function() {
    //     $('#exampleModalCenter').modal('show');
    // });
	$(document).ready(function() {
		$(document).on('click', function(event) {
			if (!$(event.target).closest('.edtrinput-container').length) {
			$('.edtrdropdownlist').hide();
			}
		});
	});
	var edtrmainval = document.getElementById("edtrmainval");
	var customDiv = document.getElementById("ttcustomDiv");

	edtrmainval.addEventListener("click", function() {
	ttcustomDiv.style.display = "block";
	ttcustomDiv.style.zIndex = "9999";
	});

	// document.addEventListener("click", function(event) {
	// if (event.target !== edtrmainval && event.target !== ttcustomDiv) {
	// 	ttcustomDiv.style.display = "none";
	// 	ttcustomDiv.style.zIndex = "-1";
	// }
	// });
	const closettdiv = document.getElementById("closettdiv");
	closettdiv.addEventListener("click", function() {
		ttcustomDiv.style.display = "none";
	})
	document.getElementById("edtrbrieftext").addEventListener("input", function() {
	var inputText = this.value;
	document.getElementById("takeedtrbrieftext").textContent = inputText;
	});
	// document.getElementById("audedtraudinp").addEventListener("input", function() {
	// var inputText = this.value;
	// document.getElementById("takeaudedtraudinp").textContent = inputText;
	// });
	document.getElementById("blgedtraudinp").addEventListener("input", function() {
	var inputText = this.value;
	document.getElementById("takeblgedtraudinp").textContent = inputText;
	});
	const newform = document.getElementById("ajaForm");
	newform.addEventListener("submit", submitForm);
	const modal = document.getElementById("exampleModalCenter");
	function closeModal() {
		modal.style.display = "none";
	}
	function submitForm(event) {
		event.preventDefault();
		$('#ai-loader').show();
    	$('#ans_div').hide();
		$('#exampleModalCenter').modal("hide");
	}
</script>
<script>
    var apiUrl = "{{ route('user.editor.ai_response') }}";
    const token = "{{ csrf_token() }}"

    const form = document.querySelector('#ajaForm')
    const queform = document.querySelector('#quesform')
    const cntntform = document.querySelector('#contentform')
    const chatContainer = document.querySelector('#resultdata');
    const chatContainer1 = document.querySelector('#quesdata');

    let loadInterval;

    var first_conversation;

    var coversation_count = 0;

    function loader(element) {
        element.textContent = ''

        loadInterval = setInterval(() => {
            // Update the text content of the loading indicator
            element.textContent += '.';

            // If the loading indicator has reached three dots, reset it
            if (element.textContent === '....') {
                element.textContent = '';
            }
        }, 300);
    }

    function typeText(element, text) {
        let index = 0

        let interval = setInterval(() => {
            if (index < text.length) {
                element.innerHTML += text.charAt(index)
                index++
                chatContainer.scrollTop = chatContainer.scrollHeight;
            } else {
                clearInterval(interval)
            }
        }, 20)
    }
    function generateUniqueId() {
        const timestamp = Date.now();
        const randomNumber = Math.random();
        const hexadecimalString = randomNumber.toString(16);

        return `id-${timestamp}-${hexadecimalString}`;
    }

    function chatStripe(isAi, value, uniqueId) {
        return (
            `<p id=${uniqueId}>${value}</p>`
        )
    }
	const handleSubmit_main = async (e) => {
        e.preventDefault()

        const data = new FormData(form)

        // user's chatstripe
        // chatContainer.innerHTML += chatStripe(false, data.get('prompt'))

        // to clear the textarea input
        form.reset()

        // bot's chatstripe
        const uniqueId = generateUniqueId()
        chatContainer.innerHTML += chatStripe(true, " ", uniqueId)

        // to focus scroll to the bottom
        chatContainer.scrollTop = chatContainer.scrollHeight;

        // specific message div
        const messageDiv = document.getElementById(uniqueId);
        // messageDiv.innerHTML = "..."
        loader(messageDiv)
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                _token: token,
                prompt: 'write firstly 9 questions and then 11 semantic keywords with maximum 2 words limit in ordered list about ' + data.get('prompt'),
                old_prompt: data.get('old_prompt')
            })
        })
		const majorprompt = data.get('prompt');
		const majoroldprompt = data.get('old_prompt');

        clearInterval(loadInterval)
        messageDiv.innerHTML = " "

			// $('#ai-loader').hide();
			// $('#ans_div').show();
            // const data = await response.json();
            // const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
			// typeText(messageDiv, parsedData);
            // $('#old_prompt').val(data.old_prompt);
			// extrcttngrsltdata.innerHTML = parsedData;
			if (response.ok) {
					$('#ai-loader').hide();
					$('#ans_div').show();
					const data = await response.json();
					const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
					$('#old_prompt').val(data.old_prompt);
					// const div = document.getElementById(newval);
					document.getElementById("edtrtrgtkwrd").innerHTML = majorprompt;
					const content = String(parsedData);
					const startWord1 = "1.";
					const endWord1 = "9.";
					const startWord2 = "1.";
					const endWord2 = "11.";
					const startIndex1 = content.indexOf(startWord1);
					const endIndex1 = content.indexOf(endWord1, startIndex1 + startWord1.length);

					const startIndex2 = content.indexOf(startWord2, endIndex1 + endWord1.length);
					const endIndex2 = content.indexOf(endWord2, startIndex2 + startWord2.length);

					if (
						startIndex1 !== -1 &&
						endIndex1 !== -1 &&
						startIndex2 !== -1 &&
						endIndex2 !== -1 &&
						endIndex1 < startIndex2
					) {
						const startIndex = content.indexOf('"');
						const endIndex = content.lastIndexOf('"');
					
						if (startIndex !== -1 && endIndex !== -1 && startIndex < endIndex) {
							const trimmedContent = content.substring(startIndex + 1, endIndex);
						}
						const trimmedContent1 = content.substring(startIndex1, endIndex1 + endWord1.length);
						const trimmedContent2 = content.substring(startIndex2, endIndex2 + endWord2.length);
						// const final_text = trimmedContent1 + trimmedContent2;
						document.getElementById("semantics").innerHTML = trimmedContent2;
						document.getElementById("questions").innerHTML = trimmedContent1;
						const forscoring = document.getElementById("forscoring");
						const upprcontnt = forscoring.innerText;
						if (upprcontnt == ''){
								upprcontnt.innerText = "nothing";
								getSeoScore(upprcontnt);
						}
						else{
							getSeoScore(upprcontnt);
						}
						// const score =  content;
						

						const semantics = document.getElementById("semantics").innerHTML;
						startText2_1 = "1.";
						endText2_1 = "2.";
						const startIndex2_1 = semantics.indexOf(startText2_1);
						const endIndex2_1 = semantics.indexOf(endText2_1);
						if (startIndex2_1 !== -1 && endIndex2_1 !== -1 && startIndex2_1 < endIndex2_1) {
							const trimmedContent2_1 = semantics.substring(startIndex2_1 + startText2_1.length, endIndex2_1);
							const sem1 = document.getElementById("sem1");
							sem1.innerHTML = trimmedContent2_1;
						}
						startText2_2 = "2.";
						endText2_2 = "3.";
						const startIndex2_2 = semantics.indexOf(startText2_2);
						const endIndex2_2 = semantics.indexOf(endText2_2);
						if (startIndex2_2 !== -1 && endIndex2_2 !== -1 && startIndex2_2 < endIndex2_2) {
							const trimmedContent2_2 = semantics.substring(startIndex2_2 + startText2_2.length, endIndex2_2);
							const sem2 = document.getElementById("sem2");
							sem2.innerHTML = trimmedContent2_2;
						}
						startText2_3 = "3.";
						endText2_3 = "4.";
						const startIndex2_3 = semantics.indexOf(startText2_3);
						const endIndex2_3 = semantics.indexOf(endText2_3);
						if (startIndex2_3 !== -1 && endIndex2_3 !== -1 && startIndex2_3 < endIndex2_3) {
							const trimmedContent2_3 = semantics.substring(startIndex2_3 + startText2_3.length, endIndex2_3);
							const sem3 = document.getElementById("sem3");
							sem3.innerHTML = trimmedContent2_3;
						}
						startText2_4 = "4.";
						endText2_4 = "5.";
						const startIndex2_4 = semantics.indexOf(startText2_4);
						const endIndex2_4 = semantics.indexOf(endText2_4);
						if (startIndex2_4 !== -1 && endIndex2_4 !== -1 && startIndex2_4 < endIndex2_4) {
							const trimmedContent2_4 = semantics.substring(startIndex2_4 + startText2_4.length, endIndex2_4);
							const sem4 = document.getElementById("sem4");
							sem4.innerHTML = trimmedContent2_4;
						}
						startText2_5 = "5.";
						endText2_5 = "6.";
						const startIndex2_5 = semantics.indexOf(startText2_5);
						const endIndex2_5 = semantics.indexOf(endText2_5);
						if (startIndex2_5 !== -1 && endIndex2_5 !== -1 && startIndex2_5 < endIndex2_5) {
							const trimmedContent2_5 = semantics.substring(startIndex2_5 + startText2_5.length, endIndex2_5);
							const sem5 = document.getElementById("sem5");
							sem5.innerHTML = trimmedContent2_5;
						}
						startText2_6 = "6.";
						endText2_6 = "7.";
						const startIndex2_6 = semantics.indexOf(startText2_6);
						const endIndex2_6 = semantics.indexOf(endText2_6);
						if (startIndex2_6 !== -1 && endIndex2_6 !== -1 && startIndex2_6 < endIndex2_6) {
							const trimmedContent2_6 = semantics.substring(startIndex2_6 + startText2_6.length, endIndex2_6);
							const sem6 = document.getElementById("sem6");
							sem6.innerHTML = trimmedContent2_6;
						}
						startText2_7 = "7.";
						endText2_7 = "8.";
						const startIndex2_7 = semantics.indexOf(startText2_7);
						const endIndex2_7 = semantics.indexOf(endText2_7);
						if (startIndex2_7 !== -1 && endIndex2_7 !== -1 && startIndex2_7 < endIndex2_7) {
							const trimmedContent2_7 = semantics.substring(startIndex2_7 + startText2_7.length, endIndex2_7);
							const sem7 = document.getElementById("sem7");
							sem7.innerHTML = trimmedContent2_7;
						}
						startText2_8 = "8.";
						endText2_8 = "9.";
						const startIndex2_8 = semantics.indexOf(startText2_8);
						const endIndex2_8 = semantics.indexOf(endText2_8);
						if (startIndex2_8 !== -1 && endIndex2_8 !== -1 && startIndex2_8 < endIndex2_8) {
							const trimmedContent2_8 = semantics.substring(startIndex2_8 + startText2_8.length, endIndex2_8);
							const sem8 = document.getElementById("sem8");
							sem8.innerHTML = trimmedContent2_8;
						}
						startText2_9 = "9.";
						endText2_9 = "10.";
						const startIndex2_9 = semantics.indexOf(startText2_9);
						const endIndex2_9 = semantics.indexOf(endText2_9);
						if (startIndex2_9 !== -1 && endIndex2_9 !== -1 && startIndex2_8 < endIndex2_9) {
							const trimmedContent2_9 = semantics.substring(startIndex2_9 + startText2_9.length, endIndex2_9);
							const sem9 = document.getElementById("sem9");
							sem9.innerHTML = trimmedContent2_9;
						}
						startText2_10 = "10.";
						endText2_10 = "11.";
						const startIndex2_10 = semantics.indexOf(startText2_10);
						const endIndex2_10 = semantics.indexOf(endText2_10);
						if (startIndex2_10 !== -1 && endIndex2_10 !== -1 && startIndex2_10 < endIndex2_10) {
							const trimmedContent2_10 = semantics.substring(startIndex2_10 + startText2_10.length, endIndex2_10);
							const sem10 = document.getElementById("sem10");
							sem10.innerHTML = trimmedContent2_10;
						}
						//QUESTIONS SECTION STARTS FROM HERE
						const questions = document.getElementById("questions").innerHTML;
						startText1_1 = "1.";
						endText1_1 = "2.";
						const startIndex1_1 = questions.indexOf(startText1_1);
						const endIndex1_1 = questions.indexOf(endText1_1);
						if (startIndex1_1 !== -1 && endIndex1_1 !== -1 && startIndex1_1 < endIndex1_1) {
							const trimmedContent1_1 = questions.substring(startIndex1_1 + startText1_1.length, endIndex1_1);
							const que1 = document.getElementById("que1");
							que1.innerHTML = trimmedContent1_1;
						}
						startText1_2 = "2.";
						endText1_2 = "3.";
						const startIndex1_2 = questions.indexOf(startText1_2);
						const endIndex1_2 = questions.indexOf(endText1_2);
						if (startIndex1_2 !== -1 && endIndex1_2 !== -1 && startIndex1_2 < endIndex1_2) {
							const trimmedContent1_2 = questions.substring(startIndex1_2 + startText1_2.length, endIndex1_2);
							const que2 = document.getElementById("que2");
							que2.innerHTML = trimmedContent1_2;
						}
						startText1_3 = "3.";
						endText1_3 = "4.";
						const startIndex1_3 = questions.indexOf(startText1_3);
						const endIndex1_3 = questions.indexOf(endText1_3);
						if (startIndex1_3 !== -1 && endIndex1_3 !== -1 && startIndex1_3 < endIndex1_3) {
							const trimmedContent1_3 = questions.substring(startIndex1_3 + startText1_3.length, endIndex1_3);
							const que3 = document.getElementById("que3");
							que3.innerHTML = trimmedContent1_3;
						}
						startText1_4 = "4.";
						endText1_4 = "5.";
						const startIndex1_4 = questions.indexOf(startText1_4);
						const endIndex1_4 = questions.indexOf(endText1_4);
						if (startIndex1_4 !== -1 && endIndex1_4 !== -1 && startIndex1_4 < endIndex1_4) {
							const trimmedContent1_4 = questions.substring(startIndex1_4 + startText1_4.length, endIndex1_4);
							const que4 = document.getElementById("que4");
							que4.innerHTML = trimmedContent1_4;
						}
						startText1_5 = "5.";
						endText1_5 = "6.";
						const startIndex1_5 = questions.indexOf(startText1_5);
						const endIndex1_5 = questions.indexOf(endText1_5);
						if (startIndex1_5 !== -1 && endIndex1_5 !== -1 && startIndex1_5 < endIndex1_5) {
							const trimmedContent1_5 = questions.substring(startIndex1_5 + startText1_5.length, endIndex1_5);
							const que5 = document.getElementById("que5");
							que5.innerHTML = trimmedContent1_5;
						}
						startText1_6 = "6.";
						endText1_6 = "7.";
						const startIndex1_6 = questions.indexOf(startText1_6);
						const endIndex1_6 = questions.indexOf(endText1_6);
						if (startIndex1_6 !== -1 && endIndex1_6 !== -1 && startIndex1_6 < endIndex1_6) {
							const trimmedContent1_6 = questions.substring(startIndex1_6 + startText1_6.length, endIndex1_6);
							const que6 = document.getElementById("que6");
							que6.innerHTML = trimmedContent1_6;
						}
						startText1_7 = "7.";
						endText1_7 = "8.";
						const startIndex1_7 = questions.indexOf(startText1_7);
						const endIndex1_7 = questions.indexOf(endText1_7);
						if (startIndex1_7 !== -1 && endIndex1_7 !== -1 && startIndex1_7 < endIndex1_7) {
							const trimmedContent1_7 = questions.substring(startIndex1_7 + startText1_7.length, endIndex1_7);
							const que7 = document.getElementById("que7");
							que7.innerHTML = trimmedContent1_7;
						}
						startText1_8 = "8.";
						endText1_8 = "9.";
						const startIndex1_8 = questions.indexOf(startText1_8);
						const endIndex1_8 = questions.indexOf(endText1_8);
						if (startIndex1_8 !== -1 && endIndex1_8 !== -1 && startIndex1_8 < endIndex1_8) {
							const trimmedContent1_8 = questions.substring(startIndex1_8 + startText1_8.length, endIndex1_8);
							const que8 = document.getElementById("que8");
							que8.innerHTML = trimmedContent1_8;
						}
						
					const response2 = await fetch(apiUrl, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json',
						},
						body: JSON.stringify({
							_token: token,
							prompt: 'suggest 11 detailed titles in ordered list without having double qoutes based upon ' + majorprompt,
							old_prompt: majoroldprompt
						})
					})
					if (response2.ok) {
						const data = await response2.json();
						const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
						$('#old_prompt').val(data.old_prompt);
						const sugtitles = String(parsedData);
						console.log("Home "+parsedData);
						startTextt_1 = "1.";
						endTextt_1 = "2.";
						const startIndext_1 = sugtitles.indexOf(startTextt_1);
						const endIndext_1 = sugtitles.indexOf(endTextt_1);
						if (startIndext_1 !== -1 && endIndext_1 !== -1 && startIndext_1 < endIndext_1) {
							const trimmedContentt_1 = sugtitles.substring(startIndext_1 + startTextt_1.length, endIndext_1);
							const tt1 = document.getElementById("tt1");
							tt1.innerHTML = trimmedContentt_1;
						}
						startTextt_2 = "2.";
						endTextt_2 = "3.";
						const startIndext_2 = sugtitles.indexOf(startTextt_2);
						const endIndext_2 = sugtitles.indexOf(endTextt_2);
						if (startIndext_2 !== -1 && endIndext_2 !== -1 && startIndext_2 < endIndext_2) {
							const trimmedContentt_2 = sugtitles.substring(startIndext_2 + startTextt_2.length, endIndext_2);
							const tt2 = document.getElementById("tt2");
							tt2.innerHTML = trimmedContentt_2;
						}
						startTextt_3 = "3.";
						endTextt_3 = "4.";
						const startIndext_3 = sugtitles.indexOf(startTextt_3);
						const endIndext_3 = sugtitles.indexOf(endTextt_3);
						if (startIndext_3 !== -1 && endIndext_3 !== -1 && startIndext_3 < endIndext_3) {
							const trimmedContentt_3 = sugtitles.substring(startIndext_3 + startTextt_3.length, endIndext_3);
							const tt3 = document.getElementById("tt3");
							tt3.innerHTML = trimmedContentt_3;
						}
						startTextt_4 = "4.";
						endTextt_4 = "5.";
						const startIndext_4 = sugtitles.indexOf(startTextt_4);
						const endIndext_4 = sugtitles.indexOf(endTextt_4);
						if (startIndext_4 !== -1 && endIndext_4 !== -1 && startIndext_4 < endIndext_4) {
							const trimmedContentt_4 = sugtitles.substring(startIndext_4 + startTextt_4.length, endIndext_4);
							const tt4 = document.getElementById("tt4");
							tt4.innerHTML = trimmedContentt_4;
						}
						startTextt_5 = "5.";
						endTextt_5 = "6.";
						const startIndext_5 = sugtitles.indexOf(startTextt_5);
						const endIndext_5 = sugtitles.indexOf(endTextt_5);
						if (startIndext_5 !== -1 && endIndext_5 !== -1 && startIndext_5 < endIndext_5) {
							const trimmedContentt_5 = sugtitles.substring(startIndext_5 + startTextt_5.length, endIndext_5);
							const tt5 = document.getElementById("tt5");
							tt5.innerHTML = trimmedContentt_5;
						}
						startTextt_6 = "6.";
						endTextt_6 = "7.";
						const startIndext_6 = sugtitles.indexOf(startTextt_6);
						const endIndext_6 = sugtitles.indexOf(endTextt_6);
						if (startIndext_6 !== -1 && endIndext_6 !== -1 && startIndext_6 < endIndext_6) {
							const trimmedContentt_6 = sugtitles.substring(startIndext_6 + startTextt_6.length, endIndext_6);
							const tt6 = document.getElementById("tt6");
							tt6.innerHTML = trimmedContentt_6;
						}
						startTextt_7 = "7.";
						endTextt_7 = "8.";
						const startIndext_7 = sugtitles.indexOf(startTextt_7);
						const endIndext_7 = sugtitles.indexOf(endTextt_7);
						if (startIndext_7 !== -1 && endIndext_7 !== -1 && startIndext_7 < endIndext_7) {
							const trimmedContentt_7 = sugtitles.substring(startIndext_7 + startTextt_7.length, endIndext_7);
							const tt7 = document.getElementById("tt7");
							tt7.innerHTML = trimmedContentt_7;
						}
						startTextt_8 = "8.";
						endTextt_8 = "9.";
						const startIndext_8 = sugtitles.indexOf(startTextt_8);
						const endIndext_8 = sugtitles.indexOf(endTextt_8);
						if (startIndext_8 !== -1 && endIndext_8 !== -1 && startIndext_8 < endIndext_8) {
							const trimmedContentt_8 = sugtitles.substring(startIndext_8 + startTextt_8.length, endIndext_8);
							const tt8 = document.getElementById("tt8");
							tt8.innerHTML = trimmedContentt_8;
						}
						startTextt_9 = "9.";
						endTextt_9 = "10.";
						const startIndext_9 = sugtitles.indexOf(startTextt_9);
						const endIndext_9 = sugtitles.indexOf(endTextt_9);
						if (startIndext_9 !== -1 && endIndext_9 !== -1 && startIndext_9 < endIndext_9) {
							const trimmedContentt_9 = sugtitles.substring(startIndext_9 + startTextt_9.length, endIndext_9);
							const tt9 = document.getElementById("tt9");
							tt9.innerHTML = trimmedContentt_9;
						}
						startTextt_10 = "10.";
						endTextt_10 = "11.";
						const startIndext_10 = sugtitles.indexOf(startTextt_10);
						const endIndext_10 = sugtitles.indexOf(endTextt_10);
						if (startIndext_10 !== -1 && endIndext_10 !== -1 && startIndext_10 < endIndext_10) {
							const trimmedContentt_10 = sugtitles.substring(startIndext_10 + startTextt_10.length, endIndext_10);
							const tt10 = document.getElementById("tt10");
							tt10.innerHTML = trimmedContentt_10;
						}
					}
					else {
						const err = await response2.text();
						messageDiv.innerHTML = "Something went wrong"
						alert(err)
					}
					}
		} 
		else {
			const err = await response.text()
			$('#ai-loader').hide();
			$('#ans_div').show();
			$('#norspnse').hide();
			$('#sww').show();
			messageDiv.innerHTML = "Something went wrong"
			alert(err)
		}
    }

    form.addEventListener('submit', handleSubmit_main)

    // form.addEventListener('keyup', (e) => {
    //     if (e.keyCode === 13) {
    //         handleSubmit_main(e)
    //     }
    // })
</script>
<script>
	const que1 = document.getElementById("que1");
	const que2 = document.getElementById("que2");
	const que3 = document.getElementById("que3");
	const que4 = document.getElementById("que4");
	const que5 = document.getElementById("que5");
	const que6 = document.getElementById("que6");
	const que7 = document.getElementById("que7");
	const que8 = document.getElementById("que8");
	const quesform = document.getElementById("quesform");
	const quescontent = document.getElementById("quescontent");

	que1.addEventListener("click", function(event) {
		const innerText = que1.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que2.addEventListener("click", function(event) {
		const innerText = que2.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que3.addEventListener("click", function(event) {
		const innerText = que3.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que4.addEventListener("click", function(event) {
		const innerText = que4.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que5.addEventListener("click", function(event) {
		const innerText = que5.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que6.addEventListener("click", function(event) {
		const innerText = que6.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que7.addEventListener("click", function(event) {
		const innerText = que7.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
	que8.addEventListener("click", function(event) {
		const innerText = que8.innerText;
		quescontent.value = innerText;
		event.preventDefault();
		document.getElementById("quesubmit").click();
	});
    function loader1(element) {
        element.textContent = ''

        loadInterval = setInterval(() => {
            // Update the text content of the loading indicator
            element.textContent += '.';

            // If the loading indicator has reached three dots, reset it
            if (element.textContent === '....') {
                element.textContent = '';
            }
        }, 300);
    }

    function typeText1(element, text) {
        let index = 0

        let interval = setInterval(() => {
            if (index < text.length) {
                element.innerHTML += text.charAt(index)
                index++
                chatContainer1.scrollTop = chatContainer1.scrollHeight;
            } else {
                clearInterval(interval)
            }
        }, 20)
    }
    function generateUniqueId1() {
        const timestamp = Date.now();
        const randomNumber = Math.random();
        const hexadecimalString = randomNumber.toString(16);

        return `id-${timestamp}-${hexadecimalString}`;
    }

    function chatStripe(isAi, value, uniqueId) {
        return (
            `<p class="edtrvalques" id=${uniqueId}>${value}</p>`
        )
    }


    const handleSubmit1 = async (e) => {
        e.preventDefault()

        const data = new FormData(queform)

        // user's chatstripe
        chatContainer1.innerHTML += chatStripe(false, data.get('quescontent'))

        // to clear the textarea input
        queform.reset()

        // bot's chatstripe
        const uniqueId = generateUniqueId1()
        chatContainer1.innerHTML += chatStripe(true, " ", uniqueId)

        // to focus scroll to the bottom
        chatContainer1.scrollTop = chatContainer1.scrollHeight;

        // specific message div
        const messageDiv = document.getElementById(uniqueId)

        // messageDiv.innerHTML = "..."
        loader1(messageDiv)
        const response1 = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                _token: token,
                prompt: data.get('quescontent'),
                old_prompt: data.get('old_prompt')
            })
        })

        clearInterval(loadInterval)
        messageDiv.innerHTML = " "

        if (response1.ok) {
            const data = await response1.json();
            const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
            $('#old_prompt').val(data.old_prompt)
			typeText1(messageDiv, parsedData);
        } else {
            const err = await response1.text()
            messageDiv.innerHTML = "Something went wrong"
            alert(err)
        }
    }

    queform.addEventListener('submit', handleSubmit1)

    queform.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            handleSubmit1(e)
        }
    })
</script>
<script>
	const edtrpara = document.getElementById("edtrpara");
	const edtrttls = document.getElementById("edtrttls");
	const edtrshd = document.getElementById("edtrshd");
	const edtrint = document.getElementById("edtrint");
	const edtrfct = document.getElementById("edtrfct");
	const manwrtnbyuser = document.getElementById("manwrtnbyuser");
	const edtrmyInput = document.getElementById("edtrmyInput");
	const contentform = document.getElementById("contentform");
	const mncontent = document.getElementById("mncontent");
	const getmnval = document.getElementById("getmnval");
	manwrtnbyuser.addEventListener("click", function(event) {
		const innerText = edtrmyInput.value;
		mncontent.value = innerText;
		const edtrtvvalfrtxt = document.getElementById("edtrtvval").value;
		const totalmainvalue =  mncontent.value
		document.getElementById("mainrval").value =  totalmainvalue + " having tone of voice as " + edtrtvvalfrtxt;;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrpara.addEventListener("click", function(event) {
		const edtrtrgtkwrd = document.getElementById("edtrtrgtkwrd").innerText;
		const edtrtvvalfrtxt = document.getElementById("edtrtvval").value;
		const innerText = edtrpara.innerText;
		mncontent.value = innerText;
		getmnval.value = edtrtrgtkwrd;
		const totalmainvalue =  mncontent.value + " about " + getmnval.value + " having tone of voice as " + edtrtvvalfrtxt;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrttls.addEventListener("click", function(event) {
		const edtrtrgtkwrd = document.getElementById("edtrtrgtkwrd").innerText;
		const edtrtvvalfrtxt = document.getElementById("edtrtvval").value;
		const innerText = edtrttls.innerText;
		mncontent.value = innerText;
		getmnval.value = edtrtrgtkwrd;
		const totalmainvalue =  mncontent.value + " about " + getmnval.value + " having tone of voice as " + edtrtvvalfrtxt;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrshd.addEventListener("click", function(event) {
		const edtrtrgtkwrd = document.getElementById("edtrtrgtkwrd").innerText;
		const edtrtvvalfrtxt = document.getElementById("edtrtvval").value;
		const innerText = edtrshd.innerText;
		mncontent.value = innerText;
		getmnval.value = edtrtrgtkwrd;
		const totalmainvalue =  mncontent.value + " about " + getmnval.value + " having tone of voice as " + edtrtvvalfrtxt;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrint.addEventListener("click", function(event) {
		const edtrtrgtkwrd = document.getElementById("edtrtrgtkwrd").innerText;
		const edtrtvvalfrtxt = document.getElementById("edtrtvval").value;
		const innerText = edtrint.innerText;
		mncontent.value = innerText;
		getmnval.value = edtrtrgtkwrd;
		const totalmainvalue =  mncontent.value + " about " + getmnval.value + " having tone of voice as " + edtrtvvalfrtxt;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrfct.addEventListener("click", function(event) {
		const edtrtrgtkwrd = document.getElementById("edtrtrgtkwrd").innerText;
		const edtrtvvalfrtxt = document.getElementById("edtrtvval").value;
		const innerText = edtrfct.innerText;
		mncontent.value = innerText;
		getmnval.value = edtrtrgtkwrd;
		const totalmainvalue =  mncontent.value + " about " + getmnval.value + " having tone of voice as " + edtrtvvalfrtxt;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	const handleSubmit2 = async (e) => {
        e.preventDefault()

        const data = new FormData(cntntform)

        // user's chatstripe
        // chatContainer1.innerHTML += chatStripe(false, data.get('mainrval'))

        // to clear the textarea input
        cntntform.reset()

        // bot's chatstripe
        const uniqueId = generateUniqueId1()
        chatContainer1.innerHTML += chatStripe(true, " ", uniqueId)

        // to focus scroll to the bottom
        chatContainer1.scrollTop = chatContainer1.scrollHeight;

        // specific message div
        const messageDiv = document.getElementById(uniqueId)

        // messageDiv.innerHTML = "..."
        loader1(messageDiv)
        const response1 = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                _token: token,
                prompt: data.get('mainrval'),
                old_prompt: data.get('old_prompt')
            })
        })

        clearInterval(loadInterval)
        messageDiv.innerHTML = " "

        if (response1.ok) {
			// $('#ai-loader').hide();
            // $('#ans_div').show();
            const data = await response1.json();
            const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
            $('#old_prompt').val(data.old_prompt)
            // const div = document.getElementById(newval);
            // const content = String(parsedData);
			typeText1(messageDiv, parsedData);
        } else {
            const err = await response1.text()
			// $('#ai-loader').hide();
            // $('#ans_div').show();
			// $('#norspnse').hide();
            // $('#sww').show();
            messageDiv.innerHTML = "Something went wrong"
            alert(err)
        }
    }

    cntntform.addEventListener('submit', handleSubmit2)

    cntntform.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            handleSubmit2(e)
        }
    })

</script>
<script>
	var list = [];
    var listvalues = [];
    var keywords = [];

    function getSeoScore(content) {
		const url = 'https://api.dataforseo.com/v3/content_generation/text_summary/live';
		const post_array = [];
		post_array.push({
				"text": content,
				"language_name": "English (United States)"
		});
		const username = 'lidanex@gmail.com';
		const password = 'fc53e701e81bec41';

		fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
			'Authorization': 'Basic ' + btoa(username + ':' + password)
		},
		body: JSON.stringify(post_array)
		})
		.then(response => response.json())
		.then(data => {
			const apiResponse = data;
            this.list.push({
				"response": apiResponse
		        })
                for (const key of Object.keys(this.list)) {
                    this.listvalues.push(this.list[key]);
                }
            const finallist = this.list;
                    let html = '';
                    for (let i = 0; i < finallist.length; i++) {
                    const item = finallist[i];
                    for (let j = 0; j < item.response.tasks.length; j++) {
                        const subitem = item.response.tasks[j];
						if(subitem.result == null){
							document.getElementById("resulted_score").innerHTML = "0";
						}
						else{
							for (let z = 0; z < subitem.result.length; z++) {
							const subitem2 = subitem.result[z];
							const keyword_density = subitem2.keyword_density;
							const automated_readability_index = subitem2.automated_readability_index;
							const smog_readability_index = subitem2.smog_readability_index;
							let keywordCount = (content.match(new RegExp(keyword_density, 'gi')) || []).length;
							let totalWords = content.split(' ').length;
							let keywordDensity = keywordCount / totalWords;

							// Calculate meta tags score
							let metaTagsScore = 1; 
							let seoScore = (keywordDensity * 10) + (metaTagsScore * 3) + (automated_readability_index * 3) + (smog_readability_index * 3);
							let roundedscore = Math.round(seoScore);
							document.getElementById("resulted_score").innerHTML = roundedscore;
							}
						}
                        const numberEl = document.getElementById("resulted_score");
                        const number = parseInt(numberEl.textContent);
						const takersltdscore = document.getElementById("takersltdscore");
						if (number == 0) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "490.49466924980385");
                        }
                        else if (number > 0 && number <= 5) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "479.3065079728876");
                        }
                        else if (number > 5 && number <= 10) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "463.1335889922073");
                        }
                        else if (number > 10 && number <= 15) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "449.6561565083071");
                        }
                        else if (number > 15 && number <= 20) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "444.26518351474704");
                        }
                        else if (number > 20 && number <= 25) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "428.0922645340667");
                        }
                        else if (number > 25 && number <= 30) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "409.22385905660644");
                        }
                        else if (number > 30 && number <= 35) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "395.74642657270624");
                        }
                        else if (number > 35 && number <= 40) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "380.3554535791462");
                        }
                        else if (number >40 && number <= 45) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "380.3554535791462");
                        }
                        else if (number > 45 && number <= 50) {
							takersltdscore.setAttribute("stroke-dasharray", "372.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "367.3554535791462");
                        }
                        else if (number > 50 && number <= 55) {
							takersltdscore.setAttribute("stroke-dasharray", "385.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 55 && number <= 60) {
							takersltdscore.setAttribute("stroke-dasharray", "395.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 60 && number <= 65) {
							takersltdscore.setAttribute("stroke-dasharray", "400.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 65 && number <= 70) {
							takersltdscore.setAttribute("stroke-dasharray", "420.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 70 && number <= 75) {
							takersltdscore.setAttribute("stroke-dasharray", "430.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 75 && number <= 80) {
							takersltdscore.setAttribute("stroke-dasharray", "445.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 80 && number <= 85) {
							takersltdscore.setAttribute("stroke-dasharray", "460.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 85 && number <= 90) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else if (number > 90 && number <= 95) {
							takersltdscore.setAttribute("stroke-dasharray", "505.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                        else {
							takersltdscore.setAttribute("stroke-dasharray", "517.0884539600077");
							takersltdscore.setAttribute("stroke-dashoffset", "220.53980428200347");
                        }
                    }
                    }
			})
	}
</script>
<script>
	var selectedsemValues = [];
	document.getElementById("sem1").addEventListener("click", handleClick);
	document.getElementById("sem2").addEventListener("click", handleClick);
	document.getElementById("sem3").addEventListener("click", handleClick);
	document.getElementById("sem4").addEventListener("click", handleClick);
	document.getElementById("sem5").addEventListener("click", handleClick);
	document.getElementById("sem6").addEventListener("click", handleClick);
	document.getElementById("sem7").addEventListener("click", handleClick);
	document.getElementById("sem8").addEventListener("click", handleClick);
	document.getElementById("sem9").addEventListener("click", handleClick);
	document.getElementById("sem10").addEventListener("click", handleClick);

	function handleClick(event) {
		event.target.classList.toggle('semclicked');
		var semvalue = event.target.innerText;
		selectedsemValues.push(semvalue);
		var semstring = selectedsemValues.join(', ');
		const semtoform = document.getElementById("semmainrval");
		semtoform.value = semstring;
	}
	const semform = document.querySelector('#semform');
	// semform.addEventListener('submit', checkingsem);
	// function checkingsem(){
	// 	event.preventDefault();
	// 	// const confirmingsem = document.getElementById("semmainrval").value;
	// 	// alert("The final values are: "+ confirmingsem);
	// }
	const handleSubmit3 = async (e) => {
        e.preventDefault()

        const data = new FormData(semform)
		const edtrmainval = document.getElementById("edtrmainval").value;
        // user's chatstripe
        // chatContainer1.innerHTML += chatStripe(false, data.get('semmainrval'))

        // to clear the textarea input
        semform.reset()

        // bot's chatstripe
        const uniqueId = generateUniqueId1()
        chatContainer1.innerHTML += chatStripe(true, " ", uniqueId)

        // to focus scroll to the bottom
        chatContainer1.scrollTop = chatContainer1.scrollHeight;

        // specific message div
        const messageDiv = document.getElementById(uniqueId)

        // messageDiv.innerHTML = "..."
        loader1(messageDiv)
        const response1 = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                _token: token,
                prompt: "write about " + edtrmainval + " having these keywords " +data.get('semmainrval'),
                old_prompt: data.get('old_prompt')
            })
        })

        clearInterval(loadInterval)
        messageDiv.innerHTML = " "

        if (response1.ok) {
			// $('#ai-loader').hide();
            // $('#ans_div').show();
            const data = await response1.json();
            const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
            $('#old_prompt').val(data.old_prompt)
			typeText1(messageDiv, parsedData);
        } else {
            const err = await response1.text()
			// $('#ai-loader').hide();
            // $('#ans_div').show();
			// $('#norspnse').hide();
            // $('#sww').show();
            messageDiv.innerHTML = "Something went wrong"
            alert(err)
        }
    }

    semform.addEventListener('submit', handleSubmit3)

    semform.addEventListener('keyup', (e) => {
        if (e.keyCode === 13) {
            handleSubmit3(e)
        }
    })
</script>
<script>
	const tt1 = document.querySelector("#tt1");
	const tt2 = document.querySelector("#tt2");
	const tt3 = document.querySelector("#tt3");
	const tt4 = document.querySelector("#tt4");
	const tt5 = document.querySelector("#tt5");
	const edtrmainval1 = document.getElementById("edtrmainval");
	const edtrtvval = document.getElementById("edtrtvval");
	const edtrtvvalmain = document.getElementById("edtrtvvalmain");
	const ttgenm = document.getElementById("ttgenm");
	var originalText = edtrtvval.value;
	var truncatedText = originalText.slice(0, 21);
	if (originalText.length > 21) {
	truncatedText += "...";
	}
	edtrtvvalmain.innerHTML = truncatedText;
	ttgenm.addEventListener("click", function(event) {
		$('#ttgenshow').show();
		ttgenm.disabled = true;
		ttgenm.className = "edtrdisabled";
		// ttcustomDiv2.style.display = "block";
		// ttcustomDiv2.style.zIndex = "9999";
	});
	tt1.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt2.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt3.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt4.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt5.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt6.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt7.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt8.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt9.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tt10.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrmainval1.value = divText;
	});
	tv1.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv2.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv3.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv4.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv5.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv6.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv7.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv8.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv9.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});
	tv10.addEventListener("click", function(event) {
		const divText = this.innerText;
		edtrtvval.value = divText;
		var originalText = divText;
		var truncatedText = originalText.slice(0, 21);
		if (originalText.length > 21) {
		truncatedText += "...";
		}
		edtrtvvalmain.innerHTML = truncatedText;
		$("#toneModal").hide();
	});

</script>
<script>
	// var h1place = document.getElementById("h1place");
	var h2place = document.getElementById("h2place");
	var h3place = document.getElementById("h3place");
	// var bplace = document.getElementById("bplace");
	var iplace = document.getElementById("iplace");
	var ulplace = document.getElementById("ulplace");
	var olplace = document.getElementById("olplace");
	var cplace = document.getElementById("cplace");
	var aplace = document.getElementById("aplace");
	var cpplace = document.getElementById("cpplace");
	var contentEditable = document.getElementById("forscoring");
	var selectedText = "";
	cpplace.addEventListener('mouseover', function() {
		var hoverDiv = document.querySelector('.cpyhvtext');
		hoverDiv.style.display = 'block';
	});

	cpplace.addEventListener('mouseout', function() {
		var hoverDiv = document.querySelector('.cpyhvtext');
		hoverDiv.style.display = 'none';
	});
	cpplace.addEventListener("click", function() {
		var editableDiv = document.getElementById("forscoring");
		var selectedRange = window.getSelection().getRangeAt(0);

		if (!selectedRange.toString()) {
			var range = document.createRange();
			range.selectNodeContents(editableDiv);
			window.getSelection().removeAllRanges();
			window.getSelection().addRange(range);
		}

		try {
			document.execCommand("copy");
			console.log("Text copied to clipboard.");
		} catch (err) {
			console.error("Unable to copy text: ", err);
		}

		window.getSelection().removeAllRanges();
		var cpydone = document.getElementById("cpydone");
		cpydone.classList.remove("edtrhidden");
		setTimeout(function() {
		cpydone.classList.add("edtrhidden");
		}, 3000);
	});
	aplace.addEventListener("click", function() {
		var selection = window.getSelection();
		var range = selection.getRangeAt(0);

		if (!selection.isCollapsed) {
			var linkUrl = prompt("Enter the URL for the link:");

			if (linkUrl) {
			var linkElement = document.createElement("a");
			linkElement.href = linkUrl;
			linkElement.textContent = selection.toString();

			range.deleteContents();
			range.insertNode(linkElement);
			}
		}
	});
	cplace.addEventListener("click", function() {
		var selection = window.getSelection();
		var range = selection.getRangeAt(0);

		if (!selection.isCollapsed) {
			var commentSpan = document.createElement("div");
			commentSpan.className = "edtrcomment";
			commentSpan.textContent = selection.toString();
			range.deleteContents();
			range.insertNode(commentSpan);
		}
	}); 
    function h1place() {
        var selection = window.getSelection();
        selectedText = selection.toString(); // Store the selected text
        var h1Element = document.createElement("h1");
        h1Element.innerHTML = selectedText;
        selection.getRangeAt(0).surroundContents(h1Element);
    }
    function h2placenew() {
        if (selectedText !== "") {
            var h1Elements = document.getElementsByTagName("h1");
            for (var i = 0; i < h1Elements.length; i++) {
                if (h1Elements[i].innerHTML === selectedText) {
                    var h2Element = document.createElement("h2");
                    h2Element.innerHTML = selectedText;
                    h1Elements[i].parentNode.replaceChild(h2Element, h1Elements[i]);
                    break;
                }
            }
        }
    }
	// h1place.addEventListener("click", function() {
	// 	var selection = window.getSelection();
	// 	var range = selection.getRangeAt(0);
	// 	var h1Element = document.createElement("h1");
	// 	h1Element.appendChild(range.extractContents());
	// 	range.insertNode(h1Element);
	// });
	h2place.addEventListener("click", function() {
		var selection = window.getSelection();
		var range = selection.getRangeAt(0);
		var h2Element = document.createElement("h2");
		h2Element.appendChild(range.extractContents());
		range.insertNode(h2Element);
	});
	h3place.addEventListener("click", function() {
		var selection = window.getSelection();
		var range = selection.getRangeAt(0);
		var h3Element = document.createElement("h3");
		h3Element.appendChild(range.extractContents());
		range.insertNode(h3Element);
	});
	function bplace() {
            var selection = window.getSelection();
            var range = selection.getRangeAt(0);
            var boldElement = document.createElement("span");

            if (range.commonAncestorContainer.parentNode.classList.contains("bold")) {
                // Remove bold if already applied
                range.commonAncestorContainer.parentNode.classList.remove("bold");
            } else {
                // Apply bold if not already applied
                boldElement.innerHTML = range.extractContents().textContent;
                boldElement.classList.add("bold");
                range.insertNode(boldElement);
            }
			selection.removeAllRanges();
        }
	// bplace.addEventListener("click", function() {
	// 	var selection = window.getSelection();
	// 	var range = selection.getRangeAt(0);
	// 	var boldElement = document.createElement("b");
	// 	boldElement.appendChild(range.extractContents());
	// 	range.insertNode(boldElement);
	// });
	iplace.addEventListener("click", function() {
		var selection = window.getSelection();
		var range = selection.getRangeAt(0);
		var boldElement = document.createElement("i");
		boldElement.appendChild(range.extractContents());
		range.insertNode(boldElement);
	});
	ulplace.addEventListener("click", function() {
		var selectedText = window.getSelection().toString().trim();
		
		if (selectedText !== "") {
			var lines = selectedText.split("\n");
			var listHtml = "<ul>";
			
			lines.forEach(function(line) {
			listHtml += "<li>" + line + "</li>";
			});
			
			listHtml += "</ul>";
			
			// Replace selected text with the list
			document.execCommand("insertHTML", false, listHtml);
		}
	});
	olplace.addEventListener("click", function() {
		var selectedText = window.getSelection().toString().trim();
		
		if (selectedText !== "") {
			var lines = selectedText.split("\n");
			var listHtml = "<ol>";
			
			lines.forEach(function(line) {
			listHtml += "<li>" + line + "</li>";
			});
			
			listHtml += "</ol>";
			
			// Replace selected text with the list
			document.execCommand("insertHTML", false, listHtml);
		}
	});
</script>
@endsection
