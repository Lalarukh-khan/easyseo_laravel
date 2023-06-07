@extends('layouts.front')
@section('after-css')
@endsection
@section('content')
@include('components.flash-message')

<div class="container">
    <div class="row">
		<div class="col-xl-8 col-lg-8 col-8">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<i class="bx bx-arrow-back" id="edtrback"></i>
					<input type="text" name="docname" placeholder="Untitled document" class="edtdocrname">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
					<div class="edtrhd">H1</div>
					<div class="edtrhd">H2</div>
					<div class="edtrhd">H3</div>
					<div class="edtrhd">B</div>
					<div class="edtrhd"><span class="bx bx-italic"></span></div>
					<div class="edtrhd"><span class="bx bx-list-ul"></span></div>
					<div class="edtrhd"><span class="bx bx-list-ol"></span></div>
					<div class="edtrhd"><span class="bx bx-comment"></span></div>
					<div class="edtrhd"><span class="bx bx-link-alt"></span></div>
					<div class="edtrhd"><span class="bx bx-copy"></span></div>
					<!-- <div style="text-align: right; display: inline-block;">
						<button class="edtrgnrt"><i class="bx bx-edit-alt"></i> Generate</button>
					</div> -->
				</div>
				<div class="col-lg-2 col-md-2 col-sm-12 col-12">
					<button class="edtrgnrt"><i class="bx bx-edit-alt"></i> Generate</button>
				</div>
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
							<p class="edtrrws">Professional, informat..</p>
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
						<div style="text-align: right;">
							<p class="edtrttm">Meta desc + Visualisation <i class="bx bx-chevron-down"></i></p>
						</div>
					</div>
					<div id="ai-loader1" style="text-align:center;display:none">
						<img src="{{asset('front')}}/images/ai-loader1.gif" alt="ai-loader" style="width:100%; height: auto;">
					</div>
					<div id="ans_div1" style="display:none" contenteditable="true">
						<div id="resultdata" style="display: none !important;"></div>
						<div class="edtrval" id="extrcttngrsltdata"></div>
						<div id="quesdata"></div>
					</div>
				</div>
				<div class="edtrbtrwf">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12 edtrinput-container">
							<input type="text" placeholder="Fill in instructions for the AI or choose from list" class="edtrchoosefrmlist" id="edtrmyInput">
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
									<svg viewBox="0 0 200 160" class="w-full block px-12 relative"><defs><linearGradient id="gradient0.7493432638616075" x1="99%" y1="41%" x2="1%" y2="59%"><stop offset="5.56%" stop-color="#FA517D"></stop><stop offset="39.64%" stop-color="#E49F32"></stop><stop offset="98.89%" stop-color="#43D975"></stop></linearGradient><filter id="filter0_i_6_30" x="0.432007" y="0" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dx="4" dy="4"></feOffset><feGaussianBlur stdDeviation="2"></feGaussianBlur><feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"></feComposite><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"></feColorMatrix><feBlend mode="normal" in2="shape" result="effect1_innerShadow_6_30"></feBlend></filter></defs><circle filter="url(#filter0_i_6_30)" transform="rotate(171 100 100)" id="path" cx="100" cy="100" r="78" stroke-width="28" stroke-dasharray="490.0884539600077" stroke-dashoffset="220.53980428200347" fill="none" stroke="#504E58" stroke-linecap="butt"></circle><circle class="drop-shadow" transform="rotate(171 100 100)" id="takersltdscore" cx="100" cy="100" r="78" stroke-width="28" stroke-dasharray="490.0884539600077" stroke-dashoffset="247.49466924980385" fill="none" stroke="url(#gradient0.7493432638616075)" stroke-linecap="butt" style="transition: stroke-dashoffset 0.5s ease 0s;"></circle></svg>
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
									<div id="sem11" class="semall"></div>
									<div id="sem12" class="semall"></div>
									<div id="sem13" class="semall"></div>
									<div id="sem14" class="semall"></div>
									<div id="sem15" class="semall"></div>
									<div id="sem16" class="semall"></div>
									<div id="sem17" class="semall"></div>
									<div id="sem18" class="semall"></div>
									<div id="sem19" class="semall"></div>
									<div id="sem20" class="semall"></div>
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
<div class="customdiv" id="ttcustomDiv">
	<div class="row cstdvfd">
		<div class="col-lg-10 col-md-10 col-sm-10 col-10">
			<p class="cstmtttp">Title Competitive Score (TCS)</p>
		</div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-2" style="text-align: center;">
			<button type="button" class="btn-close" id="closettdiv" style="margin-top: 5px; color: #fff !important;"></button>
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
			<h4 class="audttlistval edtnbrdrbtm" id="tt5"></h4>
		</div>
		<br>
		<div class="text-center">
			<button class="ttgenm">Generate more</button>
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
			<input type="text" class="edtraudinp" value="Professional, informative, straightforward; Write clearly and concisely.">
		</div>
		<h4 class="edtraudfr">Frequent used  Tone of voice</h4>
		<div class="audttonelist">
			<h4 class="audtonelistval">Formal, Professional: Showcase your expertise and attention to detail.</h4>
			<h4 class="audtonelistval">Persuasive, Compelling: Inspire the reader to take action using solid arguments and emotional appeals.</h4>
			<h4 class="audtonelistval">Conversational, Friendly: Use a casual tone, as if you were talking to a close friend.</h4>
			<h4 class="audtonelistval">Analytical, Data-Driven: Present logical arguments and support your claims with evidence.</h4>
			<h4 class="audtonelistval">First Person, Personal Experience: In the first person, use vivid language and sensory details to bring the experience to life.</h4>
			<h4 class="audtonelistval">Sales-oriented, Persuasive: Create a sense of urgency and highlight the product or service's benefits.</h4>
			<h4 class="audtonelistval">Empathetic, Compassionate: Connect with the reader emotionally and show that you understand their struggles.</h4>
			<h4 class="audtonelistval">Optimistic, Upbeat: Inspire hope and positivity, even in difficult situations.</h4>
			<h4 class="audtonelistval">Steve Jobs, Visionary: Use persuasive rhetoric to motivate the audience.</h4>
			<h4 class="audtonelistval edtnbrdrbtm">Oprah Winfrey, Empowerment: Connect with readers emotionally and encourage personal growth.</h4>
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
    $(window).on('load', function() {
        $('#exampleModalCenter').modal('show');
    });
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

	document.addEventListener("click", function(event) {
	if (event.target !== edtrmainval && event.target !== ttcustomDiv) {
		ttcustomDiv.style.display = "none";
		ttcustomDiv.style.zIndex = "-1";
	}
	});
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
		$('#ai-loader1').show();
    	$('#ans_div').hide();
    	$('#ans_div1').hide();
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
			// write long paragraph in double qoutes and write 9 questions in ordered list and 21 semantic keywords in ordered list without double qoutes about
            body: JSON.stringify({
                _token: token,
                prompt: 'write Introduction and Details about ' + data.get('prompt'),
                old_prompt: data.get('old_prompt')
            })
        })
		const majorprompt = data.get('prompt');
		const majoroldprompt = data.get('old_prompt');
        clearInterval(loadInterval)
        messageDiv.innerHTML = " "

        if (response.ok) {
			$('#ai-loader1').hide();
			$('#ans_div1').show();
            const data = await response.json();
            const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
			typeText(messageDiv, parsedData);
            $('#old_prompt').val(data.old_prompt);
			extrcttngrsltdata.innerHTML = parsedData;
				const response2 = await fetch(apiUrl, {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
					},
					body: JSON.stringify({
						_token: token,
						prompt: 'write firstly 9 questions and then 21 semantic keywords in ordered list about ' + majorprompt,
						old_prompt: majoroldprompt
					})
				})

				clearInterval(loadInterval)
				messageDiv.innerHTML = " "

				if (response2.ok) {
					$('#ai-loader').hide();
					$('#ans_div').show();
					const data = await response2.json();
					const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
					$('#old_prompt').val(data.old_prompt);
					// const div = document.getElementById(newval);
					document.getElementById("edtrtrgtkwrd").innerHTML = majorprompt;
					const content = String(parsedData);
					const startWord1 = "1.";
					const endWord1 = "9.";
					const startWord2 = "1.";
					const endWord2 = "21.";
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

						const upprcontnt = extrcttngrsltdata.innerHTML;
						const score = upprcontnt + " " + content;
						getSeoScore(score);

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
						startText2_11 = "11.";
						endText2_11 = "12.";
						const startIndex2_11 = semantics.indexOf(startText2_11);
						const endIndex2_11 = semantics.indexOf(endText2_11);
						if (startIndex2_11 !== -1 && endIndex2_11 !== -1 && startIndex2_11 < endIndex2_11) {
							const trimmedContent2_11 = semantics.substring(startIndex2_11 + startText2_11.length, endIndex2_11);
							const sem11 = document.getElementById("sem11");
							sem11.innerHTML = trimmedContent2_11;
						}
						startText2_12 = "12.";
						endText2_12 = "13.";
						const startIndex2_12 = semantics.indexOf(startText2_12);
						const endIndex2_12 = semantics.indexOf(endText2_12);
						if (startIndex2_12 !== -1 && endIndex2_12 !== -1 && startIndex2_12 < endIndex2_12) {
							const trimmedContent2_12 = semantics.substring(startIndex2_12 + startText2_12.length, endIndex2_12);
							const sem12 = document.getElementById("sem12");
							sem12.innerHTML = trimmedContent2_12;
						}
						startText2_13 = "13.";
						endText2_13 = "14.";
						const startIndex2_13 = semantics.indexOf(startText2_13);
						const endIndex2_13 = semantics.indexOf(endText2_13);
						if (startIndex2_13 !== -1 && endIndex2_13 !== -1 && startIndex2_13 < endIndex2_13) {
							const trimmedContent2_13 = semantics.substring(startIndex2_13 + startText2_13.length, endIndex2_13);
							const sem13 = document.getElementById("sem13");
							sem13.innerHTML = trimmedContent2_13;
						}
						startText2_14 = "14.";
						endText2_14 = "15.";
						const startIndex2_14 = semantics.indexOf(startText2_14);
						const endIndex2_14 = semantics.indexOf(endText2_14);
						if (startIndex2_14 !== -1 && endIndex2_14 !== -1 && startIndex2_14 < endIndex2_14) {
							const trimmedContent2_14 = semantics.substring(startIndex2_14 + startText2_14.length, endIndex2_14);
							const sem14 = document.getElementById("sem14");
							sem14.innerHTML = trimmedContent2_14;
						}
						startText2_15 = "15.";
						endText2_15 = "16.";
						const startIndex2_15 = semantics.indexOf(startText2_15);
						const endIndex2_15 = semantics.indexOf(endText2_15);
						if (startIndex2_15 !== -1 && endIndex2_15 !== -1 && startIndex2_15 < endIndex2_15) {
							const trimmedContent2_15 = semantics.substring(startIndex2_15 + startText2_15.length, endIndex2_15);
							const sem15 = document.getElementById("sem15");
							sem15.innerHTML = trimmedContent2_15;
						}
						startText2_16 = "16.";
						endText2_16 = "17.";
						const startIndex2_16 = semantics.indexOf(startText2_16);
						const endIndex2_16 = semantics.indexOf(endText2_16);
						if (startIndex2_16 !== -1 && endIndex2_16 !== -1 && startIndex2_16 < endIndex2_16) {
							const trimmedContent2_16 = semantics.substring(startIndex2_16 + startText2_16.length, endIndex2_16);
							const sem16 = document.getElementById("sem16");
							sem16.innerHTML = trimmedContent2_16;
						}
						startText2_17 = "17.";
						endText2_17 = "18.";
						const startIndex2_17 = semantics.indexOf(startText2_17);
						const endIndex2_17 = semantics.indexOf(endText2_17);
						if (startIndex2_17 !== -1 && endIndex2_17 !== -1 && startIndex2_17 < endIndex2_17) {
							const trimmedContent2_17 = semantics.substring(startIndex2_17 + startText2_17.length, endIndex2_17);
							const sem17 = document.getElementById("sem17");
							sem17.innerHTML = trimmedContent2_17;
						}
						startText2_18 = "18.";
						endText2_18 = "19.";
						const startIndex2_18 = semantics.indexOf(startText2_18);
						const endIndex2_18 = semantics.indexOf(endText2_18);
						if (startIndex2_18 !== -1 && endIndex2_18 !== -1 && startIndex2_18 < endIndex2_18) {
							const trimmedContent2_18 = semantics.substring(startIndex2_18 + startText2_18.length, endIndex2_18);
							const sem18 = document.getElementById("sem18");
							sem18.innerHTML = trimmedContent2_18;
						}
						startText2_19 = "19.";
						endText2_19 = "20.";
						const startIndex2_19 = semantics.indexOf(startText2_19);
						const endIndex2_19 = semantics.indexOf(endText2_19);
						if (startIndex2_19 !== -1 && endIndex2_19 !== -1 && startIndex2_19 < endIndex2_19) {
							const trimmedContent2_19 = semantics.substring(startIndex2_19 + startText2_19.length, endIndex2_19);
							const sem19 = document.getElementById("sem19");
							sem19.innerHTML = trimmedContent2_19;
						}
						startText2_20 = "20.";
						endText2_20 = "21.";
						const startIndex2_20 = semantics.indexOf(startText2_20);
						const endIndex2_20 = semantics.indexOf(endText2_20);
						if (startIndex2_20 !== -1 && endIndex2_20 !== -1 && startIndex2_20 < endIndex2_20) {
							const trimmedContent2_20 = semantics.substring(startIndex2_20 + startText2_20.length, endIndex2_20);
							const sem20 = document.getElementById("sem20");
							sem20.innerHTML = trimmedContent2_20;
						}

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
						
					const response3 = await fetch(apiUrl, {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json',
						},
						body: JSON.stringify({
							_token: token,
							prompt: 'suggest 6 detailed titles in ordered list based upon ' + majorprompt,
							old_prompt: majoroldprompt
						})
					})
					if (response3.ok) {
						const data = await response3.json();
						const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
						$('#old_prompt').val(data.old_prompt);
						const sugtitles = String(parsedData);
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
					}
					else {
						const err = await response3.text();
						messageDiv.innerHTML = "Something went wrong"
						alert(err)
					}
					}
				} else {
					const err = await response2.text()
					$('#ai-loader').hide();
					$('#ans_div').show();
					$('#ai-loader1').hide();
					$('#ans_div1').show();
					$('#norspnse').hide();
					$('#sww').show();
					messageDiv.innerHTML = "Something went wrong"
					alert(err)
				}
        } else {
            const err = await response.text()
			$('#ai-loader').hide();
            $('#ans_div').show();
			$('#ai-loader1').hide();
            $('#ans_div1').show();
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
			$('#ai-loader').hide();
            $('#ans_div').show();
            const data = await response1.json();
            const parsedData = data.bot.trim() // trims any trailing spaces/'\n'
            $('#old_prompt').val(data.old_prompt)
			typeText1(messageDiv, parsedData);
        } else {
            const err = await response1.text()
			$('#ai-loader').hide();
            $('#ans_div').show();
			$('#norspnse').hide();
            $('#sww').show();
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
	// const edtrjstwm = document.getElementById("edtrjstwm");
	const edtrmyInput = document.getElementById("edtrmyInput");
	const contentform = document.getElementById("contentform");
	const mncontent = document.getElementById("mncontent");
	const getmnval = document.getElementById("getmnval");
	// edtrjstwm.addEventListener("click", function(event) {
	// 	const innerText = edtrmyInput.value;
	// 	mncontent.value = innerText;
	// 	const edtrmainval = document.getElementById("edtrmainval").value;
	// 	getmnval.value = edtrmainval;
	// 	const totalmainvalue = mncontent.value + " of " + getmnval.value;
	// 	document.getElementById("mainrval").value =  totalmainvalue;
	// 	event.preventDefault();
	// 	document.getElementById("mnsubmit").click();
	// });
	edtrpara.addEventListener("click", function(event) {
		const innerText = edtrpara.innerText;
		mncontent.value = innerText;
		const edtrmainval = document.getElementById("edtrmainval").value;
		getmnval.value = edtrmainval;
		const totalmainvalue =  mncontent.value + " of " + getmnval.value;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrttls.addEventListener("click", function(event) {
		const innerText = edtrttls.innerText;
		mncontent.value = innerText;
		const edtrmainval = document.getElementById("edtrmainval").value;
		getmnval.value = edtrmainval;
		const totalmainvalue = mncontent.value + " of " + getmnval.value;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrshd.addEventListener("click", function(event) {
		const innerText = edtrshd.innerText;
		mncontent.value = innerText;
		const edtrmainval = document.getElementById("edtrmainval").value;
		getmnval.value = edtrmainval;
		const totalmainvalue = mncontent.value + " of " + getmnval.value;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrint.addEventListener("click", function(event) {
		const innerText = edtrint.innerText;
		mncontent.value = innerText;
		const edtrmainval = document.getElementById("edtrmainval").value;
		getmnval.value = edtrmainval;
		const totalmainvalue = mncontent.value + " of " + getmnval.value;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	edtrfct.addEventListener("click", function(event) {
		const innerText = edtrfct.innerText;
		mncontent.value = innerText;
		const edtrmainval = document.getElementById("edtrmainval").value;
		getmnval.value = edtrmainval;
		const totalmainvalue =  mncontent.value + " of " + getmnval.value;
		document.getElementById("mainrval").value =  totalmainvalue;
		event.preventDefault();
		document.getElementById("mnsubmit").click();
	});
	const handleSubmit2 = async (e) => {
        e.preventDefault()

        const data = new FormData(cntntform)

        // user's chatstripe
        chatContainer1.innerHTML += chatStripe(false, data.get('mainrval'))

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
                        const numberEl = document.getElementById("resulted_score");
                        const number = parseInt(numberEl.textContent);
						const takersltdscore = document.getElementById("takersltdscore");
                        if (number <= 40) {
							takersltdscore.setAttribute("stroke-dasharray", "368.0884539600077");
                        }
                        else if (number > 40 && number <= 50) {
							takersltdscore.setAttribute("stroke-dasharray", "372.0884539600077");
                        }
                        else if (number > 50 && number <= 55) {
							takersltdscore.setAttribute("stroke-dasharray", "385.0884539600077");
                        }
                        else if (number > 55 && number <= 60) {
							takersltdscore.setAttribute("stroke-dasharray", "395.0884539600077");
                        }
                        else if (number > 60 && number <= 65) {
							takersltdscore.setAttribute("stroke-dasharray", "400.0884539600077");
                        }
                        else if (number > 65 && number <= 70) {
							takersltdscore.setAttribute("stroke-dasharray", "420.0884539600077");
                        }
                        else if (number > 70 && number <= 75) {
							takersltdscore.setAttribute("stroke-dasharray", "430.0884539600077");
                        }
                        else if (number > 75 && number <= 80) {
							takersltdscore.setAttribute("stroke-dasharray", "445.0884539600077");
                        }
                        else if (number > 80 && number <= 85) {
							takersltdscore.setAttribute("stroke-dasharray", "460.0884539600077");
                        }
                        else if (number > 85 && number <= 90) {
							takersltdscore.setAttribute("stroke-dasharray", "490.0884539600077");
                        }
                        else if (number > 90 && number <= 95) {
							takersltdscore.setAttribute("stroke-dasharray", "505.0884539600077");
                        }
                        else {
							takersltdscore.setAttribute("stroke-dasharray", "517.0884539600077");
                        }
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
	document.getElementById("sem11").addEventListener("click", handleClick);
	document.getElementById("sem12").addEventListener("click", handleClick);
	document.getElementById("sem13").addEventListener("click", handleClick);
	document.getElementById("sem14").addEventListener("click", handleClick);
	document.getElementById("sem15").addEventListener("click", handleClick);
	document.getElementById("sem16").addEventListener("click", handleClick);
	document.getElementById("sem17").addEventListener("click", handleClick);
	document.getElementById("sem18").addEventListener("click", handleClick);
	document.getElementById("sem19").addEventListener("click", handleClick);
	document.getElementById("sem20").addEventListener("click", handleClick);

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
</script>
@endsection
