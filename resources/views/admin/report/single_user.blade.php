@extends('layouts.admin')
@section('after-css')
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
    .text-warning {
        color: #fadf15 !important;
    }

    .active_tr {
        background-color: #673ab7 !important;
    }

    .active_tr td {
        color: white;
    }

    .active_tr:hover {
        background-color: #673ab7 !important;
    }

    .pointer {
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<!--breadcrumb-->
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Report /</span> Requests</h4> 
@include('components.flash-message')
<!--end breadcrumb-->

<div class="row">
    <div class="col-lg-6">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title" style=" display: flex; justify-content: space-between; ">
                    <h4 class="mb-0">Filter By Date</h4>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <label for="">Search By Date</label>
                        <input type="text" name="daterange" id="daterange" class="form-control input-daterange"
                            placeholder="From Date" />
                    </div>
                    <div class="col-lg-12 col-md-12" style="margin-top: 20px;">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Search</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-info">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card radius-15">
            <div class="card-body">
                <div class="card-title" style=" display: flex; justify-content: space-between; ">
                    <h4 class="mb-0">User Details</h4>
                </div>
                <hr />
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <label for="" style="color: black">Name: {{$user_info->full_name}}</label> <br>
                        <label for="" style="color: black">Email: {{$user_info->email}}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-primary text-primary rounded-circle"><i
                        class='fadeIn animated bx bx-up-arrow-alt'></i></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3" id="total_requests"></h4>
                <p class="mb-0">Total Requests</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-primary text-danger rounded-circle"><i
                        class='fadeIn animated bx bx-up-arrow-alt'></i></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3" id="template_requests"></h4>
                <p class="mb-0">Template Requests</p>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-secondary text-info rounded-circle"><i
                        class='bx bx-comment-detail'></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3" id="remain_words"></h4>
                <p class="mb-0">Total Remaining Words</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="widgets-icons mx-auto bg-light-secondary text-danger rounded-circle"><i
                        class='bx bx-comment-detail'></i>
                </div>
                <h4 class="mb-0 font-weight-bold mt-3" id="total_words"></h4>
                <p class="mb-0">Total Used Words</p>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card radius-10">
            <div class="card-body">
                <div class="card-title" style=" display: flex; justify-content: space-between; ">
                    <h4 class="mb-0">History</h4>
                </div>
                <hr />
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table table-bordered history_table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: black; display:none">id</th>
                                <th style="color: black;">Time</th>
                                <th style="color:black;">Type</th>
                                <th style="color: black;">Prompt</th>
                                <th style="color: black;">Words</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-12">
        <div class="card radius-10">
            <div class="card-body">
                <div class="row settings_row" style="display: none;">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-sm mb-2 float-right show_res">Show
                            Settings</button>
                        <button type="button" class="btn btn-dark btn-sm mb-2 float-right hide_res"
                            style="display: none;">Hide Settings</button>
                    </div>
                    <div class="col-lg-12">
                        <div class="settings_table table-responsive" style="display: none;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea name="" id="view_data_div" cols="30" rows="20" class="form-control"
                                style=" color: black; " readonly></textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('admin_assets') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(document).ready(function() {
        const userId = "{{ $user_id }}";
        $('.input-daterange').daterangepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        load_data(userId);
        load_totals(userId);

        $('#refresh').click(function() {
            $('#zero-config').DataTable().destroy();
            load_data(userId);
            load_totals(userId);
        });

        $('#filter').click(function() {
            var daterange = $('#daterange').val();
            if (daterange != '') {
                $('#zero-config').DataTable().destroy();
                load_data(userId,daterange);
                load_totals(userId,daterange);
            }
        });

        function load_data(userId,date = '') {
            $('#total_requests').html('')
            $('#total_words').html('')
            $('#template_requests').html('')
            $('#remain_words').html('')

            $('#zero-config').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 0,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: {
                    url: "{{ route('admin.report.user-requests') }}",
                    data: {
                        'id': userId,
                        'daterange': date,
                    }
                },
                createdRow: function(row, res, dataIndex) {
                    $(row).addClass('single_row');
                    $(row).addClass('pointer');
                },
                columns: [{
                        data: 'rownum',
                        name: 'rownum',
                        visible: false,
                    },
                    {
                        data: 'time',
                        name: 'time',
                    },
                    {
                        data: 'type',
                        name: 'type',
                    },
                    {
                        data: 'result',
                        name: 'result'
                    },
                    {
                        data: 'words',
                        name: 'words'
                    }
                ]
            });

            $('#view_data_div').val('');
            $('body .show_res').hide();
            $('body .hide_res').hide();
        }

        function load_totals(userId,date = ''){
            $.ajax({
                type: "get",
                url: "{{ route('admin.report.get_report') }}",
                data: {
                    'id': userId,
                    'daterange': date,
                },
                dataType: "json",
                success: function (res) {
                    $('#total_requests').html(res.total_req)
                    $('#total_words').html(res.total_words)
                    $('#template_requests').html(res.templates)
                    $('#remain_words').html(res.remain_words)
                }
            });
        }


        $("body").on('click', '.single_row', function() {

            $('table > tbody > tr').removeClass('active_tr');

            $(this).addClass('active_tr');

            var last_td = $(this).find('td')[0]

            var lasetdata = $(last_td).children('span');

            type = $(lasetdata).data('type');
            setting = $(lasetdata).data('setting');

            if (setting) {
                if (type == 'complete') {
                    html = `<table class="table table-sm table-striped">`;
                    html += `
                    <tr>
                        <td align-"center">Model</td>
                        <td align-"center">${setting.model}</td>
                    </tr>
                    <tr>
                        <td align-"center">Temperature</td>
                        <td align-"center">${setting.temperature}</td>
                    </tr>
                    <tr>
                        <td align-"center">Max length</td>
                        <td align-"center">${setting.token_value}</td>
                    </tr>
                    <tr>
                        <td align-"center">Top P</td>
                        <td align-"center">${setting.top_p}</td>
                    </tr>
                    <tr>
                        <td align-"center">Frequency</td>
                        <td align-"center">${setting.freq_penalty}</td>
                    </tr>
                    <tr>
                        <td align-"center">Penalty</td>
                        <td align-"center">${setting.pre_penalty}</td>
                    </tr>
                    <tr>
                        <td align-"center">Best Of</td>
                        <td align-"center">${setting.best_of}</td>
                    </tr>
                    `
                    html += '</table>';
                    $('body .settings_table').html(html);
                }
                if (type == 'template') {
                    html = `<table class="table table-sm table-striped">`;
                    html += `
                    <tr>
                        <td align-"center">Model</td>
                        <td align-"center">${setting.model}</td>
                    </tr>
                    <tr>
                        <td align-"center">Temperature</td>
                        <td align-"center">${setting.temperature}</td>
                    </tr>
                    <tr>
                        <td align-"center">Max length</td>
                        <td align-"center">${setting.token_value}</td>
                    </tr>
                    <tr>
                        <td align-"center">Top P</td>
                        <td align-"center">${setting.top_p}</td>
                    </tr>
                    <tr>
                        <td align-"center">Frequency</td>
                        <td align-"center">${setting.freq_penalty}</td>
                    </tr>
                    <tr>
                        <td align-"center">Penalty</td>
                        <td align-"center">${setting.pre_penalty}</td>
                    </tr>
                    <tr>
                        <td align-"center">Best Of</td>
                        <td align-"center">${setting.best_of}</td>
                    </tr>
                    `
                    html += '</table>';
                    $('body .settings_table').html(html);
                }
                // if (type == 'edit') {
                //     html = `<table class="table table-sm table-striped">`;
                //     html += `
                //     <tr>
                //         <td align-"center">Model</td>
                //         <td align-"center">${setting.model2}</td>
                //     </tr>
                //     <tr>
                //         <td align-"center">Temperature</td>
                //         <td align-"center">${setting.temp2}</td>
                //     </tr>
                //     <tr>
                //         <td align-"center">Top P</td>
                //         <td align-"center">${setting.topp2}</td>
                //     </tr>
                //     <tr>
                //         <td align-"center">Input Text</td>
                //         <td align-"center">${setting.input_text}</td>
                //     </tr>
                //     <tr>
                //         <td align-"center">Instructions</td>
                //         <td align-"center">${setting.instructions}</td>
                //     </tr>
                //     `
                //     html += '</table>';
                //     $('body .settings_table').html(html);
                // }
            }

            $('body .settings_row').show();
            $('body .hide_res').hide();
            $('body .settings_table').hide();
            text = '';
            if (type == 'complete') {
                $('body .show_res').show();

                text += 'Prompt: \n';
                text += $(lasetdata).data('prompt');
                text += '\n \n \nAnswer: \n';
                text += $(lasetdata).data('answer');
                $('#view_data_div').val(text);
                return false;
            }
            if (type == 'template') {
                $('body .show_res').show();

                text += 'Prompt: \n';
                text += $(lasetdata).data('prompt');
                text += '\n \n \nAnswer: \n';
                text += $(lasetdata).data('answer');
                $('#view_data_div').val(text);
                return false;
            }
        })

        $('body').on('click','.click_username', function(){
            var lasetdata = $(this).children('a');
            url = $(lasetdata).data('url');
            window.location.href = url
        })

        $('body .show_res').click(function(e) {
            e.preventDefault();
            $('body .settings_table').show();
            $('body .hide_res').show();
            $(this).hide();
        });

        $('body .hide_res').click(function(e) {
            e.preventDefault();
            $('body .settings_table').hide();
            $('body .show_res').show();
            $(this).hide();
        });
        });
</script>
@endsection
