@extends('layouts.front')
@section('after-css')
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Invites</li>
            </ol>
        </nav>
    </div>
</div>
@include('components.flash-message')
<!--end breadcrumb-->

<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card radius-10">
            <div class="card-body">
                <div class="card-title" style=" display: flex; justify-content: space-between;">
                    <h4 class="mb-0">Invited Users</h4>
                    <a href="javascript:void(0);" class="btn btn-info nwtmcreatecontent send-invite">Send Invitation</a>
                </div>
                <hr />
                <div class="table-responsive mb-4">
                    <table id="zero-config" class="table table-bordered history_table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: black; display:none">id</th>
                                <th style="color: black;">Email</th>
                                <th style="color:black;">Status</th>
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

<div class="modal fade" id="invitationModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('user.invite.send_invitation') }}" method="post" class="ajaxForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Invite User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('components.flash-message')
                    <label for="invite_email">Email</label>
                    <input type="email" class="form-control" name="email" id="invite_email" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Invite</button>
                </div>
            </form>

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

        $('.send-invite').click(function(){
            $('#invitationModel').modal('show');
        })

        load_data();

        function load_data() {
            $('#zero-config').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 0,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                ajax: {
                    url: "{{ route('user.invite.all') }}",
                },
                createdRow: function(row, res, dataIndex) {
                    $(row).addClass('text-center');
                },
                columns: [{
                        data: 'rownum',
                        name: 'rownum',
                        visible: false,
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    }
                ]
            });
        }

        $('body').on('submit','.ajaxForm',function(e){
            e.preventDefault();

            var url = $(this).attr('action');
            var param = new FormData(this);
            my_ajax(url, param, 'post', function(res) {
                if(res.status){
                    $('#invitationModel').modal('hide');
                    $('#zero-config').DataTable().destroy();
                    load_data();

                }
            },true);
        });
    });
</script>
@endsection
