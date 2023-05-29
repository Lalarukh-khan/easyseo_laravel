@php
$form_buttons = ['save', 'delete', 'back'];
@endphp
@extends('admin.layouts.admin')
@section('content')
    <form action="{{ admin_url('store', true) }}" method="post" enctype="multipart/form-data" id="competitions">
        @csrf @include('admin.layouts.inc.stickybar', compact('form_buttons'))
        <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
            <input type="hidden" name="id" class="form-control" placeholder="{{ __('ID') }}" value="{{ old('id', $row->id) }}" />
            <!-- begin:: Content -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
                        <div class="kt-portlet__head">
                            @include('admin.layouts.inc.portlet_head')
                            @include('admin.layouts.inc.portlet_actions')
                        </div>

                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="title" class="col-form-label required">{{ __('Title') }}:</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('Title') }}" value="{{ old('title', $row->title) }}" />
                                </div> 
                                <div class="col-lg-6">
                                    <label for="Fee" class="col-form-label">{{ __('Fee') }}:</label>
                                    <input type="text" name="fee" id="Fee" class="form-control" placeholder="{{ __('Price') }}" value="{{ old('fee', $row->fee) }}" />
                                </div>
                            </div>  
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="start_date" class="col-form-label required">{{ __('Start Date') }}:</label>
                                    <input type="text" name="start_date" id="start_date" class="form-control datepicker" style="width: 100%" placeholder="{{ __('Start Date') }}" readonly value="{{ old('start_date', $row->start_date) }}" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="end_date" class="col-form-label">{{ __('End Date') }}:</label>
                                    <input type="text" name="end_date" id="end_date" class="form-control datepicker" style="width: 100%" placeholder="{{ __('End Date') }}" readonly value="{{ old('end_date', $row->end_date) }}" />
                                </div>   
                            </div>  
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div> 
                            <div class="form-group row justify-content-center">
                                <div class="col-lg-12">
                                    <label for="thumb" class="col-form-label">{{ __('Thumb') }}:</label><br />
                                    <input disabled type="hidden" name="thumb--rm" value="{{ $row->thumb }}" />
                                    @php
                                    $file_input = '<input type="file" accept="gif,jpg,jpeg,png" name="thumb" id="thumb" class="form-control custom-file-input" />';
                                    $thumb_url = asset_url("{$_this->module}/{$row->thumb}"); $delete_img_url =
                                    admin_url("ajax/delete_img/{$row->id}/thumb", true); echo thumb_box($file_input, $thumb_url, $delete_img_url);
                                    @endphp

                                    <span class="form-text text-muted">"jpg, png, bmp, gif" file extension's</span>
                                </div> 
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="short_description" class="col-form-label">{{ __('Short Description') }}:</label>
                                    <textarea name="short_description" id="short_description" placeholder="{{ __('Short Description') }}" class="editor form-control" cols="30" rows="5">{{ old('short_description', $row->short_description) }}</textarea>
                                </div>
                            </div>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
                        </div>

                        {{--<div class="kt-portlet__foot">
                            <div class="btn-group">
                                @php $Form_btn = new Form_btn(); echo $Form_btn->buttons($form_buttons); @endphp
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
 

        </div>
    </form>
    <!--end::Form-->
@endsection {{-- Scripts --}} @section('scripts')
    <script>
        $("form#competitions").validate({
            // define validation rules
            rules: {
                title: {required: true,},
                description: {required: true,},
                start_date: {required: true,},
                end_date: {required: true,},
            },
            /*messages: {
        'title' : {required: 'Title is required',},'start_date' : {required: 'Start Date is required',},    },*/
            //display error alert on form submit
            invalidHandler: function (event, validator) {
                KTUtil.scrollTop();
                //validator.errorList[0].element.focus();
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    </script>
@endsection
