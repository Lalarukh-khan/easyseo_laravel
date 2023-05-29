@extends('layouts.admin')
@section('after-css')
<style>
    input#settingsVal {
        position: relative;
    }
</style>
@endsection
@section('content')
<!--breadcrumb-->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Setting /</span> API Key</h4> 
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
                                        <label>API Key</label>
                                        <label for="t-text" class="sr-only">API Key</label>
                                        <a href="javascript:;" class="btn btn-sm" style="    position: absolute;
                                        right: 18px;
                                        top: 40px;
                                        font-size: 15px;
                                        z-index: 1;" id="showSettingModal"><i
                                                class="fadeIn animated bx bx-edit text-dark" style=" font-size: 25px; "></i></a>
                                        <input type="text" class="form-control" disabled
                                                value="{{ isset($key->api_key) ? base64_decode($key->api_key) : null }}"
                                                id="settingsVal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="SettingnModal" tabindex="-1" role="dialog" aria-labelledby="SettingnModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.setting.save') }}" class="ajaxForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="SettingnModalTitle">Update Api Key</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $key->hashid ?? null }}" id="">
                        <label for="">API Key</label>
                        <input type="text" class="form-control" value="" name="api_key">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="first_form_submit">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @section('page-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#showSettingModal').click(function(){
                $('#SettingnModal').modal('show');
            });

            const hideDataWithDot = value => value.replace(/.+(.{4})$/, "***************$1");
            $("#settingsVal").val(hideDataWithDot($("#settingsVal").val()))

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
        });
    </script>
    @endsection
