@extends('layouts.front')
@section('after-css')
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
<link href="{{ asset('admin_assets') }}/assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css">
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
                <li class="breadcrumb-item active" aria-current="page">Keyword Report</li>
            </ol>
        </nav>
    </div>
</div> -->
<!--end breadcrumb-->

<div class="row">
    <div class="col-lg-12 col-12">
        <div class="card radius-10 nwkstbcard">
            <div class="card-body">
                <div class="card-title">
                    <div class="mb-1" style="display:flex;">
                        <h5 class="mb-0">Keyword:&nbsp;</h5>
                        <h5>{{ $data->keyword }}</h5>
                    </div>
                    <div class="mb-1" style="display:flex;">
                        <h5 class="mb-0">Location:&nbsp;</h5>
                        <h5>{{ $data->country->name }}</h5>
                    </div>
                </div>
                {{--
                <hr /> --}}
                <div class="table-responsive mb-4">
                    <table class="table table-bordered history_table nwkshistory_table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="color: black;">Keyword</th>
                                <th style="color: black;">Volume</th>
                                <th style="color:black;">Difficulty</th>
                                {{-- <th style="color: black;">Date</th>
                                <th style="color: black;">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->suggestions as $item)
                                <tr>
                                    <td>{{ $item->keyword }}</td>
                                    <td>{{ $item->volume }}</td>
                                    <td>
                                        @if (!empty($item->competition_level) && !empty($item->search_volume))
                                        <div style="display: flex;">
                                            <span class="text-muted">({{ $item->competition_level }})</span> &nbsp; <h6 class="text-dark">{{ $item->search_volume }}</h6>
                                        </div>
                                        @elseif(!empty($item->competition_level) && empty($item->search_volume))
                                            <span class="text-muted">({{ $item->competition_level }})</span>
                                        @elseif(empty($item->competition_level) && !empty($item->search_volume))
                                            <h6 class="text-dark">{{ $item->search_volume }}</h6>
                                        @else
                                            {{ "-" }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
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

<script>
    $(document).ready(function() {
        // $('#difficultyback:contains("HIGH")').css('background','red');

        var tds = document.getElementsByTagName("td");
        for (var i = 0; i < tds.length; i++) {
            if (tds[i].textContent.includes("LOW")) {
                tds[i].style.backgroundColor = "#c3f7a6";
            }
            else if (tds[i].textContent.includes("MEDIUM")) {
                tds[i].style.backgroundColor = "#ffbe8c";
            }
            else if (tds[i].textContent.includes("HIGH"))  {
                tds[i].style.backgroundColor = "#ffa49e";
            }
            else  {
                tds[i].style.backgroundColor = "transparent";
            }
        }
        // for (var i = 0; i < tds.length; i++) {
        //     if (tds[i].textContent.includes("LOW")) {
        //     tds[i].style.backgroundColor = "#bbf783";
        //     }
        //     else if (tds[i].textContent.includes("MEDIUM")) {
        //     tds[i].style.backgroundColor = "#fca868";
        //     }
        //     else if (tds[i].textContent.includes("HIGH"))  {
        //     tds[i].style.backgroundColor = "#fa7e75";
        //     }
        //     else  {
        //     tds[i].style.backgroundColor = "transparent";
        //     }
        // }
        // $('#zero-config').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         pageLength: 0,
        //         lengthMenu: [
        //             [10, 25, 50, -1],
        //             [10, 25, 50, "All"]
        //         ],
        //         ajax: {
        //             url: "{{ route('user.keyword-suggestion.index') }}",
        //         },
        //         createdRow: function(row, res, dataIndex) {
        //             // console.log(res);
        //         //     $(row).addClass('single_row');
        //             // $(row).addClass('pointer');
        //         },
        //         columns: [{
        //                 data: 'rownum',
        //                 name: 'rownum',
        //                 visible: false,
        //             },
        //             {
        //                 data: 'keyword',
        //                 name: 'keyword',
        //             },
        //             {
        //                 data: 'country',
        //                 name: 'country',
        //             },
        //             {
        //                 data: 'number_of_keywords',
        //                 name: 'number_of_keywords'
        //             },
        //             {
        //                 data: 'Date',
        //                 name: 'Date'
        //             },
        //              {
        //                 data: 'action',
        //                 name: 'action'
        //             }
        //         ]
        //     });
    });

</script>
@endsection
