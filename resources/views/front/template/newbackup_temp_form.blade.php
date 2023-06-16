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
                            <p class="float-right update_length_{{$k}}">0/800</p>
                        </div>
                        <input type="text" class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" value="{{$item->placeholder}}" maxlength="80" required>
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
                            <p class="float-right update_length_{{$k}}">0/140</p>
                        </div>
                        <textarea class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" id="" rows="5" maxlength="140"
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
                            <p class="float-right update_length_{{$k}}">0/800</p>
                        </div>
                        <textarea class="form-control input_length_validate" data-key=".update_length_{{$k}}"
                            name="input[text{{++$k}}]" id="" rows="10" maxlength="800"
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
                            <p class="float-right update_length_{{$k}}">0/2</p>
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

                    @if ($template_data->has_number_of_concepts == 1)
                    <div class="form-group col-md-12 mb-3">
                        <label for="">Number of Conecpet</label>
                        <input type="number" name="number_of_conecpet" class="form-control"
                                value="1" min="1" max="5" required>
                    </div>
                    @endif

                    <div class="form-group">
                        <button class="mt-4 btn btn-info" type="button" id="form_submit" {{
                            session()->has('package-error') ? 'disabled' : '' }}>Create Content</button>
                    </div>
                </form>
            </div>

            <div class="col-xl-6 col-lg-6 col-6">

                <div id="ai-loader" style="text-align:center;display:none">
                    {{-- <img src="{{asset('admin_assets')}}/assets/images/ai-loader.gif" alt=""> --}}
                    {{-- <img src="{{asset('admin_assets')}}/assets/images/new-ai-loader.gif" alt=""> --}}
                    <img src="{{asset('front')}}/images/ai-loader.gif" alt="ai-loader">
                </div>
                <div class="form-group" id="ans_div" style="display:none">
                    <label for="t-text" class="sr-only">Text</label>
                    <textarea name="" id="first_result_div" cols="30" rows="18" class="form-control"
                        style=" color: black; "></textarea>
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
                        <div class="alert alert-success alert-dismissible" role="alert"
                            style="display: none !important;">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
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
            document.getElementById("form_submit").disabled = true;
            $('#ai-loader').show();
            $('#ans_div').hide();
            var form = document.getElementById('content_form');
            var formData = new FormData(form);
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
                        $('#ai-loader').hide();
                        return false;
                    }
                    if (data.status == 400) {
                        $_html = alertMessage(data.message,false);
                        $('.error-msg-div').html($_html);
                        document.getElementById("form_submit").disabled = false;
                        $('#ai-loader').hide();
                        return false;
                    }else{
                        $('#ai-loader').hide();
                        $('#ans_div').show();
                        $('#first_result_div').val(data.message);
                        CKEDITOR.instances['first_result_div'].setData(data.message)
                        $('#prompt_word_count').html(`${data.word_count} words`);
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
