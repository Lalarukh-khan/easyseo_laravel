@extends('layouts.front')
@section('after-css')

<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('admin_assets')}}/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<style>
    .pointer{
        cursor: pointer;
    }
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
    }
</style>
@endsection
@section('content')
@include('components.flash-message')
<!--breadcrumb-->
<!-- <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Keyword Suggestion</li>
            </ol>
        </nav>
    </div>
</div> -->
<!--end breadcrumb-->
<div class="row">
    <div class="col-3 col-lg-3"></div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="user-profile-page">
            <div class="card radius-15 nwkscard">
                <div class="card-body">
                    <div class="col-12 col-lg-12 border-right">
                        <form method="POST" action="{{route('user.keyword-suggestion.find_keywords')}}" class="row g-3 ajaxForm"
                            enctype="multipart/form-data">
                            @csrf
                            <h5 class="nwkstargetkey">Target keyword</h5>
                            <div class="col-12">
                                <div class="flex-grow-1 search-bar nwkssearch-bar">
                                    <div class="input-group">
                                        <button class="btn btn-search nwksbtn-search" type="button"><i class="lni lni-plus"></i></button>
                                        <input type="text" name="target_keyword" id="target_keyword" class="form-control nwkstempsearchbar" placeholder="Keyword" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="flex-grow-1 search-bar nwkssearch-bar">
                                    <div class="input-group">
                                        <button class="btn btn-search nwksbtn-search" type="button"><i class="lni lni-map-marker"></i></button>
                                        <select name="location" id="location" class="form-control nwkstempsearchbar2" required>
                                            @foreach ($locations as $item)
                                            <option value="{{ $item->location_code }}" data-id="{{$item->id}}">{{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-search nwksbtn-search2" type="button"><i class="lni lni-chevron-down"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- <label for="location">Location</label> -->
                                {{--  <select name="location" id="location" class="form-control basic" required>
                                    @foreach ($locations as $item)
                                    <option value="{{ $item->location_code }}" data-id="{{$item->id}}">{{ $item->name }}
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>
                            {{-- <div class="col-6">
                                <label for="language">Language</label>
                                <select name="language" id="language" class="form-control basic" required>
                                </select>
                            </div> --}}

                            <!-- <div class="col-12">
                                <label for="target_keyword">Target keyword</label>
                                <input name="target_keyword" id="target_keyword" class="form-control" required>
                            </div> -->

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary form-submit-btn nwform-submit-btn">Find Keywords</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 col-lg-3"></div>
</div>


<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card radius-10 nwkstbcard">
            <div class="card-body">
                <div class="card-title" style=" display: flex; justify-content: space-between; ">
                    {{-- <h4 class="mb-0">History</h4> --}}
                </div>
                {{-- <hr /> --}}
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table table-bordered history_table nwkshistory_table" style="width:100%; border-collapse: collapse !important;">
                        <thead>
                            <tr>
                                <th style="color: black; display:none">id</th>
                                <th style="color: black;">Keyword</th>
                                <th style="color: black;">Country</th>
                                <th style="color:black;">Number of Keywords</th>
                                <th style="color: black;">Date</th>
                                <th style="color: black;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('page-scripts')
<script src="{{ asset('admin_assets') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{asset('admin_assets')}}/assets/plugins/select2/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        $('select').val('2840');

        $('.basic').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear'))
        });

        // var location = $('#location');
        // var locationID = $('option:selected', location).attr('data-id');

        // load_languages(locationID);

        validations = $(".ajaxForm").validate();
        $('.ajaxForm').submit(function(e) {
            e.preventDefault();
            validations = $(".ajaxForm").validate();
            if (validations.errorList.length != 0) {
                return false;
            }
            var url = $(this).attr('action');
            var param = new FormData(this);
            my_ajax(url, param, 'post', function(res) {

            },true);
        })


        $('#zero-config').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 0,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: {
                    url: "{{ route('user.keyword-suggestion.index') }}",
                },
                createdRow: function(row, res, dataIndex) {
                    // console.log(res);
                //     $(row).addClass('single_row');
                    // $(row).addClass('pointer');
                },
                columns: [{
                        data: 'rownum',
                        name: 'rownum',
                        visible: false,
                    },
                    {
                        data: 'keyword',
                        name: 'keyword',
                    },
                    {
                        data: 'country',
                        name: 'country',
                    },
                    {
                        data: 'number_of_keywords',
                        name: 'number_of_keywords'
                    },
                    {
                        data: 'Date',
                        name: 'Date'
                    },
                     {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
    });


    // $('#location').change(function (e) {
    //     e.preventDefault();
    //     var id = $('option:selected', this).attr('data-id');

    //     load_languages(id);
    // });

    // function load_languages(id){
    //     $.ajax({
    //         type: "get",
    //         url: "{{ route('user.keyword-suggestion.get_languages') }}",
    //         data: {
    //             'id':id
    //         },
    //         dataType: "json",
    //         success: function (res) {
    //             $('#language').html(res);
    //         }
    //     });
    // }
</script>
@endsection
