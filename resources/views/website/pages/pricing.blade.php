@extends('layouts.web_main')
@section('css')
<style>
    .ppg-buy-now-btn {
        display: inline-block;
        /* background: #19cb92; */
        border-radius: 29px;
        color: #fff;
        padding: 14px 42px;
        margin: 10px;
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
    }

    .ppg-checkout-modal {
        z-index: 99999;
        display: none;
        background-color: transparent;
        border: 0px none transparent;
        visibility: visible;
        margin: 0px;
        padding: 0px;
        -webkit-tap-highlight-color: transparent;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
    }

    .ppg-checkout-modal.ppg-show {
        display: block;
    }

    .ppg-btn-close {
        position: absolute;
        display: none;
        align-items: center;
        justify-content: center;
        top: 20px;
        right: 35px;
        background: rgb(0 0 0 / 35%);
        height: 50px;
        width: 50px;
        border: none;
        outline: none;
        cursor: pointer;
    }

    .ppg-btn-close.ppg-show {
        display: flex;
    }

    .ppg-btn-close img {
        width: 24px;
    }

    .ppg-iframe {
        width: 100%;
        height: 100%;
        border: 0;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .ppg-loader {
        position: absolute;
        top: calc(50% - 24px);
        left: calc(50% - 24px);
        width: 48px;
        height: 48px;
        border: 5px solid #000;
        border-bottom-color: transparent;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: ppg-rotation 1s linear infinite;
    }

    @keyframes ppg-rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
@endsection
@section('content')
<!-- Page Banner Section Starts Here -->

<!-- Page Banner Section Ends Here -->
<!-- Pricing Packages Section Starts Here -->
<section class="nwwbprc pad-top-40 gvngblack" id="writewht1">
    <div class="container">
        <div class="block-element text-center m-b-50">
            <div class="block-element text-center m-b-20">
                <h3 class="title-text1 m-l30" id="writewhtbtn1"> Pricing </h3>
            </div>
            <div class="row m-b-20">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="row col-lg-12 pad-bot-30">
                        <div class="col-lg-5 col-md-5 col-sm-4 col-4">
                            <span class="billmonth" id="writewhtbtn2">Billed monthly</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-4">
                            <label class="switch2">
                                <input type="checkbox" id="toggleyearly" checked>
                                <span class="slider2 round2 hmnwtbbck"></span>
                            </label>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-4 col-4">
                            <span class="billyear col-orange" id="writewhtbtn3">Billed yearly</span>
                        </div>
                        <div class="block-element text-center m-b-10">
                            <p class="tac col-white font-size-30" id="bxswht"><b>Save up to 20% with yearly billing </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="block-element">
                    <div class="row align-items-center" style="width: 100%; height: auto;">
                        <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                            <div class="pricing-box" id="prcngwht1">
                                <h2 class="col-white col-lg-12 cntntm" id="prcngwht1a"> Basic </h2>
                                <div class="pricing-box-head">
                                    <div class="pricing-icon">
                                        <img src="{{asset('front')}}/images/dollar-icon.svg">
                                    </div>
                                    <div class="pricing-title">
                                        <h5 class="col-white d-f j-c-e" id="prcngwht1b"><b> 7 Days <br> free trial </b>
                                        </h5>
                                        <p id="prcngwht1c"> to 5,000 words </p>
                                    </div>
                                </div>
                                <div class="pricing-detail">
                                    <h4 class="col-white" id="prcngwht1d"> Plan Includes </h4>
                                    <ul>
                                        <li id="prcngwht1e"> <img src="{{asset('front')}}/images/tickorange.svg"> SEO
                                            score</li>
                                        <li id="prcngwht1e1"> <img src="{{asset('front')}}/images/tickorange.svg"> 60+
                                            templates </li>
                                        <li id="prcngwht1e2"> <img src="{{asset('front')}}/images/tickorange.svg"> Live
                                            chat support </li>
                                        <li id="prcngwht1e3"> <img src="{{asset('front')}}/images/tickorange.svg"> 20+
                                            languages </li>
                                        <li class="pad-bot-40" id="cpywht2a"> <img
                                                src="{{asset('front')}}/images/tickorange.svg"> Ezchat </li>
                                                <br><br><br>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a  href="{{route('web.pricing')}}" class="custom-btn2" id="prcngwht1f"> <u> View All
                                            Details</u> </a>
                                    @if (auth('web')->check() && $packageData->plan_code == 'FRP0')
                                    <a href="javascript:void(0);" class="btn custom-btn3 disabled"> Current Plan </a>
                                    @elseif (auth('web')->check() && $packageData->plan_code != 'FRP0')
                                    <a href="javascript:void(0);" class="btn custom-btn3 disabled"> Downgrade Plan </a>
                                    @else
                                    <a href="{{route('login')}}" class="custom-btn3"> Start Free </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                            <div class="pricing-box" id="prcngwht2">
                                <h2 class="col-white col-lg-12 cntntm pad-bot-20" id="prcngwht21achk"> Premium </h2>
                                <div class="pricing-box-head">
                                    <div class="pricing-icon">
                                        <img src="{{asset('front')}}/images/dollar-icon.svg">
                                    </div>
                                    <div class="pricing-title">
                                        <h4 class="col-white" id="solo_proprice2"> $19.90/Mon </h4>
                                        <p class="tas" id="solo_protoken2">20,000 words</p>
                                        <p class="tas" id="solo_proreport">10 reports</p>
                                    </div>
                                </div>
                                <div class="package-price w-100 text-center mb-4" id="professional">
                                    <h4 id="solo_proprice"> $ 19.90 </h4>
                                    <div>
                                        <div class="demo">
                                            <div class="range-slider">
                                                <input type="range" id="solo_proplan"
                                                    value="@if($words == '20000' || $words < '20000'){{ 0 }}@elseif ($words == '50000'){{ 1 }}@elseif ($words == '200000'){{ 2 }}@elseif ($words == '500000'){{ 3 }}@endif"
                                                    min="0" steps="1" max="3">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="font-size-10" id="solo_protoken"> 20,000 words</h5>
                                </div>
                                <div class="pricing-detail">
                                    <h4 class="col-white tac" id="prcngwht26"> Plan Includes </h4>
                                    <ul>
                                        <li id="prcngwht27"> <img src="{{asset('front')}}/images/tickpurple.svg"> 60+
                                            templates </li>
                                        <li id="prcngwht28"> <img src="{{asset('front')}}/images/tickpurple.svg"> Al
                                            Article Writer </li>
                                        <li id="prcngwht29"> <img src="{{asset('front')}}/images/tickpurple.svg">
                                            Keyword Generati </li>
                                        <li id="prcngwht221"> <img src="{{asset('front')}}/images/tickpurple.svg"> SEO
                                            Score improvement </li>
                                        <li id="prcngwht222"> <img src="{{asset('front')}}/images/tickpurple.svg"> 20+
                                            languages </li>
                                        <li id="prcngwht223"> <img src="{{asset('front')}}/images/tickpurple.svg">
                                            Ezchat </li>
                                        <li id="prcngwht224"> <img src="{{asset('front')}}/images/tickpurple.svg"> Live
                                            chat support </li>

                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a  href="{{route('web.pricing')}}" class="custom-btn2" id="prcngwht225"><u> View All Details </u></a>
                                    @if (auth('web')->check())
                                        <a  href="javascript:void(0);" onclick="setPaymentBtn(this);" data-packageid="6"
                                        class="custom-btn3" id="buy-plan" data-plancode="{{ $packageData->plan_code }}" data-current="{{ $user_package->words }}"> Upgrade Plan</a>
                                        <input type="hidden" id="is-login" value="1">
                                        <input type="hidden" id="logged-email" value="{{ auth('web')->user()->unique_id }}">
                                    @else
                                        <a href="{{ route('login') }}"
                                        class="custom-btn3"> Upgrade Plan</a>
                                        <input type="hidden" id="is-login" value="0">
                                    @endif
                                    {{-- <a
                                        href="https://store.payproglobal.com/checkout?products[1][id]=81908&use-test-mode=false&secret-key=htYBPBo@nV"
                                        class="custom-btn3"> Current Plan </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                            <div class="pricing-box" id="prcngwht3">
                                <h2 class="col-white col-lg-12 cntntm" id="prcngwht3a"> Enterprise </h2>
                                <div class="pricing-box-head">
                                    <div class="pricing-icon">
                                        <img src="{{asset('front')}}/images/dollar-icon.svg">
                                    </div>
                                    <div class="pricing-title tas">
                                        <h4 class="col-white" id="prcngwht3b"> Custom Pricing </h4>
                                        <p id="prcngwht3c"> 300,000 words <br> 200+ reports </p>
                                    </div>
                                </div>
                                <div class="pricing-detail">
                                    <h4 class="col-white" id="prcngwht3d"> Plan Includes </h4>
                                    <ul>
                                        <li id="prcngwht3e"> <img src="{{asset('front')}}/images/tickorange.svg"> latest
                                            AI models </li>
                                        <li id="prcngwht3f"> <img src="{{asset('front')}}/images/tickorange.svg"> 60+
                                            templates </li>
                                        <li id="prcngwht3g"> <img src="{{asset('front')}}/images/tickorange.svg">
                                            Keyword Generation </li>
                                        <li id="prcngwht3h"> <img src="{{asset('front')}}/images/tickorange.svg"> SEO
                                            Score improvement </li>
                                        <li id="prcngwht3i"> <img src="{{asset('front')}}/images/tickorange.svg"> Al
                                            Article Writer </li>
                                        <li id="cpywht2b"> <img src="{{asset('front')}}/images/tickorange.svg"> Ezchat
                                        </li>
                                        <li id="cpywht1a"> <img src="{{asset('front')}}/images/tickorange.svg"> 20+
                                            languages </li>
                                        <li id="cpywht1b"> <img src="{{asset('front')}}/images/tickorange.svg"> Live
                                            chat support </li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{route('web.pricing')}}" class="custom-btn2" id="prcngwht3j"><u> View All Details </u></a>
                                    <a href="mailto:sales@easyseo.ai" class="custom-btn3"> Contact us </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
<!-- Pricing Packages Section Ends Here -->
<section class="pad-top-40 pad-bot-20 maintbl abtbsns gvngblack" id="writewht2">
    <div class="container">
        <div class="block-element text-center m-b-40">
            <h3 class="title-text1" id="amzngwht6a"> Compare plans </h3>
        </div>
        <div class="table-responsive">
            <table class="col-lg-12 " id="tblpricbckcolor">
                <tr style="display: none;">
                    <th class="wrkspc">Features</th>
                    <th>Basic (free trial)</th>
                    <th>Premium</th>
                    <th>Enterprise</th>
                </tr>
                <tr class="hmnwtbbck" style="line-height: 80px;">
                    <th class="wrkspc" id="bxswht1c">Features</th>
                    <th id="prc1">Basic (free trial)</th>
                    <th id="prc2">Premium</th>
                    <th id="prc3">Enterprise</th>
                </tr>
                <tr>
                    <td class="mmbr" id="amzngwht8b">Word credits per month <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="amzngwht9a">5,000</td>
                    <td id="amzngwht9b">20,000 - 300,000</td>
                    <td id="amzngwht10a">300,000 - unlimited</td>
                </tr>
                <tr class="hmnwtbbck">
                    <td class="mmbr hgt" id="hm1">User Logins <img src="{{asset('front')}}/images/questionmark.svg">
                    </td>
                    <td class="hgt" id="hm2">1</td>
                    <td class="hgt" id="gotwht">up to 10</td>
                    <td class="hgt" id="getwht">More than 10</td>
                </tr>
                <tr>
                    <td class="mmbr" id="atmtwht4">Continuously updated with <br> the latest AI models <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking1">
                        <img src="{{asset('front')}}/images/tk.svg" id="bsnsadvntgimg1"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="bsnsadvntgimg2">
                    </td>
                    <td id="prcchecking2">
                        <img src="{{asset('front')}}/images/tk.svg" id="bsnsadvntgimg3"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="bsnsadvntgimg4">
                    </td>
                    <td id="prcchecking3">
                        <img src="{{asset('front')}}/images/tk.svg" id="bsnsadvntgimg5"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="bsnsadvntgimg6">
                    </td>
                </tr>
                <tr class="hmnwtbbck">
                    <td class="mmbr hgt" id="getwht1">AI models for improved <br> reliability and performance. <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking4"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick31"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick32">
                    </td>
                    <td id="prcchecking5"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick33"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick34">
                    </td>
                    <td id="prcchecking6"><img src="{{asset('front')}}/images/tk.svg" id="bsnsadvntgimg7"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="bsnsadvntgimg8">
                    </td>
                </tr>
                <tr>
                    <td class="mmbr" id="atmtwht6">60+ unique templates<img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking7"><img src="{{asset('front')}}/images/tk.svg" id="bsnsadvntgimg9"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"
                            id="bsnsadvntgimg10"></td>
                    <td id="prcchecking8"><img src="{{asset('front')}}/images/tk.svg" id="prpslimg1"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prpslimg2"></td>
                    <td id="prcchecking9"><img src="{{asset('front')}}/images/tk.svg" id="prpslimg3"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prpslimg4"></td>
                </tr>
                <tr class="hmnwtbbck">
                    <td class="mmbr hgt" id="bxswht1a">Access to SEO score to <br> maximize SEO potential<img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking10"><img src="{{asset('front')}}/images/tk.svg" id="prpslimg5"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prpslimg6"></td>
                    <td id="prcchecking11"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhtimg1"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhtimg2">
                    </td>
                    <td id="prcchecking12"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhtimg3"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhtimg4">
                    </td>
                </tr>
                <tr>
                    <td class="mmbr" id="atmtwht8">Al Article Writer<img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking13"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhtimg5"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhtimg6">
                    </td>
                    <td id="prcchecking14"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhtimg7"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhtimg8">
                    </td>
                    <td id="prcchecking15"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhttimg1"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhttimg2">
                    </td>
                </tr>
                <tr class="hmnwtbbck">
                    <td class="mmbr hgt" id="bxswht1b">20+ languages<img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking16"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhttimg3"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhttimg4">
                    </td>
                    <td id="prcchecking17"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhttimg5"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhttimg6">
                    </td>
                    <td id="prcchecking18"><img src="{{asset('front')}}/images/tk.svg" id="atmtwhttimg7"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="atmtwhttimg8">
                    </td>
                </tr>
                <tr>
                    <td class="mmbr" id="instwht1">Ezchat<img src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="prcchecking19"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick1"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick2">
                    </td>
                    <td id="prcchecking20"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick3"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick4">
                    </td>
                    <td id="prcchecking21"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick5"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick6">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
<section class="pad-top-40 pad-bot-20 abtbsns gvngblack" id="atmtwhtt">
    <div class="container">
        <div class="table-responsive">
            <table class="col-lg-12 " id="tblpricbckcolor1">
                <tr>
                    <th class="wrkspc" id="bxswht4b">Integrations and Extensions</th>
                    <th> &nbsp; &nbsp; &nbsp;</th>
                    <th> &nbsp; &nbsp; &nbsp; &nbsp; </th>
                    <th> &nbsp; &nbsp; &nbsp; &nbsp; </th>
                </tr>
                <tr style="display: none !important;">
                    <td class="mmbr" id="atmtwhtt1">Keyword Generation <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td id="atmtwhtt1a">10-200 keywords</td>
                    <td id="atmtwhtt2">200-unlimited <br> keywords</td>
                </tr>
                <tr>
                    <td class="mmbr" id="atmtwhtt1">Keyword Generation <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td></td>
                    <td id="atmtwhtt1a">10-200 keywords</td>
                    <td id="atmtwhtt2">200-unlimited <br> keywords</td>
                </tr>
                <tr>
                    <td class="mmbr hgt" id="bxswht3b">SEO Score improvement<img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td></td>
                    <td id="prcchecking23"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick11"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick12">
                    </td>
                    <td class="m-l-100" id="prcchecking24"><img src="{{asset('front')}}/images/tk.svg"
                            id="prcwttick9"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"
                            id="prcwttick10"></td>
                </tr>
                <tr>
                    <td class="mmbr" id="cpywht1">Plagiarism detection <br> tool access <span class="soon"
                            id="soon21">soon</span><img src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td></td>
                    <td id="prcchecking25"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick7"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick8">
                    </td>
                    <td id="prcchecking26"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick13"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick14">
                    </td>
                </tr>
                <tr>
                    <td class="mmbr hgt" id="hm3">Access to newest features <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td></td>
                    <td id="prcchecking27"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick15"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick16">
                    </td>
                    <td id="prcchecking28"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick17"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick18">
                    </td>

                </tr>
                <tr>
                    <td class="mmbr hgt" id="hm4">Custom AI models <span class="soon" id="soon22">soon</span><img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td></td>
                    <td id="prcchecking29"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick35"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick36">
                    </td>
                    <td id="prcchecking30"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick37"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick38">
                    </td>
                </tr>
                <tr>
                    <td class="mmbr hgt" id="writewht1b">API Access <span class="soon" id="soon23">soon</span><img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                    <td></td>
                    <td></td>
                    <td id="prcchecking31"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick39"><img
                            src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick40">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>
<section class="pad-top-40 abtbsns thrdtbl gvngblack" id="atmtwht">
    <div class="container">
        <table class="col-lg-12 " id="tblpricbckcolor2">
            <tr>
                <th class="wrkspc hgt" id="bxswht4c">SUPPORT</th>
                <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </th>
                <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </th>
                <th> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </th>
            </tr>
            <tr>
                <td class="mmbr hgt" id="cpywht3">Live chat customer support <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                <td id="prcchecking32"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick41"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick42"></td>
                <td id="prcchecking35"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick43"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick44"></td>
                <td id="prcchecking38"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick45"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick46"></td>
            </tr>
            <tr>
                <td class="mmbr hgt" id="bxswht">Technical support <img
                            src="{{asset('front')}}/images/questionmark.svg">
                </td>

                <td id="prcchecking33"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick19"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick20"></td>
                <td id="prcchecking36"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick21"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick22"></td>
                <td id="prcchecking39"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick23"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick24"></td>
            </tr>
            <tr>
                <td class="mmbr hgt" id="cntctbxswht1b">Learning Resources <img
                            src="{{asset('front')}}/images/questionmark.svg"></td>
                <td id="prcchecking34"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick25"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick26"></td>
                <td id="prcchecking37"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick27"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick28"></td>
                <td id="prcchecking40"><img src="{{asset('front')}}/images/tk.svg" id="prcwttick29"><img
                        src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;" id="prcwttick30"></td>
            </tr>
        </table>
    </div>
</section>
<section class="pad-bot-40 abtbsns bg-sec12 seosearch gvngblack" id="bxswht1">
    <div class="container m-t-100">
        <div class="row align-items-center workflow">
            <!-- Image Column Starts Here -->
            <div class="col-md-5 col-lg-5 col-sm-12 col-12 order-lg-2 order-md-2 order-sm-1 order-1">
                <div class="custom-image1">
                    <img alt="Robotic Infographics" src="{{asset('front')}}/images/seo.svg">
                </div>
            </div>
            <!-- Image Column Ends Here -->
            <!-- Detail Textual Column Starts Here -->
            <div class="col-md-7 col-lg-7 col-sm-12 col-12 order-lg-1 order-md-1 order-sm-2 order-2">
                <div class="detail-text">
                    <h3 class="col-white" id="cntctbxswht2a"> Get
                        <span class="col-orange bnr-fnt"> actionable clicks </span> with AI and improve your SEO for
                        search <br class="dn"> engines with <a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai</a>
                    </h3>
                    <p class="col-white" id="cntctbxswht2b">Easily bring AI in your workflow to improve & create SEO
                        content, wherever you are. </p>
                    <a href="{{route('register')}}" class="custom-btn4 nwwbabtcustom-btn4"> Get Start
                    </a>
                </div>
            </div>
            <!-- Detail Textual Column Ends Here -->
        </div>
    </div>
</section>
<section>
    <div id="cpywht2"></div>
    <div id="gotwht2"></div>
    <div id="cntctbxswht3a"></div>
    <div id="gotwht2a"></div>
    <div id="gotwht2b"></div>
    <div id="gotwht2c"></div>
    <div id="gotwht2d"></div>
    <div id="gotwht2e"></div>
    <div id="gotwht2f"></div>
    <div id="gotwht3"></div>
    <div id="gotwht3a"></div>
    <div id="gotwht3b"></div>
    <div id="gotwht3c"></div>
    <div id="gotwht3d"></div>
    <div id="gotwht3e"></div>
    <div id="gotwht3f"></div>
    <div id="gotwht1"></div>
    <div id="gotwht1a"></div>
    <div id="gotwht1b"></div>
    <div id="gotwht1c"></div>
    <div id="gotwht1d"></div>
    <div id="gotwht1e"></div>
    <div id="gotwht1f"></div>
    <div id="gotwht4"></div>
    <div id="gotwht4a"></div>
    <div id="gotwht4b"></div>
    <div id="gotwht4c"></div>
    <div id="gotwht4d"></div>
    <div id="gotwht4e"></div>
    <div id="gotwht4f"></div>
    <div id="gotwht5"></div>
    <div id="gotwht5a"></div>
    <div id="gotwht5b"></div>
    <div id="gotwht5c"></div>
    <div id="gotwht5d"></div>
    <div id="gotwht5e"></div>
    <div id="gotwht5f"></div>
    <div id="blgstayuptodate1"></div>
    <div id="writewht1a"></div>
    <div id="hmamazonimg1"></div>
    <div id="hmamazonimg2"></div>
    <div id="hmamazonimg3"></div>
    <div id="hmamazonimg4"></div>
    <div id="prcngwht22b"></div>
    <div id="prcngwht23c"></div>
    <div id="prcngwht24d"></div>
    <div id="prcngwht25"></div>
    <div id="hm1"></div>
    <div id="hm2"></div>
    <div id="hm3"></div>
    <div id="hm4"></div>
    <div id="prcchecking22"></div>
    <div id="prcchecking25"></div>
    <div id="prcchecking26"></div>
    <div id="prcchecking27"></div>
    <div id="prcwttick11"></div>
    <div id="prcwttick12"></div>
    <div id="prcwttick13"></div>
    <div id="prcwttick14"></div>
    <div id="prcwttick15"></div>
    <div id="prcwttick16"></div>
    <div id="prcwttick17"></div>
    <div id="prcwttick18"></div>
    <div id="writewht1b"></div>
    <div id="writewht2a"></div>
    <div id="writewht2b"></div>
    <div id="writewht3a"></div>
    <div id="writewht3b"></div>
    <div id="writewht1c"></div>
    <div id="writewht2c"></div>
    <div id="writewht3c"></div>
    <div id="amzngwht10"></div>
    <div id="prcngwht"></div>
    <div id="blgstayuptodate"></div>
    <div id="atmwtbckcolor"></div>
    <div id="atmwtbckcolor2"></div>
    <div id="chngabtboxshadow" style="display: none !important;"></div>
    <div id="chngabtboxshadow1" style="display: none !important;"></div>
    <div id="chngabtboxshadow2" style="display: none !important;"></div>
    <div id="chngabtboxshadow3" style="display: none !important;"></div>
    <div id="chngabtboxshadow4" style="display: none !important;"></div>
    <div id="chngabtboxshadow5" style="display: none !important;"></div>
    <div id="prcngwht3g"></div>
    <div id="prcngwht28"></div>
    <div id="prcngwht3f"></div>
    <div id="prcngwht26"></div>
    <div id="prcngwht1a"></div>
    <div id="writewht3"></div>
    <div id="prcngwht2"></div>
    <div id="gotwht"></div>
    <div id="getwht"></div>
    <!-- <div id="getwht1"></div>
    <div id="bxswht1a"></div>
    <div id="bxswht1b"></div> -->
    <div id="bxswht1c"></div>
    <div id="bxswht2"></div>
    <div id="bxswht2a"></div>
    <div id="bxswht2b"></div>
    <div id="bxswht2c"></div>
    <div id="bxswht3a"></div>
    <div id="bxswht3b"></div>
    <div id="bxswht3c"></div>
    <div id="bxswht4a"></div>
    <div id="bxswht4b"></div>
    <div id="bxswht4c"></div>
    <div id="bxswht3"></div>
    <div id="bxswht4"></div>
    <div id="bxswht"></div>
    <div id="bsnsadvntg"></div>
    <div id="bsnsadvntgimg1"></div>
    <div id="bsnsadvntgimg2"></div>
    <div id="bsnsadvntgimg3"></div>
    <div id="bsnsadvntgimg4"></div>
    <div id="bsnsadvntgimg5"></div>
    <div id="bsnsadvntgimg6"></div>
    <div id="bsnsadvntgimg7"></div>
    <div id="bsnsadvntgimg8"></div>
    <div id="bsnsadvntgimg9"></div>
    <div id="bsnsadvntgimg10"></div>
    <div id="bsnsadvntg1a"></div>
    <div id="bsnsadvntg1b"></div>
    <div id="bsnsadvntg1c"></div>
    <div id="bsnsadvntg1d"></div>
    <div id="bsnsadvntg1e"></div>
    <div id="bsnsadvntg1f"></div>
    <div id="bsnsadvntg1g"></div>

    <div id="bsnsadvntg1h"></div>
    <div id="bsnsadvntg1i"></div>
    <div id="bsnsadvntg1j"></div>
    <div id="bsnsadvntg1k"></div>
    <div id="bsnsadvntg1l"></div>
    <div id="bsnsadvntg1m"></div>
    <div id="bsnsadvntg1n"></div>
    <div id="bsnsadvntg1o"></div>
    <div id="bsnsadvntg1"></div>
    <div id="bsnsadvntg2"></div>
    <div id="bsnsadvntg3"></div>
    <div id="bsnsadvntg4"></div>
    <div id="bsnsadvntg5"></div>
    <div id="prpslimg1"></div>
    <div id="prpslimg2"></div>
    <div id="prpslimg3"></div>
    <div id="prpslimg4"></div>
    <div id="prpslimg5"></div>
    <div id="prpslimg6"></div>
    <div id="nowht"></div>
    <div id="nowht1"></div>
    <div id="prpsl"></div>
    <div id="prpsl1m"></div>
    <div id="prpsl2m"></div>
    <div id="prpsl3m"></div>
    <div id="prpsl2"></div>
    <div id="prpsl3"></div>
    <div id="prpsl4"></div>
    <div id="prpsl5"></div>
    <div id="prpsl6"></div>
    <div id="prpsl7"></div>
    <div id="prpsl8"></div>
    <div id="prpsl9"></div>
    <div id="prpsl10"></div>
    <div id="amzngwht3achk"></div>
    <div id="amzngwht3bchk"></div>
    <div id="amzngwht4a"></div>
    <div id="amzngwht4b"></div>
    <div id="bannersecwht"></div>
    <div id="headerwht"></div>
    <div id="blcklogo"></div>
    <div id="whtlogo"></div>
    <div id="menuitemwht"></div>
    <div id="menuitemwht2"></div>
    <div id="menuitemwht3"></div>
    <div id="menuitemwht4"></div>
    <div id="menuitemwht5"></div>
    <div id="mainwht"></div>
    <div id="main1wht"></div>
    <div id="main2wht"></div>
    <div id="main3wht"></div>
    <div id="main4wht"></div>
    <div id="cntctbxswht"></div>
    <div id="cntctbxswht1"></div>
    <div id="cntctbxswht2"></div>
    <div id="cntctbxswht3"></div>
    <div id="cntctbxswht1a"></div>
    <div id="cntctbxswht1b"></div>
    <div id="cntctbxswht2a"></div>
    <div id="cntctbxswht2b"></div>
    <div id="cntctbxswht3a"></div>
    <div id="cntctbxswht3b"></div>
    <div id="trsted"></div>
    <div id="amzngwht"></div>
    <div id="amzngwht2"></div>
    <div id="amzngwht3"></div>
    <div id="amzngwht4"></div>
    <div id="amzngwht5"></div>
    <div id="amzngwht6"></div>
    <div id="amzngwht7"></div>
    <div id="amzngwht8"></div>
    <div id="amzngwht9"></div>
    <div id="amzngwht5a"></div>
    <div id="amzngwht5b"></div>
    <div id="amzngwht6a"></div>
    <div id="amzngwht6b"></div>
    <div id="amzngwht7a"></div>
    <div id="amzngwht7b"></div>
    <div id="amzngwht8a"></div>
    <div id="amzngwht8b"></div>
    <div id="amzngwht9a"></div>
    <div id="amzngwht9b"></div>
    <div id="amzngwht10a"></div>
    <div id="amzngwht10b"></div>
    <div id="atmtwht1"></div>
    <div id="atmtwht2"></div>
    <div id="atmtwht3"></div>
    <div id="atmtwht4"></div>
    <div id="atmtwht5"></div>
    <div id="atmtwht6"></div>
    <div id="atmtwht7"></div>
    <div id="atmtwht8"></div>
    <div id="atmtwht9"></div>
    <div id="atmtwhtimg1"></div>
    <div id="atmtwhtimg2"></div>
    <div id="atmtwhtimg3"></div>
    <div id="atmtwhtimg4"></div>
    <div id="atmtwhtimg5"></div>
    <div id="atmtwhtimg6"></div>
    <div id="atmtwhtimg7"></div>
    <div id="atmtwhtimg8"></div>
    <div id="instwht"></div>
    <div id="instwht1"></div>
    <div id="instwht2"></div>
    <div id="atmtwhtt1"></div>
    <div id="atmtwhtt1a"></div>
    <div id="atmtwhtt2"></div>
    <div id="atmtwhtt2a"></div>
    <div id="atmtwhtt3"></div>
    <div id="atmtwhtt3a"></div>
    <div id="atmtwhtt4"></div>
    <div id="atmtwhtt4a"></div>
    <div id="atmtwhttimg1"></div>
    <div id="atmtwhttimg2"></div>
    <div id="atmtwhttimg3"></div>
    <div id="atmtwhttimg4"></div>
    <div id="atmtwhttimg5"></div>
    <div id="atmtwhttimg6"></div>
    <div id="atmtwhttimg7"></div>
    <div id="atmtwhttimg8"></div>
</section>



@endsection
@section('js')
<script>

function detailFunction(value) {
      value;
    }
    window.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('pg3');
        element.classList.add('pghovered');
    });
    $(document).ready(function () {
        var packageToggle = 1;
        var isLogin = $('#is-login').val();
        var loggedEmail = $('#logged-email').val();
        var current = $('#buy-plan').data('current');
        var planCode = $('#buy-plan').data('plancode');

        // alert(planCode);

        var monthlyCode = ['P20','P50','P200','P500'];
        var yearlyCode = ['P20-year','P50-year','P200-year','P500-year'];

        var slideIndex = 0;

        const toggleyearly = document.getElementById('toggleyearly');
        const solo_proprice = document.getElementById('solo_proprice');
        const solo_proprice2 = document.getElementById('solo_proprice2');

        let slideChanger = (value,current,packageToggle,monthlyCode,yearlyCode,loggedEmail) => {
            $("input#solo_proplan").val(value);
            $('#level').val(value);

            // alert(value);

            if (value == 0) {
                $('#solo_proprice').html('$24.90');
                $('.solo_proprice_y').html('$19.90');
                $('#solo_proprice2').html('$24.90/Mon');
                $('.solo_proprice2_y').html('$19.90/Mon');
                $('#solo_protoken').html('20,000 words');
                $('#solo_protoken2').html('20,000 words');
                $('#solo_proreport').html('10 reports');


                if (current == 20000) {

                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }

                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }
                }

                if(current < 20000){
                    $('#buy-plan').html('Upgrade Plan');

                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current > 20000){
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }

            if (value == 1) {
                $('#solo_proprice').html('$34.90');
                $('.solo_proprice_y').html('$29.90');
                $('#solo_proprice2').html('$34.90/Mon');
                $('.solo_proprice2_y').html('$29.90/Mon');
                $('#solo_protoken').html('50,000 words');
                $('#solo_protoken2').html('50,000 words');
                $('#solo_proreport').html('30 reports');


                if (current == 50000) {
                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }

                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }
                }

                if(current > 50000){
                    // $('#buy-plan').html('Downgrade Plan');
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 50000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }

            if (value == 2) {
                $('#solo_proprice').html('$99.90');
                $('.solo_proprice_y').html('$79.90');
                $('#solo_proprice2').html('$99.90/Mon');
                $('.solo_proprice2_y').html('$79.90/Mon');
                $('#solo_protoken').html('200,000 words');
                $('#solo_protoken2').html('200,000 words');
                $('#solo_proreport').html('80 reports');


                if (current == 200000) {
                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }


                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }
                }

                if(current > 200000){
                    // $('#buy-plan').html('Downgrade Plan');
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 200000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }

            if (value == 3) {
                $('#solo_proprice').html('$159.90');
                $('.solo_proprice_y').html('$129.90');
                $('#solo_proprice2').html('$159.90/Mon');
                $('.solo_proprice2_y').html('$129.90/Mon');
                $('#solo_protoken').html('500,000 words');
                $('#solo_protoken2').html('500,000 words');
                $('#solo_proreport').html('200 reports');

                if (current == 500000) {
                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',9);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        $('#buy-plan').data('packageid',9);

                        return false;
                    }

                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }
                }

                if(current > 500000){
                    // $('#buy-plan').html('Downgrade Plan');
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',9);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 500000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',9);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }
        }

        if (monthlyCode.includes(planCode)) {
            $('#toggleyearly').trigger("click");
            slideIndex = monthlyCode.indexOf(planCode);
            packageToggle = 0;
            solomonthlyplan();
            solo_proprice.classList.remove('solo_proprice_y');
            solo_proprice.classList.add('solo_proprice');
            solo_proprice2.classList.add('solo_proprice2');
            solo_proprice2.classList.remove('solo_proprice2_y');
            slideChanger(slideIndex,current,packageToggle,monthlyCode,yearlyCode,loggedEmail);
        }

        if (yearlyCode.includes(planCode)) {
            slideIndex = yearlyCode.indexOf(planCode);
            packageToggle = 1;
            soloyearlyplan();
            solo_proprice.classList.add('solo_proprice_y');
            solo_proprice2.classList.add('solo_proprice2_y');
            solo_proprice.classList.remove('solo_proprice');
            solo_proprice2.classList.remove('solo_proprice2');
            slideChanger(slideIndex,current,packageToggle,monthlyCode,yearlyCode,loggedEmail);
        }

        if (!monthlyCode.includes(planCode) && !yearlyCode.includes(planCode)) {
            soloyearlyplan();
            solo_proprice.classList.add('solo_proprice_y');
            solo_proprice2.classList.add('solo_proprice2_y');
            solo_proprice.classList.remove('solo_proprice');
            solo_proprice2.classList.remove('solo_proprice2');
        }

        // solo_proplan.classList.add('solo_proplan_y');
        toggleyearly.addEventListener('click', function() {
           const checkingd =  document.getElementById("solo_proplan");
           checkingd.setAttribute("style", "background: linear-gradient(to right,  #e3bfff  0%,  #e3bfff  ' + value + '%, #e3bfff ' + value + '%, #e3bfff 100%);");
            if (solo_proprice.classList.contains('solo_proprice_y')) {
                packageToggle = 0;

                solomonthlyplan();

                solo_proprice.classList.remove('solo_proprice_y');
                solo_proprice.classList.add('solo_proprice');
                solo_proprice2.classList.add('solo_proprice2');
                solo_proprice2.classList.remove('solo_proprice2_y');
            } else {
                packageToggle = 1;
                soloyearlyplan();

                solo_proprice.classList.add('solo_proprice_y');
                solo_proprice2.classList.add('solo_proprice2_y');
                solo_proprice.classList.remove('solo_proprice');
                solo_proprice2.classList.remove('solo_proprice2');
            }


        });


        function soloyearlyplan(){
            $("input#solo_proplan").val(0);
            $('#solo_proprice').html('$19.90');
            $('.solo_proprice_y').html('$19.90');
            $('#solo_proprice2').html('$19.90/Mon');
            $('.solo_proprice2_y').html('$19.90/Mon');
            $('#solo_protoken').html('20,000 words');
            $('#solo_protoken2').html('20,000 words');
            $('#solo_proreport').html('10 reports');

            if (current == 20000) {
                if(packageToggle == 0 && monthlyCode.includes(planCode)){
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(packageToggle == 1 && yearlyCode.includes(planCode)){
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(packageToggle == 1 && monthlyCode.includes(planCode)){
                    $('#buy-plan').html('Upgrade Plan');
                    // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    // $('#buy-plan').attr('href',Newhref);
                    // return false;
                    $('#buy-plan').data('packageid',6);
                        return false;
                }

                if(packageToggle == 0 && yearlyCode.includes(planCode)){
                    $('#buy-plan').html('Downgrade Plan');
                    // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    // $('#buy-plan').attr('href',Newhref);
                    // return false;
                    $('#buy-plan').data('packageid',6);
                        return false;
                }
            }

            if(current < 20000){
                $('#buy-plan').html('Upgrade Plan');
                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                // $('#buy-plan').attr('href',Newhref);
                // return false;
                $('#buy-plan').data('packageid',6);
                        return false;
            }

            if(current > 20000){
                if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                    $('#buy-plan').html('Upgrade Plan');
                }else{
                    $('#buy-plan').html('Downgrade Plan');
                }
                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&exfo=742&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                // $('#buy-plan').attr('href',Newhref);
                // return false;
                $('#buy-plan').data('packageid',6);
                        return false;
            }

        };

        function solomonthlyplan(){
            $("input#solo_proplan").val(0);
            $('#solo_proprice').html('$24.90');
            $('.solo_proprice_y').html('$24.90');
            $('#solo_proprice2').html('$24.90/Mon');
            $('.solo_proprice2_y').html('$24.90/Mon');
            $('#solo_protoken').html('20,000 words');
            $('#solo_protoken2').html('20,000 words');
            $('#solo_proreport').html('10 reports');


            if (current == 20000) {
                if(packageToggle == 0 && monthlyCode.includes(planCode)){
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(packageToggle == 1 && yearlyCode.includes(planCode)){
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(packageToggle == 1 && monthlyCode.includes(planCode)){
                    $('#buy-plan').html('Upgrade Plan');
                    // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    // $('#buy-plan').attr('href',Newhref);
                    // return false;
                    $('#buy-plan').data('packageid',6);
                        return false;
                }

                if(packageToggle == 0 && yearlyCode.includes(planCode)){
                    $('#buy-plan').html('Downgrade Plan');
                    // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    // $('#buy-plan').attr('href',Newhref);
                    // return false;
                    $('#buy-plan').data('packageid',2);
                    return false;
                }
            }

            if(current < 20000){
                $('#buy-plan').html('Upgrade Plan');
                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                // $('#buy-plan').attr('href',Newhref);
                // return false;
                $('#buy-plan').data('packageid',2);
                        return false;
            }

            if(current > 20000){
                if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                    $('#buy-plan').html('Upgrade Plan');
                }else{
                    $('#buy-plan').html('Downgrade Plan');
                }
                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&exfo=742&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                // $('#buy-plan').attr('href',Newhref);
                // return false;
                $('#buy-plan').data('packageid',2);
                        return false;
            }
        };

        $("input#solo_proplan").on('change', function() {
            var value = $(this).val();
            $('#level').val(value);
            if (value == 0) {
                $('#solo_proprice').html('$24.90');
                $('.solo_proprice_y').html('$19.90');
                $('#solo_proprice2').html('$24.90/Mon');
                $('.solo_proprice2_y').html('$19.90/Mon');
                $('#solo_protoken').html('20,000 words');
                $('#solo_protoken2').html('20,000 words');
                $('#solo_proreport').html('10 reports');


                if (current == 20000) {

                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Upgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }

                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }
                }

                if(current < 20000){
                    $('#buy-plan').html('Upgrade Plan');

                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current > 20000){
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',2);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',6);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }

            if (value == 1) {
                $('#solo_proprice').html('$34.90');
                $('.solo_proprice_y').html('$29.90');
                $('#solo_proprice2').html('$34.90/Mon');
                $('.solo_proprice2_y').html('$29.90/Mon');
                $('#solo_protoken').html('50,000 words');
                $('#solo_protoken2').html('50,000 words');
                $('#solo_proreport').html('30 reports');


                if (current == 50000) {
                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Upgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }

                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }
                }

                if(current > 50000){
                    // $('#buy-plan').html('Downgrade Plan');
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 50000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',3);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',7);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }

            if (value == 2) {
                $('#solo_proprice').html('$99.90');
                $('.solo_proprice_y').html('$79.90');
                $('#solo_proprice2').html('$99.90/Mon');
                $('.solo_proprice2_y').html('$79.90/Mon');
                $('#solo_protoken').html('200,000 words');
                $('#solo_protoken2').html('200,000 words');
                $('#solo_proreport').html('80 reports');


                if (current == 200000) {
                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Upgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }


                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }
                }

                if(current > 200000){
                    // $('#buy-plan').html('Downgrade Plan');
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 200000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',4);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',8);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }

            if (value == 3) {
                $('#solo_proprice').html('$159.90');
                $('.solo_proprice_y').html('$129.90');
                $('#solo_proprice2').html('$159.90/Mon');
                $('.solo_proprice2_y').html('$129.90/Mon');
                $('#solo_protoken').html('500,000 words');
                $('#solo_protoken2').html('500,000 words');
                $('#solo_proreport').html('200 reports');

                if (current == 500000) {
                    if(packageToggle == 0 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Current Plan');
                        Newhref = `javascript:void(0);`;
                        $('#buy-plan').attr('href',Newhref);
                        return false;
                    }

                    if(packageToggle == 1 && monthlyCode.includes(planCode)){
                        $('#buy-plan').html('Upgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',9);
                        return false;
                    }

                    if(packageToggle == 0 && yearlyCode.includes(planCode)){
                        $('#buy-plan').html('Downgrade Plan');
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        // $('#buy-plan').attr('href',Newhref);
                        // return false;
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }
                }

                if(current > 500000){
                    // $('#buy-plan').html('Downgrade Plan');
                    if (packageToggle == 1 && monthlyCode.includes(planCode)) {
                        $('#buy-plan').html('Upgrade Plan');
                    }else{
                        $('#buy-plan').html('Downgrade Plan');
                    }
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',9);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 500000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',5);
                        return false;
                    }else{
                        // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                        $('#buy-plan').data('packageid',9);
                        return false;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }
        });
    });
    // document.getElementById("solo_proplan").oninput = function() {
    //     if($("input#solo_proplan").val()==0){
    //         var value = (this.value-this.min)/(this.max-this.min)*100
    //         this.style.background = 'linear-gradient(to right,  #F47300 0%,  #F47300 ' + value + '%, #e3bfff ' + value + '%, #e3bfff 100%)';
    //     }
    // };
    document.getElementById("solo_proplan").oninput = function() {
        var value = (this.value-this.min)/(this.max-this.min)*100
        this.style.background = 'linear-gradient(to right,  #F47300 0%,  #F47300 ' + value + '%, #e3bfff ' + value + '%, #e3bfff 100%)';
    };

    function setPaymentBtn(_self) {
        let package_id = $(_self).data('packageid');
        let plan_code = $(_self).data('plancode');

        // if (package_id == '{{ isset($packageData->id) ? $packageData->id : null }}') {
        //     return false;
        // }
        if (package_id == '{{ $packageData->id ?? null }}' && '{{ $user_package->subscription_id ?? null }}' != '') {
            return false;
        }

        $.ajax({
            type: "post",
            url: "{{ route('user.billing.get_paylink') }}",
            data: {'package_id':package_id,'plan_code':plan_code},
            dataType: "json",
            complete: function () {
            },
            error: function (jqXHR, textStatus, errorThrown) {
                ajaxErrorHandling(jqXHR, errorThrown);
            },
            success: function (res) {

                if (res.status == true) {
                    let payLinkBtn = document.getElementById('paddle-pay-btn');
                    payLinkBtn.setAttribute('data-override', res.payLink);
                    document.getElementById('paddle-pay-btn').click();
                    return false;
                } else {
                    alert('Cannot upgrade or downgrade the package at this moment.');
                }
            }
        });
    }

</script>
@endsection
