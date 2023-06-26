@extends('layouts.front')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card radius-15 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-0">Expiry Date</p>
                            <h4 class="mb-0 font-weight-bold">{{ date('M d,Y', strtotime($user_package->end_date)) }}</h4>
                        </div>
                        <div class="widgets-icons bg-light-primary text-primary rounded-circle ms-auto"><i
                                class="bx bx-calendar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-md-6">
            <div class="card radius-15 p-3">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-0">Words</p>
                            <h4 class="mb-0 font-weight-bold">{{ number_format($user_package->words, 0) }}</h4>
                        </div>
                        <div class="widgets-icons bg-light-info text-info rounded-circle ms-auto"><i
                                class="bx bx-message-alt-detail"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 col-md-12">
            <div class="card radius-15 p-3">
                <div class="card-body">
                    @if ($user_package->package->title == 'Free')
                        <div class="">
                            <h4 class="mb-0 font-weight-bold">Free trial usage</h4>
                        </div>
                    @else
                        <div class="">
                            <h4 class="mb-0 font-weight-bold">Plain Usage ({{ $user_package->package->title }})</h4>
                        </div>
                    @endif

                    <div class="row">
                        @php
                            $per = ($words / $total_words->words) * 100;
                        @endphp
                        <div class="col-xl-10 col-md-10 col-sm-12 col-12 mt-1">
                            <div class="progress mt-3" style="height:15px;">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    style="width: {{ $per }}%" aria-valuenow="{{ $per }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-2 col-sm-12 col-12 mt-1">
                            <h6 class="text-dark mt-2">
                                {{ $words >= $total_words->words ? $total_words->words : $words }}/{{ isset($total_words->words) ? $total_words->words : 10000 }}
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 col-md-12">
            <div class="card radius-15 p-3">
                <div class="card-body">
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="color: black;">Package</th>
                                    <th style="color: black;">Package Duration</th>
                                    <th style="color: black;">Package Words</th>
                                    @if (!empty($user_package->subscription_id) && !session()->has('package-error'))
                                    <th style="color: black;">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-dark">
                                        {{ $user_package->package->title }}
                                    </td>
                                    <td>
                                        @php
                                            $diff_in_days = now()->diffInDays($user_package->end_date);
                                        @endphp
                                        <p class="badge bg-success">{{ $diff_in_days }} days</p>
                                    </td>
                                    <td class="text-dark">
                                        {{ $user_package->words }}
                                    </td>
                                    @if (!empty($user_package->subscription_id) && !session()->has('package-error'))
                                    <td class="text-center">

                                            <a href="javascript:void(0);" onclick="ajaxRequest(this)"
                                                data-url="{{ route('user.cencel-subscription', $data->hashid) }}"
                                                class="btn btn-danger" title="delete">Cancel Subscription</a>&nbsp;&nbsp;
                                    </td>
                                    @elseif(isset($user_package->user_package->subscription_id) && !empty($user_package->user_package->subscription_id) && !session()->has('package-error'))
                                    <td class="text-center">

                                        <a href="javascript:void(0);" onclick="ajaxRequest(this)"
                                            data-url="{{ route('user.cencel-subscription', $data->hashid) }}"
                                            class="btn btn-danger" title="delete">Cancel Subscription</a>&nbsp;&nbsp;
                                    </td>
                                    @endif

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
@endsection
