@extends('layouts.admin')
@section('after-css')
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>
<style>
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
        padding-top: 150px;
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
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Template</li>
                <li class="breadcrumb-item active" aria-current="page">Testing</li>
            </ol>
        </nav>
    </div>
</div> --}}
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Templates /</span> {{$title}}</h4>
@include('components.flash-message')
<!--end breadcrumb-->
<div class="">
    <div style="display: flex; margin-top:10px;">
        <img src="{{asset($template_data->icon)}}" width="60px" height="60px" alt="template logo">

        <div style="margin-left: 10px;">
            <h3 style=" color: black; ">{{$template_data->name}}</h3>
            <p>{{$template_data->description}}</p>
        </div>
    </div>
</div>

<div class="card radius-15">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-6">
                <form id="content_form">
                    @csrf
                    <input type="hidden" name="command" value="{{$template_data->command_box}}">
                    <input type="hidden" name="setting" value="{{$template_data->setting ?? null}}">
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
                            name="input[text{{++$k}}]" value="{{$item->placeholder}}"  required>
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
                            name="input[text{{++$k}}]" id="" rows="5"
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
                            name="input[text{{++$k}}]" id="" rows="10" 
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
                            name="input[text{{++$k}}]" value="{{$item->placeholder}}" maxlength="2" required>
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

                    {{-- @if ($template_data->has_number_of_concepts == 1)
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Number of Conecpet</label>
                        <input type="number" name="number_of_conecpet" class="form-control"
                                value="1" min="1" max="5" required>
                    </div>
                    @endif --}}


                    <div class="form-group">

                        <button class="mt-4 btn btn-info" type="button" id="form_submit">Create Content</button>
                    </div>
                </form>
            </div>

            <div class="col-xl-6 col-lg-6 col-6">

                <div id="ai-loader" style="text-align:center;">
                    {{-- <img src="{{asset('admin_assets')}}/assets/images/ai-loader.gif" alt=""> --}}
                    {{-- <img src="{{asset('admin_assets')}}/assets/images/new-ai-loader.gif" alt=""> --}}

                    {{-- <img src="{{asset('front')}}/images/ai-loader.gif" alt="ai-loader"> --}}
                    <div class="custom-loader"></div>
                    <span id="loader-text">Generating</span>
                </div>
                <div class="form-group" id="ans_div" style="display:none">
                    {{-- <label for="t-text" class="sr-only">Text</label> --}}

                    <textarea name="" id="first_result_div" cols="30" rows="18" class="form-control"
                        style=" color: black; height:350px;"></textarea>
                    <div class="mt-2"
                        style=" padding: 5px 7px 3px; border-radius: 12px; background: #ececf1; color: #565869;float: right;">
                        <div id="prompt_word_count">0</div>
                    </div>
                    {{-- <button type="button" id="first_copy_btn"
                        class="btn btn-primary btn-rounded mb-4 mr-2 mt-2 copy-text" data-toggle="tooltip"
                        data-placement="top" data-original-title="Copy to clipboard"
                        onclick="copyToClipboard('#first_result_div')" style="display: block;">Copy
                        text</button> --}}
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="alert alert-success alert-dismissible" role="alert"  style="display: none !important;">
                            <strong>Success!</strong> Text Copied.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                @if(!empty($template_data->video_url))
                <div style="text-align:center;margin-top:100px;">
                    <iframe width="360" height="215" src="{{$template_data->video_url}}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
@section('page-scripts')
<script src="{{asset('admin_assets')}}/assets/plugins/select2/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script>

    CKEDITOR.replace('first_result_div',
    {
        height: 450,
        baseFloatZIndex: 10005,
        toolbarGroups: [
            {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        {
          "name": "insert",
          "groups": ["insert"]
        },
        {
          "name": "styles",
          "groups": ["styles"]
        }

        ],
        // Remove the redundant buttons from toolbar groups defined above.
        removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Table,Image,Styles,Specialchar,PasteFromWord'
        // Remove the redundant buttons from toolbar groups defined above.
        // removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord,Table,Source,'
    },
    );


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
            //progress bar function start

            //progress bar function end
            document.getElementById("form_submit").disabled = true;
            // $('#ai-loader').show();
            templateLoader('#ai-loader','show');
            $('#ans_div').hide();
            var form = document.getElementById('content_form');
            var formData = new FormData(form);
            $.ajax({
                url: "{{ route('admin.template.test_form_submit') }}",
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
                        templateLoader('#ai-loader','hide');
                        $('#ans_div').show();
                        $('#first_result_div').text(data.message);
                        CKEDITOR.instances['first_result_div'].setData(data.message)
                        var wordCount = calculateWordCount(data.message);
                        $('#prompt_word_count').html(`${wordCount} words`);
                        $('body #first_copy_btn').show();
                        document.getElementById("form_submit").disabled = false;
                    }
                }
            });
        });

    function copyToClipboard(element) {
        var $temp = $("<textarea>");
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
