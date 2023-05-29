@extends('layouts.front')
@section('after-css')
<style>
    /* .chat-content {
        margin-left: 0px;
        padding: 15px 15px 15px 15px;
        height: 450px;
    } */
</style>
@endsection
@section('content')
@include('components.flash-message')

<div class="container">
    <div class="block-element text-center m-b-10">
        <div class="row m-b-5">
            <div class="col-lg-3 col-md-3 col-sm-12 col-12"></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="row col-lg-12">
                    <h3 class="nwprmaintitle" >Pricing</h3>
                    <div class="col-lg-5 col-md-5 col-sm-4 col-4  wow fadeInUp" data-wow-delay="0.3s">
                        <span class="billyear col-grey">Billed monthly</span>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-4">
                        <label class="switch wow fadeInUp" data-wow-delay="0.3s">
                            <input type="checkbox" id="toggleyearly" checked>
                                <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-4 col-4  wow fadeInUp" data-wow-delay="0.3s">
                        <span class="p-l-40 billmonth nwwbuserbillmonth">Billed yearly</span>
                    </div>
                </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-12"></div>
            </div>
        </div>
        <br>
        <h3 class="title-text1 text-dark nwprtext-dark"> Save up to 20% with yearly billing </h3>
    </div>
    <br>
    <br><br>
    <div class="block-element">
            <div class="row align-items-center">
                <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                    <div class="pricing-box wow fadeInUp" data-wow-delay="0.5s">
                    <h2 class="col-white col-lg-12 cntntm" > Basic </h2>
                        <div class="pricing-box-head">
                            <div class="pricing-icon">
                                <img src="{{asset('front')}}/images/dollar-icon.svg">
                            </div>
                            <div class="pricing-title">
                                <h5 class="col-white d-f j-c-e"><b> 7 Days <br> free trial </b></h5>
                                <p > to 2,000 words </p>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <h4 class="col-white" id="prcngwht1d"> Plan Includes </h4>
                            <ul>
                                <li id="prcngwht1e"> <img src="{{asset('front')}}/images/tickorange.svg"> SEO score</li>
                                <li id="prcngwht1e1"> <img src="{{asset('front')}}/images/tickorange.svg"> 40+ templates </li>
                                <li id="prcngwht1e2"> <img src="{{asset('front')}}/images/tickorange.svg"> Live chat support </li>
                                <li id="prcngwht1e3"> <img src="{{asset('front')}}/images/tickorange.svg"> 25+ languages </li>
                                <li id="prcngwht1e3"> <img src="{{asset('front')}}/images/tickorange.svg"> Ezchat </li>
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a href="javascript:void(0);" class="custom-btn2"> <u> View All Details</u> </a>
                            @if (auth('web')->check())
                                <a href="javascript:void(0);" class="btn custom-btn3 disabled"> Current Plan </a>
                            @else
                                <a href="{{route('register')}}" class="custom-btn3"> Start Free </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40 nwprsecmrgn">
                    <div class="pricing-box wow fadeInUp" data-wow-delay="0.7s">
                    <h2 class="col-white col-lg-12 cntntm"> Premium </h2>
                        <div class="pricing-box-head">
                            <div class="pricing-icon">
                                <img src="{{asset('front')}}/images/dollar-icon.svg">
                            </div>
                            <div class="pricing-title">
                                <h4 id="solo_proprice2"> $19.90/Mon </h4>
                                <p class="tas" id="solo_protoken2">20,000 words </p>
                                <p class="tas" id="solo_proreport">10 reports</p>
                            </div>
                        </div>
                        <div class="package-price w-100 text-center mb-4" id="professional">
                            <h1 id="solo_proprice"> $ 19.90 </h1>
                            <div>
                                <div class="demo">
                                    <div class="range-slider">
                                        <input type="range" id="solo_proplan" value="@if($user_package->words == '20000' || $user_package->words < '20000'){{ 0 }}@elseif ($user_package->words == '50000'){{ 1 }}@elseif ($user_package->words == '200000'){{ 2 }}@elseif ($user_package->words == '500000'){{ 3 }}@endif" min="0" steps="1" max="3">
                                    </div>
                                </div>
                            </div>
                            <h4 id="solo_protoken" style="margin-top: 15px;"> 20,000 words</h4>
                        </div>
                        <div class="pricing-detail">
                            <h4 class="col-white tac" id="prcngwht26"> Plan Includes </h4>
                            <ul>
                                <li id="prcngwht27"> <img src="{{asset('front')}}/images/tickpurple.svg"> 40+ templates </li>
                                <li id="prcngwht28"> <img src="{{asset('front')}}/images/tickpurple.svg"> Al Article Writer </li>
                                <li id="prcngwht29"> <img src="{{asset('front')}}/images/tickpurple.svg"> Keyword Generation </li>
                                <li id="prcngwht221"> <img src="{{asset('front')}}/images/tickpurple.svg"> SEO Score improvement </li>
                                <li id="prcngwht222"> <img src="{{asset('front')}}/images/tickpurple.svg"> 25+ languages </li>
                                <li id="prcngwht223"> <img src="{{asset('front')}}/images/tickpurple.svg"> Ezchat </li>
                                <li id="prcngwht224">  <img src="{{asset('front')}}/images/tickpurple.svg"> Live chat support </li>

                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a href="" class="custom-btn2" id="prcngwht225"><u> View All Details </u></a>
                            @if (auth('web')->check())
                                <a href="https://store.payproglobal.com/checkout?products[1][id]=82354&page-template=16802&use-test-mode=true&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user={{ auth('web')->user()->unique_id }}"
                                class="custom-btn3" id="buy-plan" data-current="{{ $user_package->words }}"> Upgrade </a>
                                <input type="hidden" id="is-login" value="1">
                                <input type="hidden" id="logged-email" value="{{ auth('web')->user()->unique_id }}">
                            @else
                                <a href="{{ route('login') }}"
                                class="custom-btn3"> Upgrade </a>
                                <input type="hidden" id="is-login" value="0">
                            @endif
                            {{-- <a href="https://store.payproglobal.com/checkout?products[1][id]=81908&use-test-mode=true&secret-key=htYBPBo@nV"
                                class="custom-btn3"> Current Plan </a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40 nwprsecmrgn">
                    <div class="pricing-box wow fadeInUp" data-wow-delay="0.9s">
                    <h2 class="col-white col-lg-12 cntntm pad-bot-40"> Enterprise </h2>
                        <div class="pricing-box-head">
                            <div class="pricing-icon">
                                <img src="{{asset('front')}}/images/dollar-icon.svg">
                            </div>
                            <div class="pricing-title tas pad-bot-30">
                                <h4 class="col-white" id="prcngwht3b"> Custom Pricing </h4>
                                <p id="prcngwht3c"> 300,000+ words <br> 200+ reports </p>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <h4 class="col-white" id="prcngwht3d"> Plan Includes </h4>
                            <ul>
                                <li id="prcngwht3e"> <img src="{{asset('front')}}/images/tickorange.svg"> latest AI models </li>
                                <li id="prcngwht3f"> <img src="{{asset('front')}}/images/tickorange.svg"> 40+ templates </li>
                                <li id="prcngwht3g"> <img src="{{asset('front')}}/images/tickorange.svg"> Keyword Generation </li>
                                <li id="prcngwht3h"> <img src="{{asset('front')}}/images/tickorange.svg"> SEO Score improvement </li>
                                <li id="prcngwht3i"> <img src="{{asset('front')}}/images/tickorange.svg"> Al Article Writer </li>
                                <li id="prcngwht3i"> <img src="{{asset('front')}}/images/tickorange.svg"> Ezchat </li>
                                <li id="prcngwht3i"> <img src="{{asset('front')}}/images/tickorange.svg"> 25+ languages </li>
                                <li class="pad-bot-30" id="prcngwht3i"> <img src="{{asset('front')}}/images/tickorange.svg"> Live chat support </li>
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a href="" class="custom-btn2" id="prcngwht3j"><u> View All Details </u></a>
                            <a href="" class="custom-btn3"> Contact Sales </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br>
    <br><br>
            <div class="block-element text-center m-b-40 wow fadeInUp" data-wow-delay="0.3s">
                <h2 class="col-white col-lg-12 cntntm pad-bot-40"> Compare plans </h2>
                <!-- <h3 class="title-text1" id="amzngwht6a"> Compare plans </h3> -->
            </div>
            <br>
    <section class="pad-top-40 pad-bot-20 abtbsns gvngblack nwprtabsec">
        <div class="container table-responsive">
            <table class="col-lg-12  wow fadeInUp nwprtb nwprtable" data-wow-delay="0.3s">
                <tr>
                    <th class="wrkspc mmbr">Features</th>
                    <th class="nwprwrkspc">Basic (free trial)</th>
                    <th class="nwprwrkspc">Premium</th>
                    <th class="nwprwrkspc">Enterprise</th>
                </tr>
                <tr>
                    <td class="mmbr" id="amzngwht8b">Word credits per month <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td  id="amzngwht9a">2,000</td>
                    <td id="amzngwht9b">20,000 - 300,000</td>
                    <td id="amzngwht10a">300,000 - unlimited</td>
                </tr>
                <tr>
                    <td class="mmbr hgt" id="hm1">User Logins  <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td class="hgt" id="hm2">1</td>
                    <td class="hgt" id="gotwht">up to 10</td>
                    <td class="hgt" id="getwht">More than 10</td>
                </tr>
                <tr>
                <td class="mmbr" id="atmtwht4">Continuously updated with <br> the latest AI models <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td id="prcchecking1"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="bsnsadvntgimg1"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="bsnsadvntgimg2"></td>
                    <td id="prcchecking2"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="bsnsadvntgimg3"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="bsnsadvntgimg4"></td>
                    <td id="prcchecking3"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="bsnsadvntgimg5"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="bsnsadvntgimg6"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="getwht1">AI models for improved <br> reliability and performance. <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td id="prcchecking4"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick31"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick32"></td>
                    <td id="prcchecking5"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick33"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick34"></td>
                    <td id="prcchecking6"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="bsnsadvntgimg7"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="bsnsadvntgimg8"></td>
                </tr>
                <tr>
                <td class="mmbr" id="atmtwht6">40+ unique templates <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td id="prcchecking7"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="bsnsadvntgimg9"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="bsnsadvntgimg10"></td>
                    <td id="prcchecking8"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prpslimg1"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prpslimg2"></td>
                    <td id="prcchecking9"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prpslimg3"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prpslimg4"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="bxswht1a">Access to SEO score to <br> maximize SEO potential <img src="{{asset('front')}}/images/prplequestion.png"></td>
                <td id="prcchecking10"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prpslimg5"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prpslimg6"></td>
                <td id="prcchecking11"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhtimg1"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhtimg2"></td>
                <td id="prcchecking12"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhtimg3"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhtimg4"></td>
                </tr>
                <tr>
                <td class="mmbr" id="atmtwht8">Al Article Writer <img src="{{asset('front')}}/images/prplequestion.png"></td>
                <td id="prcchecking13"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhtimg5"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhtimg6"></td>
                <td id="prcchecking14"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhtimg7"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhtimg8"></td>
                <td id="prcchecking15"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhttimg1"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhttimg2"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="bxswht1b">25+ languages <img src="{{asset('front')}}/images/prplequestion.png"></td>
                <td id="prcchecking16"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhttimg3"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhttimg4"></td>
                <td id="prcchecking17"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhttimg5"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhttimg6"></td>
                <td id="prcchecking18"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="atmtwhttimg7"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="atmtwhttimg8"></td>
                </tr>
                <tr>
                <td class="mmbr" id="instwht1">Ezchat <img src="{{asset('front')}}/images/prplequestion.png"></td>
                <td id="prcchecking19"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick1"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick2"></td>
                <td id="prcchecking20"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick3"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick4"></td>
                <td id="prcchecking21"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick5"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick6"></td>
                </tr>
            </table>
        </div>
    </section>
    <br>
    <br><br>
    <section class="pad-top-40 pad-bot-20 abtbsns gvngblack nwprtabsec">
        <div class="container table-responsive">
            <table class="col-lg-12  wow fadeInUp nwprtb nwprtable " data-wow-delay="0.3s">
                <tr style="border-color: #fff !important; margin-bottom: 20px !important;">
                    <th class="wrkspc mmbr">Integrations and Extensions</th>
                    <th class="nwprwrkspc" style="visibility: hidden !important;">Basic (free trial)</th>
                    <th class="nwprwrkspc" style="visibility: hidden !important;">Premium Prm</th>
                    <th class="nwprwrkspc" style="visibility: hidden !important;">Enterpris</th>
                </tr>
                <br>
                <tr style="display: none !important;">
                    <th class="wrkspc mmbr">Integrations and Extensions</th>
                    <th class="nwprwrkspc" style="visibility: hidden !important;">Basic (free trial)</th>
                    <th class="nwprwrkspc" style="visibility: hidden !important;">Premium</th>
                    <th class="nwprwrkspc" style="visibility: hidden !important;">Enterprise</th>
                </tr>
                <tr style="background-color: #fff !important;border-color: #fff !important;">
                    <td class="mmbr" id="amzngwht8b">Keyword Generation <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td  id="amzngwht9a"><a href=""style="visibility: hidden !important;"> 300,000 - unlimited unlimiteds</a></td>
                    <td id="amzngwht9b">10-200 keywords</td>
                    <td id="amzngwht10a">200-unlimited keywords</td>
                </tr>
                <tr>
                    <td class="mmbr hgt" id="hm1">SEO Score improvement  <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td class="hgt" id="hm2"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="visibility: hidden !important;"></td>
                    <td class="hgt" id="gotwht"><img src="{{asset('front')}}/images/Checkmarkblk.png" ></td>
                    <td class="hgt" id="getwht"><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                </tr>
                <tr>
                <td class="mmbr" id="atmtwht4">Plagiarism detection <br> tool access <span class="nwprsoon" style="margin-left: 80px !important;">soon</span> <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"  style="visibility: hidden !important;"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="getwht1">Access to newest features <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png" style="visibility: hidden !important;"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="getwht1">Custom AI models <span class="nwprsoon">soon</span>  <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png" style="visibility: hidden !important;"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="getwht1">API Access <span class="nwprsoon">soon</span>  <img src="{{asset('front')}}/images/prplequestion.png"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png" style="visibility: hidden !important;"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png" style="visibility: hidden !important;"></td>
                    <td><img src="{{asset('front')}}/images/Checkmarkblk.png"></td>
                </tr>
            </table>
        </div>
    </section>
    <br>
    <br><br>
    <section class="pad-top-40 abtbsns thrdtbl gvngblack nwprtabsec" id="atmtwht">
        <div class="container table-responsive">
            <table class="col-lg-12  wow fadeInUp nwprtb nwprtable" data-wow-delay="0.3s" id="tblpricbckcolor2">
                <tr>
                    <th class="wrkspc hgt mmbr"  id="bxswht4c">SUPPORT</th>
                    <th style="visibility: hidden !important;">Premium Premium PRRR</th>
                    <th style="visibility: hidden !important;">PremiumP</th>
                    <th style="visibility: hidden !important;">PremiumPP PRRRRr</th>
                </tr>
                <tr>
                    <td class="mmbr hgt" id="cpywht3">Live chat customer support <img src="{{asset('front')}}/images/purpleques.svg"></td>
                    <td>
                        <img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick41">
                    </td>
                    <td>
                        <img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick43">
                    </td>
                    <td>
                        <img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick45">
                    </td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="bxswht">Technical support <img src="{{asset('front')}}/images/purpleques.svg"></td>

                <td id="prcchecking28"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick19"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick20"></td>
                <td id="prcchecking29"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick21"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick22"></td>
                <td id="prcchecking30"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick23"><img src="{{asset('front')}}/images/Checkmarkblk.png" style="display: none;"  id="prcwttick24"></td>
                </tr>
                <tr>
                <td class="mmbr hgt" id="cntctbxswht1b">Learning Resources<img src="{{asset('front')}}/images/purpleques.svg"></td>
                <td id="prcchecking31"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick25"></td>
                <td id="prcchecking32"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick27"></td>
                <td id="prcchecking33"><img src="{{asset('front')}}/images/Checkmarkblk.png" id="prcwttick29"></td>
                </tr>
                <tr>
                <td class="wrkspc hgt mmbr">CHOOSE YOUR PLAN:</td>
                <td style="text-align: center;">
                    <button class="wrkspcbtnimp wrkspcbtnimp2" >Get Start</button>
                </td>
                <td style="text-align: center;">
                    <button class="wrkspcbtnimp">Upgrade</button>
                </td>
                <td style="text-align: center;">
                    <button class="wrkspcbtnimp">Upgrade</button>
                </td>
                </tr>
            </table>
        </div>
    </section>
    <br>
    <br>
    <br>
    <section class="pad-bot-40 abtbsns bg-sec12 seosearch gvngblack" id="bxswht1">
        <div class="container m-t-100">
            <div class="row align-items-center workflow">
                <!-- Image Column Starts Here -->
                <div class="col-md-5 col-lg-5 col-sm-12 col-12 order-lg-2 order-md-2 order-sm-1 order-1">
                    <div class="custom-image1 wow fadeInRight" data-wow-delay="0.3s">
                        <img alt="Robotic Infographics" src="{{asset('front')}}/images/seo.svg">
                    </div>
                </div>
                <div class="col-md-1 col-lg-1 col-sm-12 col-12 order-lg-2 order-md-2 order-sm-1 order-1"></div>
                <!-- Image Column Ends Here -->
                <!-- Detail Textual Column Starts Here -->
                <div class="col-md-1 col-lg-1 col-sm-12 col-12 order-lg-1 order-md-1 order-sm-2 order-2"></div>
                <div class="col-md-5 col-lg-5 col-sm-12 col-12 order-lg-1 order-md-1 order-sm-2 order-2">
                    <div class="detail-text wow fadeInLeft" data-wow-delay="0.6s">
                        <h3 class="col-white col-lg-12 cntntm pad-bot-40" style="text-align: left !important;"> Still have questions?<br> Contact
                            <span class="col-orange"> easyseo.ai </span> for Expert SEO AI Solutions  <br> and <span class="col-orange bnr-fnt"> Support  </span>
                        </h3>
                        <p class="col-white col-lg-12 cntntm pad-bot-40" style="text-align: left !important;">We are here to help you achieve success and are always ready to help in solving any questions and problems related to the use of the service  </p>
                        <button class="wrkspcbtnimp wrkspcbtnimp3"> Contact Support </button>
                    </div>
                </div>
                <!-- Detail Textual Column Ends Here -->
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
</div>

@endsection
@section('page-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    var isLogin = $('#is-login').val();
    var loggedEmail = $('#logged-email').val();
    var current = $('#buy-plan').data('current');

    document.getElementById("solo_proplan").oninput = function() {
        var value = (this.value-this.min)/(this.max-this.min)*100
        this.style.background = 'linear-gradient(to right,  #F47300 0%,  #F47300 ' + value + '%, #e3bfff ' + value + '%, #e3bfff 100%)';
    };

    const toggleyearly = document.getElementById('toggleyearly');
    const solo_proprice = document.getElementById('solo_proprice');
    const solo_proprice2 = document.getElementById('solo_proprice2');
        // solo_proplan.classList.add('solo_proplan_y');
        toggleyearly.addEventListener('click', function() {
            if (solo_proprice.classList.contains('solo_proprice_y')) {
                solomonthlyplan();
                solo_proprice.classList.remove('solo_proprice_y');
                solo_proprice.classList.add('solo_proprice');
                solo_proprice2.classList.add('solo_proprice2');
                solo_proprice2.classList.remove('solo_proprice2_y');
            } else {
                soloyearlyplan();
                solo_proprice.classList.add('solo_proprice_y');
                solo_proprice2.classList.add('solo_proprice2_y');
                solo_proprice.classList.remove('solo_proprice');
                solo_proprice2.classList.remove('solo_proprice2');
            }
        });
    function soloyearlyplan(){
        $("input#solo_proplan").val(0);
            $('#solo_proprice').html('$24.90');
            $('.solo_proprice_y').html('$24.90');
            $('#solo_proprice2').html('$24.90/Mon');
            $('.solo_proprice2_y').html('$24.90/Mon');
            $('#solo_protoken').html('20,000 words');
            $('#solo_protoken2').html('20,000 words');
            $('#solo_proreport').html('10 reports');


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
    };
    function solomonthlyplan(){
        $("input#solo_proplan").val(0);
            $('#solo_proprice').html('$19.90');
            $('.solo_proprice_y').html('$19.90');
            $('#solo_proprice2').html('$19.90/Mon');
            $('.solo_proprice2_y').html('$19.90/Mon');
            $('#solo_protoken').html('20,000 words');
            $('#solo_protoken2').html('20,000 words');
            $('#solo_proreport').html('10 reports');


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
    };
    $("input#solo_proplan").on('change', function() {
        var value = $(this).val();
        $('#level').val(value);
        // var current = $('#buy-plan').data('current');
        if (value == 0) {
            $('#solo_proprice').html('$19.90');
            $('.solo_proprice_y').html('$24.90');
            $('#solo_proprice2').html('$19.90/Mon');
            $('.solo_proprice2_y').html('$24.90/Mon');
            $('#solo_protoken').html('20,000 words');
            $('#solo_protoken2').html('20,000 words');
            $('#solo_proreport').html('10 reports');


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
            $('#solo_proprice').html('$29.90');
            $('.solo_proprice_y').html('$34.90');
            $('#solo_proprice2').html('$29.90/Mon');
            $('.solo_proprice2_y').html('$34.90/Mon');
            $('#solo_protoken').html('50,000 words');
            $('#solo_protoken2').html('50,000 words');
            $('#solo_proreport').html('30 reports');

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
            $('#solo_proprice').html('$79.90');
            $('.solo_proprice_y').html('$99.90');
            $('#solo_proprice2').html('$79.90/Mon');
            $('.solo_proprice2_y').html('$99.90/Mon');
            $('#solo_protoken').html('200,000 words');
            $('#solo_protoken2').html('200,000 words');
            $('#solo_proreport').html('80 reports');

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
            $('#solo_proprice').html('$129.90');
            $('.solo_proprice_y').html('$159.90');
            $('#solo_proprice2').html('$129.90/Mon');
            $('.solo_proprice2_y').html('$159.90/Mon');
            $('#solo_protoken').html('500,000 words');
            $('#solo_protoken2').html('500,000 words');
            $('#solo_proreport').html('200 reports');

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
