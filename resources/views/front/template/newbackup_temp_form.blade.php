@extends('layouts.front')
@section('after-css')
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>
<style>
	header{
		display: none !important;
	}
	.alert-success{
		display: none !important;
	}
	.alert-danger{
		display: none !important;
	}
	.custom-loader {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        padding: 1px;
        background: conic-gradient(#0000 10%, #766DF4) content-box;
        -webkit-mask:
            repeating-conic-gradient(#0000 0deg, #000 1deg 20deg, #0000 21deg 36deg),
            radial-gradient(farthest-side, #0000 calc(100% - 25px), #000 calc(100% - 25px));
        -webkit-mask-composite: destination-in;
        mask-composite: intersect;
        animation: s4 1s infinite steps(10);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #ai-loader{
        text-align: center;
        display: none;
        justify-content: center;
        align-items: center;
        padding-top: 182px;
    }

    #loader-text {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        left: -140px;
        top: 3px;
        font-size: 18px;
        font-weight: 600;
    }

    @keyframes s4 {
      to {
        transform: rotate(1turn)
      }
    }
</style>
@endsection
@section('content')
<!--breadcrumb-->
{{-- <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Template</li>
                <li class="breadcrumb-item active" aria-current="page">{{$template_data->name}}</li>
            </ol>
        </nav>
    </div>
</div> --}}
@include('components.flash-message')
<div class="container-fluid temptotop">
	<div class="row">
		<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
			<div class="toplefttemp">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-3 col-3">
						<div class="tempsideimg">
							<img src="{{asset($template_data->icon)}}" alt="template logo" style="width: 70%; height: auto;">
						</div>
					</div>
					<div class="col-lg-10 col-md-10 col-sm-9 col-9">
						<h3 style=" color: black; ">{{$template_data->name}} &nbsp; <i class="bx bx-star"></i></h3>
						<p style="color: #b6b6b6;">{{$template_data->description}}</p>
					</div>
				</div>
			</div>
			<div class="container">
				<form id="content_form">
                    @csrf
                    <input type="hidden" name="command" value="{{$template_data->command_box}}">
                    <input type="hidden" name="setting" value="{{$template_data->setting ?? ''}}">
                    <input type="hidden" name="template_id" value="{{$template_data->id}}">
                    <input type="hidden" name="template_name" value="{{$template_data->name}}">
                    @foreach ($template_data->fields as $k => $item)
                    @if ($item->type == 'short_text')
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <p>{{$item->title}}
                                @if (!empty($item->info))
                                <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="{{$item->info}}">
                                </i>
                                @endif
                            </p>
                            {{-- <p class="float-right update_length_{{$k}}">0/800</p> --}}
                        </div>
                        <input type="text" class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" placeholder="{{$item->placeholder}}"  required>
                    </div>
                    @endif 
                    @if ($item->type == 'medium_text')
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <p>{{$item->title}}
                                @if (!empty($item->info))
                                <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="{{$item->info}}">
                                </i>
                                @endif
                            </p>
                            {{-- <p class="float-right update_length_{{$k}}">0/140</p> --}}
                        </div>
                        <textarea class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" id="" rows="3"
                            required>{{$item->placeholder}} </textarea>
                    </div>
                    @endif
                    @if ($item->type == 'long_text')
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <p>{{$item->title}}
                                @if (!empty($item->info))
                                <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="{{$item->info}}">
                                </i>
                                @endif
                            </p>
                            {{-- <p class="float-right update_length_{{$k}}">0/800</p> --}}
                        </div>
                        <textarea class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" id="" rows="3"
                            required>{{$item->placeholder}} </textarea>
                    </div>
                    @endif
                    @if ($item->type == 'number')
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <p>{{$item->title}}
                                @if (!empty($item->info))
                                <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                    title="{{$item->info}}">
                                </i>
                                @endif
                            </p>
                            {{-- <p class="float-right update_length_{{$k}}">0/2</p> --}}
                        </div>
                        <input type="number" class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" placeholder="{{$item->placeholder}}"  required>
                    </div>
                    @endif
                    @if ($item->type == 'dropdown')
                    @php
                    $select_option = explode(',',$item->placeholder);
                    @endphp
                    <div class="form-group col-lg-12 col-md-12 mb-3">
                        <p>{{$item->title}}
                            @if (!empty($item->info))
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="{{$item->info}}">
                            </i>
                            @endif
                        </p>
                        <select name="input[text{{++$k}}]" class="form-control basic" required>
                            <option value="">Select Option</option>
                            @foreach ($select_option as $option)
                            <option value="{{$option}}">{{$option}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @endforeach

                    @if ($template_data->has_language == 1)
                        <div class="form-group col-md-12 mb-3">
                            <label for="">Langauge</label>
                            <select name="language" id="language" class="form-control selectpicker"
                                data-live-search="true" data-container="body" required>
                                <x-language-dropdown />
                            </select>
                        </div>
                    @endif

                    @if ($template_data->has_number_of_concepts == 1)
                   {{-- <div class="form-group col-md-12 mb-3">
                        <label for="">Number of Conecpet</label>
                        <input type="number" name="number_of_conecpet" class="form-control"
                                value="1" min="1" max="5" required>
                    </div> --}} 
                    @endif
					<div class="row genbtntmpbt">
						<div class="col-lg-4 col-md-4 col-sm-4 col-4">
							<button class="clrtempimp"><i class="bx bx-x"></i> Clear inputs</button>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-8 col-8"></div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-6">
							<!-- <input type="text" name="" id="" value="3" class="tempbotinp"> -->
							<input type="text" id="numberInput" min="1" max="3" value="3" class="tempbotinp">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        	<button class="btn btn-info nwtmcreatecontent" type="button" id="form_submit">Generate</button>
						</div>
					</div>
                </form>
			</div>
		</div>
		<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12" id="temprghtsec">
			<div id="ai-loader" style="text-align:center;">
                    {{-- <img src="{{asset('admin_assets')}}/assets/images/ai-loader.gif" alt=""> --}}
                    {{-- <img src="{{asset('admin_assets')}}/assets/images/new-ai-loader.gif" alt=""> --}}

                    {{-- <img src="{{asset('front')}}/images/ai-loader.gif" alt="ai-loader"> --}}
                    <div class="custom-loader"></div>
                    <span id="loader-text">Generating</span>
            </div>
			<div class="form-group" id="ans_div" style="display:none;">
					<div class="toprightemp">
						<!-- <div class="row">
							<div class="col-lg-3 col-md-3 col-sm-4 col-4">
								<button class="tmpnwotp">New outputs <span class="tmpnwotpsp" id="tmpnwotpsp"></span></button>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-3 col-3">
								<p class="tmphistry">History</p>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-5 col-5">
								<p class="tmpclr">Clear</p>
							</div>
						</div> -->
						<button class="tmpnwotp">New outputs <span class="tmpnwotpsp" id="tmpnwotpsp"></span></button>
					</div>
					<div class="row" id="tmprsltdwholebox">
						<div id="frbrdrbtm" style="display: none;">
								<br>
								<br>
								<p class="rsltdvbrdrbtm"> </p>
						</div>
						<!-- <div class="row">
							<div class="col-lg-8"></div>
							<div class="col-lg-1">
									<div id="resulted_phrase"></div>
							</div>
							<div class="col-lg-3"></div>
						</div> -->
						<div class="row"> 
							<div class="col-lg-8">
								<div name="" id="first_result_div" class="tempfrstrsltdiv"></div>
							</div>
							<div class="col-lg-1" style="padding-top: 20px; margin-left: -70px" >
									<div id="resulted_phrase"></div>
							</div>
							<div class="col-lg-3"></div>
						</div>
						<!-- <div style="display:none;" id="takeimpcntnt">
						<div class="row">
							<div class="col-lg-4">
							<button class="mt-4 btn btn-info nwtmimpscrbtn" id="impscore" >Improve Score</button>
							</div>
							<div class="col-lg-8"></div>
						</div>
						</div> -->
						<br>
                        <textarea name="content" id="details" cols="30" rows="10" style="display: none !important;"></textarea>
                        {{--<form action="{{route('user.template.form_seo_score')}}" method="post">--}}
                        <form id="seo_content_form" style="display: none !important;">
                            @csrf
                            <input type="text" name="score" id="formscore">
                            <input type="text" name="temp_id" id="temp_id">
                        </form>
                    </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('page-scripts')
<script src="{{asset('admin_assets')}}/assets/plugins/select2/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
		var frbrdrbtm = document.getElementById("frbrdrbtm");
        var belowofrslt = frbrdrbtm.innerHTML;
        var result = "";
	var numberInput = document.getElementById("numberInput");
        numberInput.addEventListener("input", function() {
            var input = parseInt(numberInput.value);
            if (input > 3) {
                numberInput.value = 3;
            }
        });
    var list = [];
    var listvalues = [];
    var keywords = [];

    function getSeoScore(score,content,improve_score) {
		 
		if(improve_score == true){
			  
		    // Obtain a score for improving the content.
			document.getElementById("resulted_phrase").innerHTML = score;
			document.getElementById("formscore").value = score;
			console.log("I'm here 1");
			const numberEl = document.getElementById("resulted_phrase");
			const number = parseInt(numberEl.textContent);

			numberEl.style.borderRadius = "50%";
			numberEl.style.padding = "10px";

			if (number < 50) {
				numberEl.style.border = "2px solid #f54c36";
			}
			else if (number > 50 && number < 70) {
				numberEl.style.border = "2px solid #f7831e";
			}
			else {
				numberEl.style.border = "2px solid #39942f";
			}
			return false
			
		}else{
			console.log("I'm here 2");
		  
			 // Obtain a score for the content.
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
				// document.getElementById("output").textContent = JSON.stringify(apiResponse, undefined, 2);
				this.list.push({
					"response": apiResponse
					})
					for (const key of Object.keys(this.list)) {
						this.listvalues.push(this.list[key]);
					}
				// console.log("reached here: "+ JSON.stringify(this.list));
				const finallist = this.list;
				// const resulted_phrase = document.querySelector('#resulted_phrase');
						let html = '';
						for (let i = 0; i < finallist.length; i++) {
						const item = finallist[i];
						// html += `<li>${item.response.status_message}<ul>`;
						for (let j = 0; j < item.response.tasks.length; j++) {
							const subitem = item.response.tasks[j];
							// html += `<li>${subitem.result_count}</li><ul>`;
							for (let z = 0; z < subitem.result.length; z++) {
								const subitem2 = subitem.result[z];
								const keyword_density = subitem2.keyword_density;
								const automated_readability_index = subitem2.automated_readability_index;
								const smog_readability_index = subitem2.smog_readability_index;
								let keywordCount = (content.match(new RegExp(keyword_density, 'gi')) || []).length;
								let totalWords = content.split(' ').length;
								let keywordDensity = keywordCount / totalWords;

								// Calculate meta tags score
								let metaTagsScore = 1; // Set to 1 if all meta tags are present, else 0

								// Calculate weighted average
								// let seoScore = (keywordDensity * 10) + (metaTagsScore * 3) + (automated_readability_index * 1) + (smog_readability_index * 1);
								let seoScore = (keywordDensity * 10) + (metaTagsScore * 3) + (automated_readability_index * 3) + (smog_readability_index * 3);
								let roundedscore = Math.round(seoScore);
								document.getElementById("resulted_phrase").innerHTML = roundedscore;
								// var showscore  = document.getElementById("resulted_phrase");
								// var paragraph = document.createElement("span");
								// paragraph.textContent = roundedscore;
								// showscore.appendChild(paragraph);
								// paragraph.classList.add("rsltdvbrdrbtm");
								document.getElementById("formscore").value = roundedscore;
								var seoform = document.getElementById('seo_content_form');
								var seoformData = new FormData(seoform);
								// const formInputs = document.querySelectorAll('#seo_content_form input');
								// formInputs.forEach(function(input) {
								//     console.log(input.name + ': ' + input.value);
								// });
								$.ajax({
									url: "{{ route('user.template.seo_form_submit') }}",
									method: "POST",
									data: seoformData,
									dataType: 'json',
									contentType: false,
									processData: false,
									success: function(data) {
										console.log(data);
									}
								});

								const numberEl = document.getElementById("resulted_phrase");
								const number = parseInt(numberEl.textContent);

								numberEl.style.borderRadius = "50%";
								numberEl.style.padding = "10px";

								if (number < 50) {
									numberEl.style.border = "2px solid #f54c36";
								}
								else if (number >= 50 && number <= 70) {
									numberEl.style.border = "2px solid #f7831e";
								}
								else {
									numberEl.style.border = "2px solid #39942f";
								}
								// html += `<p class="gnrtdtext">${generated_text}</p>`;
							}
						}
						// html += '</ul></li>';
					}

					// resulted_phrase.innerHTML = html;
				})
			// .catch(error => console.error(error));
		
		}
	}
    // const impscore = document.querySelector('#impscore');
	// impscore.addEventListener('click', function() {
	// 	// $('#ai-loader').show();
	// 	templateLoader('#ai-loader','show');
	// 	$('#ans_div').hide();
	// 	$('#impscore').hide();
	// 	const content = document.querySelector('#details').value;
	// 	results(content);
	// });

    function results(content) {
		
		var getContent = document.getElementById("first_result_div").innerHTML
		formSubmit(1,getContent);
		return false;
		
		// const url = 'https://api.dataforseo.com/v3/content_generation/paraphrase/live';
		// const post_array = [];
		// post_array.push({
				// "text": content,
				// "language_name": "English (United States)"
		// });
		// const username = 'lidanex@gmail.com';
		// const password = 'fc53e701e81bec41';

		// fetch(url, {
		// method: 'POST',
		// headers: {
			// 'Content-Type': 'application/json',
			// 'Authorization': 'Basic ' + btoa(username + ':' + password)
		// },
		// body: JSON.stringify(post_array)
		// })
		// .then(response => response.json())
		// .then(data => {
			// const apiResponse = data;
			// this.list.push({
				// "response": apiResponse
		        // })
                // for (const key of Object.keys(this.list)) {
                    // this.listvalues.push(this.list[key]);
                // }
            // const finallist = this.list;
                    // for (let i = 0; i < finallist.length; i++) {
                    // const item = finallist[i];
                    // for (let j = 0; j < item.response.tasks.length; j++) {
                        // const subitem = item.response.tasks[j];
                        // for (let z = 0; z < subitem.result.length; z++) {
                        // const subitem2 = subitem.result[z];
                        // const generated_text = subitem2.generated_text;
                        $('#ai-loader').hide();
                        // templateLoader('#ai-loader','hide');
                        // $('#ans_div').show();
                        // document.getElementById("first_result_div").innerHTML = generated_text;
                        // const score = generated_text;
	                    // getImpSeoScore(score);
                        // }
                    // }
                    // }
			// })
		// .catch(error => console.error(error));
	}
	
    function getImpSeoScore(content) {
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
			// document.getElementById("output").textContent = JSON.stringify(apiResponse, undefined, 2);
            // console.log("reached here: "+ JSON.stringify(this.list));
            const finallist = this.list;
            // const resulted_phrase = document.querySelector('#resulted_phrase');
                    let html = '';
                    for (let i = 0; i < finallist.length; i++) {
                    const item = apiResponse;
                    // html += `<li>${item.response.status_message}<ul>`;
                    for (let j = 0; j < item.tasks.length; j++) {
                        const subitem = item.tasks[j];
                        // html += `<li>${subitem.result_count}</li><ul>`;
                        for (let z = 0; z < subitem.result.length; z++) {
                        const subitem2 = subitem.result[z];
                        const keyword_density = subitem2.keyword_density;
                        const automated_readability_index = subitem2.automated_readability_index;
                        const smog_readability_index = subitem2.smog_readability_index;
                        let keywordCount = (content.match(new RegExp(keyword_density, 'gi')) || []).length;
                        let totalWords = content.split(' ').length;
                        let keywordDensity = keywordCount / totalWords;

                        // Calculate meta tags score
                        let metaTagsScore = 1; // Set to 1 if all meta tags are present, else 0

                        // Calculate weighted average
                        // let seoScore = (keywordDensity * 10) + (metaTagsScore * 3) + (automated_readability_index * 1) + (smog_readability_index * 1);
                        let seoScore = (keywordDensity * 10) + (metaTagsScore * 3) + (automated_readability_index * 3) + (smog_readability_index * 8);
                        let roundedscore = Math.round(seoScore);
                        document.getElementById("resulted_phrase").innerHTML = roundedscore;
                        const numberEl = document.getElementById("resulted_phrase");
                        const number = parseInt(numberEl.textContent);

                        numberEl.style.borderRadius = "50%";
                        numberEl.style.padding = "10px";

                        if (number < 50) {
                        numberEl.style.border = "2px solid #f54c36";
                        }
                        else if (number > 50 && number < 70) {
                        numberEl.style.border = "2px solid #f7831e";
                        }
                        else if (number > 70 && number < 85) {
                        numberEl.style.border = "2px solid #39942f";
                        }
                        else {
                            document.getElementById("resulted_phrase").innerHTML = "Upgrade";
                            numberEl.style.border = "2px solid #39942f";
                        }
                        // html += `<p class="gnrtdtext">${generated_text}</p>`;
                        }
                    }
                    // html += '</ul></li>';
                    }

                    // resulted_phrase.innerHTML = html;
			})
		// .catch(error => console.error(error));
	}
    // CKEDITOR.replace('first_result_div',
    // {
    //     height: 450,
    //     baseFloatZIndex: 10005,
    //     toolbarGroups: [
    //         {
    //       "name": "basicstyles",
    //       "groups": ["basicstyles"]
    //     },
    //     {
    //       "name": "links",
    //       "groups": ["links"]
    //     },
    //     {
    //       "name": "paragraph",
    //       "groups": ["list", "blocks"]
    //     },
    //     {
    //       "name": "document",
    //       "groups": ["mode"]
    //     },
    //     {
    //       "name": "insert",
    //       "groups": ["insert"]
    //     },
    //     {
    //       "name": "styles",
    //       "groups": ["styles"]
    //     }
    //     ],
    //     // Remove the redundant buttons from toolbar groups defined above.
    //     removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Table,Image,Styles,Specialchar,PasteFromWord'
    //     // Remove the redundant buttons from toolbar groups defined above.
    //     // removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord,Table,Source,'
    // },
    // );

    $('.basic').select2({
        tags: true,
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $(function(){
        $('.selectpicker').selectpicker();
    });

    $(document).ready(function () {
        $('.input_length_validate').each(function (index, element) {
            element == $(this);
            var key = $(element).data('key');
            var update_length = $(key);

            var maxlength = $(element).attr('maxlength');

            var inputLength = $(element).val().length;

            update_length.html(`${inputLength}/${maxlength}`);
        });
    });

    $('.input_length_validate').bind('keyup keypress blur focusout change', function (e) {
        var key = $(this).data('key');
        var update_length = $(key);

        var maxlength = $(this).attr('maxlength');

        var inputLength = $(this).val().length;

        update_length.html(`${inputLength}/${maxlength}`);
    });
    $('#form_submit').click(function(){
		templateLoader('#ai-loader','show');
		$('#ans_div').hide();
		var numberInput = document.getElementById("numberInput");
		var first_result_div = document.getElementById("first_result_div");
		var times = parseInt(numberInput.value);
		var nwnumberInput = document.getElementById("numberInput");
		document.getElementById("tmpnwotpsp").innerText = nwnumberInput.value;
		for (var i = 0; i < times; i++) {
           formSubmit(0,'', i, times);
        }
	});
	function callansdiv(){
		templateLoader('#ai-loader','hide');
		$('#ans_div').show();

	}
	function formSubmit(improve_score,improve_content, number, times)
	{
		document.getElementById("form_submit").disabled = true;
		// $('#ai-loader').show();
		// templateLoader('#ai-loader','show');
		// $('#ans_div').hide();
		var form = document.getElementById('content_form');
		var formData = new FormData(form);
		formData.append('improve_score',improve_score);
		formData.append('improve_content',improve_content);
            // resultDiv.textContent = ""; // Clear previous content
				$.ajax({
					url: "{{ route('user.template.form_submit') }}",
					method: "POST",
					data: formData,
					dataType: 'json',
					contentType: false,
					processData: false,
					success: function(data) {
						
						if (data.error !== undefined) {
							$_html = alertMessage(data.error,false);
							$('.error-msg-div').html($_html);
							document.getElementById("form_submit").disabled = false;
							// $('#ai-loader').hide();
							templateLoader('#ai-loader','hide');
							return false;
						}
						if (data.status == 400) {
							$_html = alertMessage(data.message,false);
							$('.error-msg-div').html($_html);
							document.getElementById("form_submit").disabled = false;
							// $('#ai-loader').hide();
							templateLoader('#ai-loader','hide');

							return false;
						}else{
							// $('#ai-loader').hide();
							if(number === times - 1){
								callansdiv();
							}
							const first_result_div = document.getElementById("first_result_div");
							// const takeimpcntnt = document.getElementById("takeimpcntnt").innerHTML
							document.getElementById("details").value = data.message;
							const score = data.score;
							const content = data.message;
							const takescore = getSeoScore(score,content,improve_score);
							const jvbdjv = document.getElementById("resulted_phrase");
							var elementStyle = window.getComputedStyle(jvbdjv);
							// var newDiv = document.createElement("div");
							// jvbdjv.textContent = "New div with styling";
							const brdr = elementStyle.border;
							const brdrrds = elementStyle.borderRadius;
							const pddng = elementStyle.padding;
							// const cdfcv = document.createElement("div");
							// jvbdjv.innerText = takescore;
							const ndkjvndkj = jvbdjv.innerHTML;
							const htmlContent = '<div class="col-lg-1" style="padding: 0px !important"><div style="width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; font-size: 15px; color: #292828; background-color: transparent; border: '+brdr+'; border-radius: '+brdrrds+'; padding: '+pddng+'">'+ndkjvndkj+'</div></div><div class="col-lg-3"></div>';
							// const htmlContent = '<h1 style="color: blue; font-size: 24px;">'+ndkjvndkj+'</h1>';
							// var paragraph = document.createElement("p"); margin-left: 40%;
							// paragraph.classList.add("rsltdvbrdrbtm");
							// paragraph.textContent = data.message;
							var takepara = '<div class="col-lg-11" id="datamsg'+number+'">'+data.message+'</div>';
							var smwhl = takepara + htmlContent;
							var cnrtsmwhlt = '<div class="row">'+smwhl+'</div>'; //onclick="copyContent('contentToCopy')"
							var existingText = '<div class="row"><div class="col-lg-8"><i class="bx bx-copy" id="tmpbxicrt" onclick="copyContent(\'datamsg'+number+'\')"></i></div><div class="col-lg-1"></div><div class="col-lg-3"></div></div>';
							var takeimpcntnt = '<div class="row"><div class="col-lg-4"><button class="mt-4 btn btn-info nwtmimpscrbtn" id="impscore'+number+'">Improve Score</button></div><div class="col-lg-8"></div></div>'
							result = existingText + cnrtsmwhlt + takeimpcntnt +  belowofrslt;
							var cnvrtresult = "";
							cnvrtresult += '<div id="indvdlsec'+number+'" onmouseover="showHiddenDiv(\'impscore'+number+'\')" onmouseout="hideHiddenDiv(\'impscore'+number+'\')">'+result+'</div>';
							first_result_div.innerHTML += cnvrtresult;
							// first_result_div.appendChild(paragraph);

							// $('#first_result_div').val(data.message);
							// CKEDITOR.instances['first_result_div'].setData(data.message)
							$('#prompt_word_count').html(`${data.word_count} words`);
							$('body #first_copy_btn').show();
							document.getElementById("form_submit").disabled = false;
							// console.log("data "+data.message);

							// ||||||||||||||||| STARTING SEO SCORE |||||||||||||||||||
							// const score = $("#first_result_div").text();
							// const score = data.score;
							// const content = data.message
							
							// getSeoScore(score,content,improve_score);
							// document.getElementById("temp_id").value = data.temp_id;
							// ||||||||||||||||| ENDING SEO SCORE |||||||||||||||||||
						}
					}
				});
	}
	function showHiddenDiv(divId) {
    var hiddenDiv = document.getElementById(divId);
    hiddenDiv.style.visibility = 'visible';
	}

	function hideHiddenDiv(divId) {
		var hiddenDiv = document.getElementById(divId);
		hiddenDiv.style.visibility = 'hidden';
	}
	function copyContent(divId) {
		var content = document.getElementById(divId).innerText;
		console.log("Yeah Here we go again");
		navigator.clipboard.writeText(content)
			.then(function() {
			console.log("Content copied to clipboard.");
			$(".alert-info").fadeTo(2000, 500).slideUp(500, function() {
				$(".alert-info").slideUp(500);
			});
			})
			.catch(function(error) {
			console.error("Unable to copy content to clipboard:", error);
			});
	}
    function copyToClipboard(element) {
        var $temp = $("<textarea>");
		console.log("Yeah Here we go again")
        $("body").append($temp);
        $temp.val($(element).val()).select();
        document.execCommand("copy");
        $temp.remove();
        $(".alert-success").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert-success").slideUp(500);
        });
    }
</script>
@endsection