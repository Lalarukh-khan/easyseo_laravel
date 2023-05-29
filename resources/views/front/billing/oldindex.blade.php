@extends('layouts.front')
@section('after-css')
<link href="{{asset('front')}}/css/custom.css" rel="stylesheet">
<style>
    header {
        padding: 0px !important;
    }
</style>
{{-- <style>
    .range-slider {
        position: relative;
    }

    .range-slider input[type="range"] {
        background: #fff;
        width: 100%;
        height: 12px;
        outline: none;
        border-radius: 15px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .range-slider input[type="range"]::-webkit-slider-thumb {
        background: #fff;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        box-shadow: 0 0 0 4px #FF6547;
        cursor: pointer;
        transition: all 0.15s ease-in-out 0s;
        -webkit-appearance: none;
        appearance: none;
    }

    .range-slider input[type="range"]:active::-webkit-slider-thumb,
    .range-slider input[type="range"]::-webkit-slider-thumb:hover {
        box-shadow: 0 0 5px #FF6547;
    }

    .range-slider input[type="range"]::-moz-range-thumb {
        background: #fff;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        box-shadow: 0 0 0 4px #FF6547;
        border: none;
        cursor: pointer;
        transition: all 0.15s ease-in-out 0s;
    }

    .range-slider input[type="range"]:active::-moz-range-thumb,
    .range-slider input[type="range"]::-moz-range-thumb:hover {
        box-shadow: 0 0 5px #FF6547;
    }
</style> --}}
@endsection
@section('content')
<!--breadcrumb-->
{{-- <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
        </nav>
    </div>
</div> --}}
{{-- <section class="pb-5">
    <div class="">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center">
                <div class="heading pb-4">
                    <h2>Choose Your Plan</h2>
                    <h5 class="font-weight-normal lis-light">Discover &amp; connect with top-rated local businesses</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-4 mb-5 mb-lg-0 text-center">
                <div class="price-table">
                    <div class="price-header bg-warning lis-rounded-top py-4 border border-bottom-0 lis-brd-light">
                        <h5 class="text-uppercase lis-latter-spacing-2">Free Trial</h5>
                        <h1 class="display-4 lis-font-weight-500">$0</h1>
                        <p class="mb-0">Free 5000 words (7 days trail)</p>
                    </div>
                    <div class="border border-top-0 lis-brd-light bg-white py-5 lis-rounded-bottom">
                        <ul class="list-unstyled lis-line-height-3">
                            <li>Access to Jumcert</li>
                            <li>Access to Event Library</li>
                            <li>Pay-Per-View</li>
                            <li>Chat/Message Feature</li>
                        </ul> <a href="javascript:;" class="btn btn-warning btn-md lis-rounded-circle-50 px-4 disabled"
                            data-abc="true"><i class="fa fa-shopping-cart pl-2"></i>Get Started</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 mb-5 mb-lg-0 text-center">
                <div class="price-table active">
                    <div class="price-header lis-bg-primary py-4 text-white lis-rounded-top">
                        <h5 class="text-uppercase lis-latter-spacing-2 text-white">PRO</h5>
                        <h1 class="display-4 lis-font-weight-500 text-white">$69</h1>
                        <div class="range-slider w-100">
                            <input type="range" id="solo_proplan" value="0" min="0" steps="1" max="3">
                        </div>
                        <p class="mb-0">20,000 words</p>
                    </div>
                    <div class="border border-top-0 lis-brd-light bg-white py-5 lis-rounded-bottom">
                        <ul class="list-unstyled lis-line-height-3">
                            <li>Starter plan plus</li>
                            <li>Broadcast 1 to 1 Hosting</li>
                            <li>Moderate Chat/Message Feature</li>
                            <li>Create Profile Channel</li>
                            <li>Google docs style editor</li>
                            <li>Keyword research by AI</li>
                            <li>Chat support</li>
                        </ul> <a href="javascript:;" class="btn btn-primary btn-md lis-rounded-circle-50 px-4"
                            data-abc="true"><i class="fa fa-shopping-cart pl-2"></i>Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 text-center">
                <div class="price-table">
                    <div class="price-header bg-success lis-rounded-top py-4 border border-bottom-0 lis-brd-light">
                        <h5 class="text-uppercase lis-latter-spacing-2 text-white">Business, Custom</h5>
                        <p class="mb-0 text-white text-white">Contact sales for offer.</p>
                    </div>
                    <div class="border border-top-0 lis-brd-light bg-white py-5 lis-rounded-bottom">
                        <ul class="list-unstyled lis-line-height-3">
                            <li>Pro plan plus</li>
                            <li>Access to Jumcert</li>
                            <li>Access to Jumcert</li>
                            <li>Access to Jumcert</li>
                        </ul> <a href="javascript:;" class="btn btn-success btn-md lis-rounded-circle-50 px-4"
                            data-abc="true"><i class="fa fa-shopping-cart pl-2"></i>Upgrade</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<div class="container">
    <div class="block-element text-center m-b-10">
        <h3 class="title-text1 text-dark"> Our Pricing </h3>
    </div>
    <div class="block-element">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                <div class="pricing-box ">
                    <div class="pricing-box-head">
                        <div class="pricing-icon">
                            <img src="{{asset('front')}}/images/dollar-icon.svg">
                        </div>
                        <div class="pricing-title">
                            <h4 class="col-white"> Free 5000 words. </h4>
                            <p> (7 days trail) </p>
                        </div>
                    </div>
                    <div class="pricing-detail">
                        <h4 class="col-white"> Plan Includes </h4>
                        <ul>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Access to Jumcert </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Access to Event Library </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Pay-Per-View </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Chat/Message Feature </li>
                        </ul>
                    </div>
                    <div class="pricing-btn" style="margin-top: 15rem;">
                        <a href="javascript:void(0):" class="custom-btn2"> View All Details </a>
                        <a href="javascript:void(0):" class="btn custom-btn3 disabled"> Get Started </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                <div class="pricing-box ">
                    <div class="pricing-box-head">
                        <div class="pricing-icon">
                            <img src="{{asset('front')}}/images/dollar-icon.svg">
                        </div>
                        <div class="pricing-title">
                            <h4 class="col-white"> PRO </h4>
                        </div>
                    </div>
                    <div class="package-price w-100 text-center mb-4" id="professional">
                        <h4 id="solo_proprice"> $19.90 </h4>
                        <div>
                            <div class="demo">
                                <div class="range-slider">
                                    <input type="range" id="solo_proplan" value="@if($user_package->words == '20000' || $user_package->words < '20000'){{ 0 }}@elseif ($user_package->words == '50000'){{ 1 }}@elseif ($user_package->words == '200000'){{ 2 }}@elseif ($user_package->words == '500000'){{ 3 }}@endif" min="0" steps="1" max="3">
                                </div>
                            </div>
                        </div>
                        <h5 id="solo_protoken" style="margin-top: 10px;"> 20,000 words</h5>
                    </div>
                    <div class="pricing-detail">
                        <h4 class="col-white"> Plan Includes </h4>
                        <ul>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Starter plan plus </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Broadcast 1 to 1 Hosting </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Moderate Chat/Message Feature
                            </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Create Profile Channel </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Google docs style editor </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Keyword research by AI </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Chat support </li>

                        </ul>
                    </div>
                    <div class="pricing-btn">
                        <a href="javascript:void(0):" class="custom-btn2"> View All Details </a>
                        <a href="https://store.payproglobal.com/checkout?products[1][id]=82354&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user={{ auth('web')->user()->unique_id }}"
                            class="custom-btn3" id="buy-plan" data-current="{{ $user_package->words }}"> 
                            Current Plan
                        </a>
                        <input type="hidden" id="is-login" value="1">
                        <input type="hidden" id="logged-email" value="{{ auth('web')->user()->unique_id }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                <div class="pricing-box ">
                    <div class="pricing-box-head">
                        <div class="pricing-icon">
                            <img src="{{asset('front')}}/images/dollar-icon.svg">
                        </div>
                        <div class="pricing-title">
                            <h4 class="col-white"> Business, Custom </h4>
                            <p> Contact sales for offer. </p>
                        </div>
                    </div>
                    <div class="pricing-detail">
                        <h4 class="col-white"> Plan Includes </h4>
                        <ul>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Pro plan plus </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Access to Jumcert </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Access to Jumcert </li>
                            <li> <img src="{{asset('front')}}/images/check-icon.svg"> Access to Jumcert </li>
                        </ul>
                    </div>
                    <div class="pricing-btn" style="margin-top: 15rem;">
                        <a href="javascript:void(0):" class="custom-btn2"> View All Details </a>
                        <a href="javascript:void(0):" class="custom-btn3"> Upgrade </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    var isLogin = $('#is-login').val();
    var loggedEmail = $('#logged-email').val();
    var current = $('#buy-plan').data('current');

    $(document).ready(function () {
        var packNo = $('input#solo_proplan').val(); 

        if (packNo == 0) {
            $('#solo_proprice').html('$19.90')
            $('#solo_protoken').html('20,000 words');


            if (current == '20000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '20000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82354&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '20000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82354&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }



        }

        if (packNo == 1) {
            $('#solo_proprice').html('$29.90')
            $('#solo_protoken').html('50,000 words');

            // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;

            if (current == '50000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '50000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '50000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        }

        if (packNo == 2) {
            $('#solo_proprice').html('$79.90')
            $('#solo_protoken').html('200,000 words');

            // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
            // $('#buy-plan').attr('href',Newhref);

            if (current == '200000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '200000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '200000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        }

        if (packNo == 3) {
            $('#solo_proprice').html('$129.90')
            $('#solo_protoken').html('500,000 words');

            // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
            // $('#buy-plan').attr('href',Newhref);

            if (current == '500000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '500000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '500000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        } 
    });


    $("input#solo_proplan").on('change', function() {
        var value = $(this).val();
        $('#level').val(value);
        // var current = $('#buy-plan').data('current');
        if (value == 0) {
            $('#solo_proprice').html('$19.90')
            $('#solo_protoken').html('20,000 words');


            if (current == '20000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '20000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82354&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '20000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82354&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        }

        if (value == 1) {
            $('#solo_proprice').html('$29.90')
            $('#solo_protoken').html('50,000 words');

            // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;

            if (current == '50000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '50000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '50000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        }

        if (value == 2) {
            $('#solo_proprice').html('$79.90')
            $('#solo_protoken').html('200,000 words');

            // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
            // $('#buy-plan').attr('href',Newhref);

            if (current == '200000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '200000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '200000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        }

        if (value == 3) {
            $('#solo_proprice').html('$129.90')
            $('#solo_protoken').html('500,000 words');

            // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
            $('#buy-plan').attr('href',Newhref);

            if (current == '500000') {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > '500000'){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < '500000'){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        }
    });
    
</script>
@endsection