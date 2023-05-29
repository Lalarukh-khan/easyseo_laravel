@extends('layouts.admin')
@section('after-css')
<link href="{{asset('admin')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('admin')}}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css'>

@endsection
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.home')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item" aria-current="page">Template</li>
                <li class="breadcrumb-item active" aria-current="page">{{isset($edit) ? 'Edit' : 'Add'}}</li>
            </ol>
        </nav>
    </div>
</div>
@include('components.flash-message')
<!--end breadcrumb-->

<form action="{{route('admin.template.save')}}" method="post" class="ajaxForm" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$edit->hashid ?? null}}">
    <div class="row reverse_div">
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 quater" id="complete_text_dev" style="display:block;">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">{{$title}}</h4>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4  mb-2 mt-3">
                            <label for="template_name">Template Name</label>
                            <input type="text" class="form-control" name="template_name" value="{{$edit->name ?? ''}}"
                                required>
                        </div>

                        <div class="form-group col-lg-4 col-md-4  mb-2 mt-3">
                            <label for="">Category</label>
                            <select name="category" id="" class="form-control basic" required>
                                <option>Select</option>
                                @foreach ($categories as $val)
                                <option value="{{$val->id}}" {{ isset($edit) && $edit->category_id == $val->id ?
                                    'selected' : null }}>{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-4 col-md-4  mb-2 mt-3">
                            <label for="template_status">Status</label>
                            <select name="template_status" id="template_status" class="form-control" required>
                                <option value="1" {{ isset($edit) && $edit->status == 1 ? 'selected' : null }}>Active
                                </option>
                                <option value="0" {{ isset($edit) && $edit->status == 0 ? 'selected' : null }}>Not
                                    Active</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-4 col-md-4 mb-2 mt-3">
                            <label for="" class="mb-3">Image/Icon <span class="text-danger">(size 50x50)</span></label>
                            <br>
                            <img class="profile-pic upload-button" src="{{isset($edit->icon) ? asset($edit->icon) :
                            'https://via.placeholder.com/150/?text=upload%20icon'}}"
                                style="width:70px;height:70px;border-radius: 1000px;cursor: pointer;">
                            <i class="lni lni-circle-plus"
                                style=" font-size: 19px; position: absolute; margin-left: -18px; background-color: #f5f1f0; border-radius: 200%; color: black; "></i>
                            <div class="p-image">
                                <input class="file-upload" name="image" type="file" accept="image/*"
                                    style="display: none">
                            </div>
                        </div>

                        <div class="form-group col-lg-8 col-md-8 mb-2 mt-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" id="description" cols="30"
                                rows="4">{{$edit->description ?? ''}}</textarea>
                        </div>

                        <div class="col-xl-12 col-md-12  mb-2 mt-3">
                            <a href="javascript:;" class="btn btn-outline-primary mb-4 mr-2 add-row">New Question <i
                                    class="fadeIn animated bx bx-plus" style=" font-weight: 900; "></i></a>
                            <div class="accordion saccordion" id="accordionExample">
                                @if (isset($edit) && $edit->fields()->count() > 0)
                                @php $row_count = 1; @endphp
                                @foreach ($edit->fields as $k => $field)
                                <div class="accordion-item  mb-2 mt-3" id="card_item_{{$row_count}}">
                                    <h2 class="accordion-header" id="heading{{$row_count}}">
                                        <button class="accordion-button field_name" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{$row_count}}"
                                            aria-expanded="true" aria-controls="collapse{{$row_count}}">
                                            Question {{$row_count}}
                                            {{-- {[ !text{{$row_count}}!]} --}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$row_count}}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{$row_count}}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                                                    <label for="template_name">Field Name</label>
                                                    <textarea name="label[]" class="form-control" id="" rows="3"
                                                        required>{{$field->title}}</textarea>
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                                                    <label for="template_name">Default text</label>
                                                    <textarea name="placeholder[]" class="form-control" id="" rows="3"
                                                        required>{{$field->placeholder}}</textarea>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6  mb-2 mt-3">
                                                    <label for="template_name">Info</label>
                                                    <textarea name="info[]" class="form-control" id=""
                                                        rows="3">{{$field->info}}</textarea>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6">
                                                    <label for="template_name">Type</label>
                                                    <select name="input_type[]" id="" class="form-control" required>
                                                        <option value="short_text" {{$field->type == 'short_text' ?
                                                            'selected' : null}}>Short Text</option>
                                                            <option value="medium_text" {{$field->type == 'medium_text' ?
                                                                'selected' : null}}>Medium Text</option>
                                                        <option value="long_text" {{$field->type == 'long_text' ?
                                                            'selected' : null}}>Long Text</option>
                                                        <option value="dropdown" {{$field->type == 'dropdown' ?
                                                            'selected' : null}}>Dropdown</option>
                                                        <option value="number" {{$field->type == 'number' ? 'selected' :
                                                            null}}>Numerical</option>
                                                    </select>
                                                </div>
                                                @if ($k > 0)
                                                <div class="form-group col-lg-12 col-md-12">
                                                    <a href="javascript:;" class="btn btn-danger remove_card_div"
                                                        data-id="{{$row_count}}"><i
                                                            class="fadeIn animated bx bx-trash"></i></a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                $row_count++
                                @endphp
                                @endforeach
                                @else
                                <div class="accordion-item  mb-2 mt-3">
                                    <h2 class="accordion-header" id="heading0">
                                        <button class="accordion-button field_name" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse0" aria-expanded="true"
                                            aria-controls="collapse0">
                                            Question 1
                                            {{-- [!text1!] --}}
                                        </button>
                                    </h2>
                                    <div id="collapse0" class="accordion-collapse collapse" aria-labelledby="heading0"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                                                    <label for="template_name">Field Name</label>
                                                    <textarea name="label[]" class="form-control" id="" rows="3"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                                                    <label for="template_name">Default text</label>
                                                    <textarea name="placeholder[]" class="form-control" id="" rows="3"
                                                        required></textarea>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6  mb-2 mt-3">
                                                    <label for="template_name">Info</label>
                                                    <textarea name="info[]" class="form-control" id=""
                                                        rows="3"></textarea>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6">
                                                    <label for="template_name">Type</label>
                                                    <select name="input_type[]" id="" class="form-control" required>
                                                        <option value="short_text">Short Text</option>
                                                        <option value="medium_text">Medium Text</option>
                                                        <option value="long_text">Long Text</option>
                                                        <option value="dropdown">Dropdown</option>
                                                        <option value="number">Numerical</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                            <label for="">Command Box </label>
                            <textarea name="command_box" class="form-control" id="command_box" cols="30"
                                rows="10">{{$edit->command_box ?? ''}}</textarea>
                        </div>

                        {{-- <div class="form-group col-lg-5 col-md-5  mb-2 mt-3">
                            <label for="">Video Url</label>
                            <input type="url" name="video_url" class="form-control" value="{{$edit->video_url ?? ''}}">
                        </div>

                        <div class="form-group col-lg-3 col-md-3 mb-2 mt-3">
                            <label class="control-label"></label>
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="has_language" {{ isset($edit) &&
                                        $edit->has_language == 1 ? 'checked' : null }} class="mt-2">&nbsp; Has
                                    Language</label>
                            </div>
                        </div>

                        <div class="form-group col-lg-4 col-md-4 mb-2 mt-3">
                            <label class="control-label"></label>
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="has_number_of_concepts" {{ isset($edit) &&
                                        $edit->has_number_of_concepts == 1 ? 'checked' : null }} class="mt-2">&nbsp; Has
                                    Number of concepts</label>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group col-lg-4 col-md-4 mb-2 mt-3">
                            <label class="control-label"></label>
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="premium_template" {{ isset($edit) &&
                                        $edit->is_premium == 1 ? 'checked' : null }} class="mt-2">&nbsp; Premium
                                    Template</label>
                            </div>
                        </div>

                        <div class="form-group col-lg-4 col-md-4 mb-2 mt-3">
                            <label class="control-label"></label>
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="business_template" {{ isset($edit) &&
                                        $edit->is_business == 1 ? 'checked' : null }} class="mt-2">&nbsp; Business
                                    Template</label>
                            </div>
                        </div> --}}





                        <div class="form-group col-lg-12 col-md-12">
                            <button type="button" class="btn btn-xs btn-secondary test_button test_button"
                                id="test_button">Test</button>
                            <button type="submit" class="btn btn-xs btn-info first_form_submit"
                                id="first_form_submit">Save</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12" style="display: block;" id="mode_dev">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Setting</h4>
                    </div>
                    <hr />
                    <div class="form-group  mb-2 mt-3">
                        <label>Model
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="The model which will generate the completion. Some models are suitable for natural language tasks, others specialize in code. Learn more.">
                            </i>
                        </label>
                        <select name="model" id="mode_id" class="form-control basic" required>
                            {{-- <optgroup label="GPT-3">
                                @foreach ($gpt_3_modes as $item)
                                <option value="{{ $item->hashid }}" data-item="{{ $item }}" {{isset($edit) &&
                                    !empty($edit->setting) && $edit->setting->model == $item->model ? 'selected' :
                                    null }} >{{
                                    $item->model }}
                                </option>
                                @endforeach
                            </optgroup>
                            <optgroup label="CODEX">
                                @foreach ($CODEX as $item)
                                <option value="{{ $item->hashid }}" data-item="{{ $item }}" {{isset($edit) &&
                                    !empty($edit->setting) && $edit->setting->model == $item->model ? 'selected' :
                                    null }}>{{
                                    $item->model }}
                                </option>
                                @endforeach
                            </optgroup> --}}
                            <option value="gpt-3.5-turbo" {{isset($edit) &&
                                    !empty($edit->setting) && $edit->setting->model == 'gpt-3.5-turbo' ? 'selected' :
                                    null }}>gpt-3.5-turbo</option>
                            <option value="text-davinci-003" {{isset($edit) &&
                                !empty($edit->setting) && $edit->setting->model == 'text-davinci-003' ? 'selected' :
                                null }}>text-davinci-003</option>
                        </select>
                    </div>
                    <div class="form-group  mb-2 mt-3">
                        <label>
                            Temperature
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="Controls randomness: Lowering results in less random completions. As the temperature approaches zero, the model will become deterministic and repetitive.">
                            </i>
                        </label>
                        <select name="temperature" id="temperature_option" class="form-control basic">
                            <option value="0" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0 ? 'selected' : null }}>0</option>
                            <option value="0.1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.1 ? 'selected' : null }}>0.1</option>
                            <option value="0.2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.2 ? 'selected' : null }}>0.2</option>
                            <option value="0.3" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.3 ? 'selected' : null }}>0.3</option>
                            <option value="0.4" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.4 ? 'selected' : null }}>0.4</option>
                            <option value="0.5" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.5 ? 'selected' : null }}>0.5</option>
                            <option value="0.6" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.6 ? 'selected' : null }}>0.6</option>
                            <option value="0.7" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.7 ? 'selected' : null }} {{!isset($edit) ?
                                'selected' : null }}>0.7</option>
                            <option value="0.8" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.8 ? 'selected' : null }}>0.8</option>
                            <option value="0.9" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 0.9 ? 'selected' : null }}>0.9</option>
                            <option value="1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->temperature == 1 ? 'selected' : null }}>1</option>
                        </select>
                    </div>
                    <div class="form-group  mb-2 mt-3">
                        <label>
                            Maximum length (<span id="max_length_val">{{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->token_value > 0 ? $edit->setting->token_value : 256 }}</span>)
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="The maximum number of tokens to generate. Requests can use up to 2,048 or 4,000 tokens shared between prompt and completion. The exact limit varies by model. (One token is roughly 4 characters for normal English text)">
                            </i>
                        </label>
                        <input type="range" id="max_length" name="max_length"
                            value="{{isset($edit) && !empty($edit->setting) && $edit->setting->token_value > 0 ? $edit->setting->token_value : 256 }}"
                            min="1" max="4000" class="form-control">
                    </div>

                    <div class="form-group  mb-2 mt-3">
                        <label>
                            Top P
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="Controls diversity via nucleus sampling: 0.5 means half of all likelihood- weighted options are considered.">
                            </i>
                        </label>
                        <select name="top_p" id="top_p" class="form-control basic">
                            <option value="0" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p == 0
                                ? 'selected' : null }}>0</option>
                            <option value="0.1" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.1 ? 'selected' : null }}>0.1</option>
                            <option value="0.2" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.2 ? 'selected' : null }}>0.2</option>
                            <option value="0.3" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.3 ? 'selected' : null }}>0.3</option>
                            <option value="0.4" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.4 ? 'selected' : null }}>0.4</option>
                            <option value="0.5" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.5 ? 'selected' : null }}>0.5</option>
                            <option value="0.6" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.6 ? 'selected' : null }}>0.6</option>
                            <option value="0.7" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.7 ? 'selected' : null }}>0.7</option>
                            <option value="0.8" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.8 ? 'selected' : null }}>0.8</option>
                            <option value="0.9" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p ==
                                0.9 ? 'selected' : null }}>0.9</option>
                            <option value="1" {{isset($edit) && !empty($edit->setting) && $edit->setting->top_p == 1
                                ? 'selected' : null }} {{!isset($edit) ? 'selected' : null }}>1</option>
                        </select>
                    </div>

                    <div class="form-group  mb-2 mt-3">
                        <label>
                            Frequency penalty
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="How much to penalize new tokens based on their existing frequency in the text so far. Decreases the model's likelihood to repeat the same line verbatim">
                            </i>
                        </label>
                        <select name="frequency" id="frequency_penalty" class="form-control basic">
                            <option value="0" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0 ? 'selected' : null }}>0</option>
                            <option value="0.1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.1 ? 'selected' : null }}>0.1</option>
                            <option value="0.2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.2 ? 'selected' : null }}>0.2</option>
                            <option value="0.3" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.3 ? 'selected' : null }}>0.3</option>
                            <option value="0.4" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.4 ? 'selected' : null }}>0.4</option>
                            <option value="0.5" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.5 ? 'selected' : null }}>0.5</option>
                            <option value="0.6" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.6 ? 'selected' : null }}>0.6</option>
                            <option value="0.7" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.7 ? 'selected' : null }}>0.7</option>
                            <option value="0.8" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.8 ? 'selected' : null }}>0.8</option>
                            <option value="0.9" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 0.9 ? 'selected' : null }}>0.9</option>
                            <option value="1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1 ? 'selected' : null }}>1</option>
                            <option value="1.1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.1 ? 'selected' : null }}>1.1</option>
                            <option value="1.2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.2 ? 'selected' : null }}>1.2</option>
                            <option value="1.3" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.3 ? 'selected' : null }}>1.3</option>
                            <option value="1.4" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.4 ? 'selected' : null }}>1.4</option>
                            <option value="1.5" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.5 ? 'selected' : null }}>1.5</option>
                            <option value="1.6" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.6 ? 'selected' : null }}>1.6</option>
                            <option value="1.7" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.7 ? 'selected' : null }}>1.7</option>
                            <option value="1.8" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.8 ? 'selected' : null }}>1.8</option>
                            <option value="1.9" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 1.9 ? 'selected' : null }}>1.9</option>
                            <option value="2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->freq_penalty == 2 ? 'selected' : null }}>2</option>
                        </select>
                    </div>

                    <div class="form-group  mb-2 mt-3">
                        <label>
                            Presence penalty
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="How much to penalize new tokens based on whether they appear in the text so far. Increases the model's likelihood to talk about new topics.">
                            </i>
                        </label>
                        <select name="penalty" id="penalty" class="form-control basic">
                            <option value="0" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0 ? 'selected' : null }}>0</option>
                            <option value="0.1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.1 ? 'selected' : null }}>0.1</option>
                            <option value="0.2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.2 ? 'selected' : null }}>0.2</option>
                            <option value="0.3" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.3 ? 'selected' : null }}>0.3</option>
                            <option value="0.4" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.4 ? 'selected' : null }}>0.4</option>
                            <option value="0.5" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.5 ? 'selected' : null }}>0.5</option>
                            <option value="0.6" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.6 ? 'selected' : null }}>0.6</option>
                            <option value="0.7" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.7 ? 'selected' : null }}>0.7</option>
                            <option value="0.8" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.8 ? 'selected' : null }}>0.8</option>
                            <option value="0.9" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 0.9 ? 'selected' : null }}>0.9</option>
                            <option value="1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1 ? 'selected' : null }}>1</option>
                            <option value="1.1" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.1 ? 'selected' : null }}>1.1</option>
                            <option value="1.2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.2 ? 'selected' : null }}>1.2</option>
                            <option value="1.3" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.3 ? 'selected' : null }}>1.3</option>
                            <option value="1.4" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.4 ? 'selected' : null }}>1.4</option>
                            <option value="1.5" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.5 ? 'selected' : null }}>1.5</option>
                            <option value="1.6" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.6 ? 'selected' : null }}>1.6</option>
                            <option value="1.7" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.7 ? 'selected' : null }}>1.7</option>
                            <option value="1.8" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.8 ? 'selected' : null }}>1.8</option>
                            <option value="1.9" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 1.9 ? 'selected' : null }}>1.9</option>
                            <option value="2" {{isset($edit) && !empty($edit->setting) &&
                                $edit->setting->pre_penalty == 2 ? 'selected' : null }}>2</option>
                        </select>
                    </div>

                    <div class="form-group  mb-2 mt-3">
                        <label>
                            Best of
                            <i class="fadeIn animated bx bx-info-circle" data-toggle="tooltip" data-placement="top"
                                title="Generates multiple completions server- side, and displays only the best. Streaming only works when set to 1. Since it acts as a multiplier on the number of completions, this parameters can eat into your token quota very quickly use caution!">
                            </i>
                        </label>
                        <select name="best_of" id="best_of" class="form-control basic">
                            <option value="1" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                1 ? 'selected' : null }}>1</option>
                            <option value="2" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                2 ? 'selected' : null }}>2</option>
                            <option value="3" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                3 ? 'selected' : null }}>3</option>
                            <option value="4" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                4 ? 'selected' : null }}>4</option>
                            <option value="5" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                5 ? 'selected' : null }}>5</option>
                            <option value="6" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                6 ? 'selected' : null }}>6</option>
                            <option value="7" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                7 ? 'selected' : null }}>7</option>
                            <option value="8" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                8 ? 'selected' : null }}>8</option>
                            <option value="9" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of ==
                                9 ? 'selected' : null }}>9</option>
                            <option value="10" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 10 ? 'selected' : null }}>10</option>
                            <option value="11" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 11 ? 'selected' : null }}>11</option>
                            <option value="12" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 12 ? 'selected' : null }}>12</option>
                            <option value="13" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 13 ? 'selected' : null }}>13</option>
                            <option value="14" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 14 ? 'selected' : null }}>14</option>
                            <option value="15" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 15 ? 'selected' : null }}>15</option>
                            <option value="16" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 16 ? 'selected' : null }}>16</option>
                            <option value="17" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 17 ? 'selected' : null }}>17</option>
                            <option value="18" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 18 ? 'selected' : null }}>18</option>
                            <option value="19" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 19 ? 'selected' : null }}>19</option>
                            <option value="20" {{isset($edit) && !empty($edit->setting) && $edit->setting->best_of
                                == 20 ? 'selected' : null }}>20</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{asset('admin')}}/assets/plugins/select2/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.basic').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

        $(function(){
            $('.selectpicker').selectpicker();
        });
        var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });

        $("#max_length").on('change', function() {
            $('#max_length_val').html($(this).val());
        })
    });

    $('#mode_id').change(function() {
        return false
        var item = $('option:selected', this).data('item');
        // console.log(item);

        $('#max_length').val(item.max_length);
        $('#max_length').attr('max', item.token_value);
        $('#max_length_val').html(item.max_length);

        $('#top_p').val(item.top_p).trigger('change');
        $("#temperature_option").val(item.temperature).trigger('change');
        $("#best_of").val(item.best_of).trigger('change');
        $("#penalty").val(item.pre_penalty).trigger('change');
    });

</script>
<script>
    var rows = "{{ isset($row_count) ? $row_count : 1 }}";
    validations = $(".ajaxForm").validate();
    $('.ajaxForm').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        validations = $(".ajaxForm").validate();
        if (validations.errorList.length != 0) {
            return false;
        }
        var formData = new FormData(this);
        my_ajax(url, formData, 'post', function(res) {
        },true);
    });

    $('#test_button').click(function(e){
        e.preventDefault();
        let ajaxForm = $('.ajaxForm');

        form = document.querySelector('form');

        form = new FormData(form);

        validations = ajaxForm.validate();
        if (validations.errorList.length != 0) {
            return false;
        }

        my_ajax("{{route('admin.template.test_save')}}", form, 'post', function(res) {
            if (res['success'] !== undefined) {
                setTimeout(function () {
                    window.open(res.route, "_blank");
                }, 600);
            }
        },true);
    })

    $('.add-row').click(function () {
        var html = `<div class="accordion-item  mb-2 mt-3" id="card_item_${rows}">
                                        <h2 class="accordion-header" id="heading${rows}">
                                            <button class="accordion-button field_name" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse${rows}" aria-expanded="true"
                                                aria-controls="collapse${rows}">
                                                Question ${rows}
                                            </button>
                                        </h2>
                                        <div id="collapse${rows}" class="accordion-collapse collapse"
                                            aria-labelledby="heading${rows}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                                                        <label for="template_name">Field Name</label>
                                                        <textarea name="label[]" class="form-control" id="" rows="3" required></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12  mb-2 mt-3">
                                                        <label for="template_name">Default text</label>
                                                        <textarea name="placeholder[]" class="form-control" id="" rows="3" required></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6  mb-2 mt-3">
                                                        <label for="template_name">Info</label>
                                                        <textarea name="info[]" class="form-control" id="" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6">
                                                        <label for="template_name">Type</label>
                                                        <select name="input_type[]" id="" class="form-control" required>
                                                            <option value="short_text">Short Text</option>
                                                            <option value="medium_text">Medium Text</option>
                                                            <option value="long_text">Long Text</option>
                                                            <option value="dropdown">Dropdown</option>
                                                            <option value="number">Numerical</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12">
                                                        <a href="javascript:;" class="btn btn-danger remove_card_div" data-id="${rows}"><i class="fadeIn animated bx bx-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

        $('.saccordion').append(html);
        rows++;
        resetIndexText();
    });

    $('body').on('click','.remove_card_div',function(){
        var id = $(this).data('id');
        $(`#card_item_${id}`).remove();
        resetIndexText();
        return true;
    });


    function showSideBar(){
        var complete_text_dev = $('#complete_text_dev');
        var mode_dev = $('#mode_dev');
        if (complete_text_dev.hasClass('quater')) {
            complete_text_dev.removeClass('quater')

            complete_text_dev.removeClass('col-xl-9')
            complete_text_dev.removeClass('col-lg-9')

            complete_text_dev.addClass('col-xl-12')
            complete_text_dev.addClass('col-lg-12')

            complete_text_dev.addClass('full')

            mode_dev.hide();

            return false;
        }

        if (complete_text_dev.hasClass('full')) {
            complete_text_dev.removeClass('full')

            complete_text_dev.removeClass('col-xl-12')
            complete_text_dev.removeClass('col-lg-12')


            complete_text_dev.addClass('col-xl-9')
            complete_text_dev.addClass('col-lg-9')

            complete_text_dev.addClass('quater')

            mode_dev.show();

            return false;
        }
    }


    function resetIndexText(){
        var rowCount = 1;
        $("body .field_name").each(
            function(i,obj){
                // $(obj).html(`Question ${rowCount} [!text${rowCount}!]`);
                $(obj).html(`Question ${rowCount}`);
                rowCount++;
            }
        );
    }
</script>
@endsection
