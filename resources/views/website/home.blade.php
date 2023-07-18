@extends('layouts.web_main')
@section('css')
<style>
    /* .hmaep:is([aria-expanded="true"]) {
      background-color: green;
    }
    .accordion-block[aria-expanded="false"],
    .accordion-block :not([aria-expanded]) {
      background-color: #000000;
    } */
    .hmaep:not(:is([aria-expanded="true"])), .accordion-block {
        background-color: #000000;    
        /* box-shadow: -2px -2px 24px #653bff; */
        box-shadow: -2px -2px 15px #4c1aff;
    }
    
    .hmaep:is([aria-expanded="true"]), .accordion-block {
      background-color: rgb(38, 38, 38);
      box-shadow: -2px -2px 24px rgba(255, 138, 0, 0.25), 2px 2px 24px rgba(255, 0, 0, 0.25);
    }
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
<!-- Banner Section Starts Here -->
<section class="banner-sec" id="bannersecwht">

    <div class="container">
        <div class="row align-items-center homemobbackrobo">
            <div class="col-md-5 col-lg-5 col-sm-12 col-12 order-lg-2 order-md-2 order-sm-1 order-1">
                <!-- <div class="banner-image"> -->
                <div>
                    <img class="rbtinfo" alt="Robotic Infographics" src="{{asset('front')}}/images/rbt.svg">
                </div>
            </div>

            <div class="col-md-7 col-lg-7 col-sm-12 col-12 order-lg-1 order-md-1 order-sm-2 order-2 rbtinfos">
                <div class="banner-text">
                    <h3 class="col-white" id="mainwht"> Texts that get the <span class="col-orange bnr-fnt">
                            results.</span> Say goodbye to manual SEO <span class="col-orange bnr-fnt">with the help of
                            AI </span>
                        <!-- <span class="col-orange"> with AI. </span> -->
                    </h3>
                    <ul class="custom-list1">
                        <li id="main1wht"> <img alt="tick icon" src="{{asset('front')}}/images/check-icon2.svg"> Free trial </li>
                        <li id="main2wht"> <img alt="tick icon" src="{{asset('front')}}/images/check-icon2.svg"> No credit card required </li>
                    </ul>
                    <!-- <a href="{{route('register')}}" class="custom-btn4 mr-3"> Get
                        Start </a>
                    <a href="" class="custom-btn5"> See How It Works <img
                            src="{{asset('front')}}/images/right-icon.svg"> </a> -->
                    <p id="main3wht"><a href="{{route('web.home')}}" class="nwacolc">easyseo.ai</a> is an AI writing tool that helps you create unique seo optimized content
                        for your E-commerce business, blog, ads, emails, and website without wasting time and effort!
                    </p>
                    <a href="{{route('register')}}" class="custom-btn4 mr-3 strt"> Get
                        Start </a>
                    <a href="" class="custom-btn5" id="main4wht"> See How It Works <img
                            src="{{asset('front')}}/images/right-icon.svg"> </a>
                    <!-- <ul class="custom-list1 ">
                        <li> <img alt="tick icon" src="{{asset('front')}}/images/check-icon2.svg"> Free Register </li>
                        <li> <img alt="tick icon" src="{{asset('front')}}/images/check-icon2.svg"> Great Service </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Info Blocks Section Starts Here -->
    <section class="pad-top-40 cntctbxs " id="cntctbxswht">
        <div class="container nomob">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-50 p-l-25 p-r-25">
                    <div class="contact-box contact-box2" id="cntctbxswht1">
                        <img alt="Icon" src="{{asset('front')}}/images/click-icon.svg">
                        <h4 class="col-white" id="cntctbxswht1a"> Your SEO-Smart AI Writer </h4>
                        <p class="col-white" id="cntctbxswht1b"> Our AI solution crafts engaging, SEO-optimized content, enhancing your digital visibility with every word. </p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-50 p-l-25 p-r-25">
                    <div class="contact-box contact-box2" id="cntctbxswht2">
                        <img alt="Icon" src="{{asset('front')}}/images/bulb-icon.svg">
                        <h4 class="col-white" id="cntctbxswht2a"> Inspiration with AI </h4>
                        <p class="col-white" id="cntctbxswht2b"> Easyseo.ai liberates creativity, turning a keyword into a cascade of inspired content ideas.                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-50 p-l-25 p-r-25">
                    <div class="contact-box contact-box2" id="cntctbxswht3">
                        <img alt="Icon" src="{{asset('front')}}/images/thumb-icon.svg">
                        <h4 class="col-white" id="cntctbxswht3a"> Real-Time SEO Scoring </h4>
                        <p class="col-white" id="cntctbxswht3b"> Craft content confidently, our AI constantly evaluates and optimizes your work, ensuring peak SEO performance.                        </p>
                    </div>
                </div>
            </div>
        </div>
        <section class="trst">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <div class="block-element mob-text-center tab-text-center">
                            <h3 class="title-text1" id="trsted"> Trusted By <br class="dn"> Over <span
                                    class="col-orange bnr-fnt"> 100+ Startups </span>
                                and <br> freelance business </h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                        <div class="custom-slider2 no-arrows dots-2">
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo1.png">
                            </div>
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo2.png">
                            </div>
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo3.png">
                            </div>
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo4.png">
                            </div>
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo5.png">
                            </div>
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo6.png">
                            </div>
                            <div class="brand-logo">
                                <img class="brdimg" alt="Brand Logo" src="{{asset('front')}}/images/brandlogo7.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rbtbrdr container m-t-60" id="atmwtbckcolor2" style="display: none;">
                <div class="row" style="width: 100%; height: auto;">
                    <div class="col-md-1 col-lg-1 col-sm-12 col-12"></div>
                    <div class="col-md-11 col-lg-11 col-sm-12 col-12 nwwbrbtbrdr">
                        <div class="row" style="width: 100%; height: auto;">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-6">
                                <img alt="Icon" class="img-fluid" src="{{asset('front')}}/images/robotopac.svg">
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-6">
                                <img alt="Icon" class="img-fluid playrbt m-t-180"
                                    src="{{asset('front')}}/images/play.svg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="expln container">
                <div class="row">
                    <div class="col-md-8 col-lg-9 col-sm-6 col-12"></div>
                    <div class="col-md-4 col-lg-3 col-sm-6 col-12">
                        <p class="col-white pad-top-10 d-f j-c-e" style="display: none;">*Explanation video - our advantages</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="pad-top-40 bg-sec6" id="amzngwht">
            <div class="container">
                <div class="block-element text-center m-b-50 mobtextleft">
                    <h3 class="title-text1" id="amzngwht2"> What <span class="col-orange bnr-fnt">amazing </span>
                        content will <br class="dn"> you create with <a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai?</a>
                    </h3>
                </div>
                <div class="block-element">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht3">
                                <img alt="Icon" class="img-fluid ftr" id="hmamazonimg3"
                                    src="{{asset('front')}}/images/fontisto_amazon.svg">
                                <img alt="Icon" class="img-fluid ftr" id="hmamazonimg4" style="display: none;"
                                    src="{{asset('front')}}/images/fontisto_amazon2.png">
                                <h4 class="col-white" id="amzngwht3achk"> Amazon product <br /> descriptions </h4>
                                <p id="amzngwht3bchk"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht4">
                                <img alt="Icon" src="{{asset('front')}}/images/f.svg">
                                <h4 class="col-white" id="amzngwht4a"> Social media <br /> advertising </h4>
                                <p id="amzngwht4b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht5">
                                <img alt="Icon" class="img-fluid ftr" src="{{asset('front')}}/images/logos_shopify.svg">
                                <h4 class="col-white" id="amzngwht5a"> Shopify website <br /> texts </h4>
                                <p id="amzngwht5b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht6">
                                <img alt="Icon" src="{{asset('front')}}/images/woo.svg">
                                <h4 class="col-white" id="amzngwht6a"> Creative articles <br class="nomob" /> for
                                    websites </h4>
                                <p id="amzngwht6b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht7">
                                <img alt="Icon" src="{{asset('front')}}/images/etsy.svg" height="32px">
                                <h4 class="col-white" id="amzngwht7a"> Etsy products</h4>
                                <p id="amzngwht7b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht8">
                                <img alt="Icon" class="img-fluid ftr eby" src="{{asset('front')}}/images/ebay.svg">
                                <h4 class="col-white" id="amzngwht8a"> Ebay Products </h4>
                                <p id="amzngwht8b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box" id="amzngwht9">
                                <img alt="Icon" class="img-fluid ftr fvr" src="{{asset('front')}}/images/fiverr.svg">
                                <h4 class="col-white" id="amzngwht9a"> Fiverr gigs</h4>
                                <p id="amzngwht9b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-6 col-6 p-l-20 p-r-20">
                            <div class="feature-box ease" id="amzngwht10">
                                <h4 class="col-white" id="amzngwht10a"> +50 <br> More</h4>
                                <p style="padding-bottom: 40px;" id="amzngwht10b"> Create easily with EASYSEO </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="atmt pad-top-40" id="atmtwht">
                <h1 class="advntg mobtextleft" id="atmtwht1">What is your <span
                        class="col-orange bnr-fnt">advantages</span> to use content <br class="dn">
                    created with <a class="col-orange bnr-fnt" href="{{route('web.home')}}" >easyseo.ai?</a></h1>
                <div class="container anlss">
                    <div class="row" style="width: 100%; height: auto;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 bd-sec2">
                            <div class="amnt row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon9.svg"
                                        id="atmtwhtimg1">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon9wht.png"
                                        id="atmtwhtimg2" style="display: none;">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                                    <p class="anlssaccrt anls" id="atmtwht9">More accurate <br> analysis:</p>
                                    <p class="anlsslrg" id="atmtwht2">Analyze large amounts of data quickly and
                                        accurately, <br> providing more detailed insights into your website's
                                        performance. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="amnt row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon10.svg"
                                        id="atmtwhtimg3">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon10wht.png"
                                        id="atmtwhtimg4" style="display: none;">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                                    <p class="anlssaccrt anls" id="atmtwht3">Time-saving:</p>
                                    <p class="anlsslrg" id="atmtwht4">You can automate many of the repetitive <br
                                            class="dn"> tasks that would otherwise take up a lot of <br class="dn"> your
                                        time, such as keyword research, <br class="dn"> and content optimization. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:60px; width: 100%; height: auto;">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="row p-l-50 amnts">
                                <div class="col-lg-1 col-md-1 col-sm-12 col-12"></div>
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon11.svg"
                                        id="atmtwhtimg5">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon11wht.png"
                                        id="atmtwhtimg6" style="display: none;">
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                    <p class="anlssaccrt anls" id="atmtwht5">Better keyword suggestions: </p>
                                    <p class="anlsslrg" id="atmtwht6">AI-powered SEO tools can use natural <br> language
                                        processing to suggest <br> relevant keywords and topics that are <br> more
                                        likely to drive traffic to your website. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="row p-l-60 amnts">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon12.svg"
                                        id="atmtwhtimg7">
                                    <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon12wht.png"
                                        id="atmtwhtimg8" style="display: none;">
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                                    <p class="anlssaccrt anls" id="atmtwht7">Better ROI</p>
                                    <p class="anlsslrg" id="atmtwht8">Automate the content creation process <br> to save
                                        time and resources. <br> This improved efficiency leads to increased <br>
                                        productivity and, ultimately, a higher ROI for <br> the company. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="pad-top-20" id="instwht">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- Image Column Starts Here -->
                            <div class="col-md-5 col-lg-5 col-sm-12 col-12 order-lg-1 order-md-1 order-sm-1 order-1">
                                <div class="custom-image1">
                                    <img alt="Robotic Infographics" src="{{asset('front')}}/images/Group.svg">
                                </div>
                            </div>
                            <!-- Image Column Ends Here -->
                            <!-- Detail Textual Column Starts Here -->
                            <div class="col-md-7 col-lg-7 col-sm-12 col-12 order-lg-2 order-md-2 order-sm-2 order-2">
                                <div class="detail-text">
                                    <h3 class="col-white mobtextleft" id="instwht1"> Turn your
                                        <span class="col-orange bnr-fnt"> keywords </span> into success <br class="dn">
                                        with the help of
                                        <span class="col-orange bnr-fnt"> <a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai</a> <br display="dn"> Actionable
                                            insights </span>
                                        with AI now!
                                    </h3>
                                    <p class="col-white" id="instwht2"> We have the resources to assist you in taking
                                        <br> your content to the next level! </p>
                                    <a href="{{route('register')}}" class="custom-btn4 nwwbhmgtstrt"> Get Start </a>
                                </div>
                            </div>
                            <!-- Detail Textual Column Ends Here -->
                        </div>
                    </div>
                    <section class="atmt atmtanlyss pad-top-40" id="atmtwhtt">
                        <div class="container anlss anlsss">
                            <div class="row" style="width: 100%; height: auto;">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="row amntss">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                            <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon5.svg"
                                                id="atmtwhttimg1">
                                            <img alt="Icon" class="anlssimg1"
                                                src="{{asset('front')}}/images/icon5wht.png" id="atmtwhttimg2"
                                                style="display: none;">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                                            <p class="anlssaccrt anls" id="atmtwhtt1">Enhanced user <br> experience:</p>
                                            <p class="anlsslrg" id="atmtwhtt1a">Businesses can create customized
                                                information for their target audience. This <br class="dn"> improves the
                                                user experience by delivering <br class="dn"> content that is specific
                                                to their needs <br class="dn"> and interests. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="row amntss">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                            <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon1.svg"
                                                id="atmtwhttimg3">
                                            <img alt="Icon" class="anlssimg1"
                                                src="{{asset('front')}}/images/icon1wht.png" id="atmtwhttimg4"
                                                style="display: none;">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                                            <p class="anlssaccrt anls" id="atmtwhtt2">Competitive <br> advantage:</p>
                                            <p class="anlsslrg" id="atmtwhtt2a">You can stay ahead of your <br
                                                    class="dn"> competitors by using AI-powered SEO <br class="dn">
                                                tools to identify new opportunities to <br class="dn"> improve your
                                                website's search engine ranking. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:60px; width: 100%; height: auto;">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="row p-l-50 dn">
                                        <div class="col-lg-1 col-md-1 col-sm-12 col-12"></div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                            <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/Icon6.svg"
                                                id="atmtwhttimg5">
                                            <img alt="Icon" class="anlssimg1"
                                                src="{{asset('front')}}/images/icon6wht.png" id="atmtwhttimg6"
                                                style="display: none;">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <p class="anlssaccrt anls" id="atmtwhtt3">Improved <br> content <br>
                                                optimization: </p>
                                            <p class="anlsslrg" id="atmtwhtt3a">Save writers time while also <br>
                                                ensuring that the content covers <br> all of the important points about
                                                <br> the topic. <a href="{{route('web.home')}}"  class="nwacolc">easyseo.ai</a> can suggest <br> related topics or subtopics to
                                                include
                                                <br> in the content to improve SEO.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="row p-l-60 dn">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                                            <img alt="Icon" class="anlssimg1" src="{{asset('front')}}/images/icon3.svg"
                                                id="atmtwhttimg7">
                                            <img alt="Icon" class="anlssimg1"
                                                src="{{asset('front')}}/images/icon3wht.png" id="atmtwhttimg8"
                                                style="display: none;">
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-8">
                                            <p class="anlssaccrt anls" id="atmtwhtt4">Chat by <br> <a href="{{route('web.home')}}"  class="nwacolc">easyseo.ai</a> </p>
                                            <p class="anlsslrg" id="atmtwhtt4a">Chat feature allows you to <br> expand
                                                your goals by providing <br> a seamless connection to AI, <br> enabling
                                                you to conduct research, <br> generate content, and accomplish <br> your
                                                objectives in the most organic <br> way possible. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="lgs">
                            <div class="container-fluid">
                                <div class="row dn">
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12"></div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_salesforce.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_notion-icon.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2" id="hmamazonimg1"
                                            src="{{asset('front')}}/images/fontisto_amazon.svg">
                                        <img alt="Icon" class="anlssimg2" id="hmamazonimg2"
                                            src="{{asset('front')}}/images/fontisto_amazon2.png" style="display: none;">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_shopify.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_facebook.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_google-gmail.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2" src="{{asset('front')}}/images/Vector.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/skill-icons_wordpress.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_google-drive.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12">
                                        <img alt="Icon" class="anlssimg2"
                                            src="{{asset('front')}}/images/logos_youtube-icon.svg">
                                    </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12"></div>
                                </div>
                            </div>
                            <section>
                                <div>
                                    <div class="row wbst" style="width: 100%; height: auto;">

                                        <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <h2 style="font-size: 36px;" class="advntg pad-top-20" id="nowht">Now <a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai</a> writes content for you,
                                                <br class="dn">
                                                where you do, <span class="col-orange bnr-fnt">easily with Ai!</span>
                                            </h2>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <p class="bsns" id="nowht1"><a href="{{route('web.home')}}"  class="nwacolc">easyseo.ai</a> is an AI writing tool that helps you
                                                create unique seo <br class="dn"> optimized content for your E-commerce
                                                business, blog, ads, emails, <br class="dn"> and website without wasting
                                                time and effort!</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                        <div class="col-lg-5 col-md-4 col-sm-1 col-1"></div>
                                        <div class="col-lg-2 col-md-4 col-sm-10 col-10">
                                            <a href="{{route('register')}}" class="custom-btn4 cstmbtn4 mr-3 gt-strt"
                                                style="width: 100% !important; text-align: center;"> Get
                                                Start </a>
                                        </div>
                                        <div class="col-lg-5 col-md-4 col-sm-1 col-1"></div>

                                    </div>
                                </div>
                                <section class="pad-top-60 prpsl dn">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                <h3 style="font-size: 36px;" class="advntg pad-bot-20" id="prpsl">For what <span
                                                        class="col-orange bnr-fnt">proposals </span> could be <br
                                                        class="dn">
                                                         <a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai</a> helpful?
                                                </h3>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-50 p-r-25 p-l-25">
                                                <div class="contact-box contact-box2 nwwbcontact-box nwwbcontact-box2"
                                                    id="prpsl1m">
                                                    <img class="cpyimg" alt="Icon"
                                                        src="{{asset('front')}}/images/ic_twotone-content-paste.svg"
                                                        id="prpslimg1">
                                                    <img class="cpyimg" alt="Icon"
                                                        src="{{asset('front')}}/images/ic_twotone-content-pastewht.png"
                                                        id="prpslimg2" style="display: none;">
                                                    <h2 class="col-white cntntm" id="prpsl2"> Content Marketing </h2>
                                                    <p class="cpy col-white" id="prpsl3"> Excellent for copywriters,
                                                        content <br> and social media marketers </p>
                                                    <p class="pad-bot-20 nwwbcpy" id="prpsl4">With just a few
                                                        clicks, you can produce on-brand content for any audience on
                                                        various platforms, including social media, landing pages, blogs,
                                                        website content, emails, and more.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-50 p-r-25 p-l-25">
                                                <div class="contact-box contact-box2 nwwbcontact-box2" id="prpsl2m">
                                                    <img class="cpyimg" alt="Icon"
                                                        src="{{asset('front')}}/images/nimbus_marketing.svg"
                                                        id="prpslimg3">
                                                    <img class="cpyimg" alt="Icon"
                                                        src="{{asset('front')}}/images/nimbus_marketingwht.png"
                                                        id="prpslimg4" style="display: none;">
                                                    <h2 class="col-white cntntm" id="prpsl5"> Performance Marketing
                                                    </h2>
                                                    <p class="cpy col-white" id="prpsl6"> Excellent for PPC, growth, and
                                                        <br> acquisition managers </p>
                                                    <p class="pad-bot-20 nwwbcpy" id="prpsl7">Create ad copy
                                                        for Google, <br> Facebook, and other media to <br> help you Grow
                                                        conversions, <br> CTRs, and lower your CPC. Using our
                                                        high-quality tools, your <br> brand will get fast and effective
                                                        <br> results.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4 col-12 m-b-50 p-r-25 p-l-25">
                                                <div class="contact-box contact-box2 nwwbcontact-box nwwbcontact-box2"
                                                    id="prpsl3m">
                                                    <img class="cpyimg" alt="Icon"
                                                        src="{{asset('front')}}/images/icon-park-outline_seo.svg"
                                                        id="prpslimg5">
                                                    <img class="cpyimg" alt="Icon"
                                                        src="{{asset('front')}}/images/icon-park-outline_seowht.png"
                                                        id="prpslimg6" style="display: none;">
                                                    <h2 class="col-white cntntm" id="prpsl8"> SEO optimization </h2>
                                                    <p class="cpy col-white" id="prpsl9"> Excellent for SEO
                                                        agencies,<br> freelance seo specialists </p>
                                                    <p class="pad-bot-20 nwwbcpy" id="prpsl10">Our tool is the
                                                        secret weapon you've been looking for to take your SEO game to
                                                        the next level. Create keyword-rich SEO articles and meta
                                                        descriptions to help you rank at the top of Google searches.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ||||||||||||||||| Exited with easyseo.ai |||||||||||||||||||||| -->

                                        <section class="bsnsadvntg">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                                <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                                    <h4 style="font-size: 36px;" class="advntg" id="bsnsadvntg"><b>You｀ll be exited about <a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai!</a></b></h4>
                                                    <p class="strhmnw nwacolc">Stories of marketers, writers and entrepreneurs using Easyseo.ai </p>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12 col-12"></div>
                                            </div>
                                            <div style="text-align: center;">
                                                <button class="nwhmextd onlybackwht" id="hmsldbtn0" data-target="#carouselExampleIndicators" data-slide-to="0">E-Commerce</button>
                                                <button class="nwhmextd onlybackwht" id="hmsldbtn1" data-target="#carouselExampleIndicators" data-slide-to="1">Freelancer</button>
                                                <button class="nwhmextd onlybackwht" id="hmsldbtn2" data-target="#carouselExampleIndicators" data-slide-to="2">SEO</button>
                                                <button class="nwhmextd onlybackwht" id="hmsldbtn3" data-target="#carouselExampleIndicators" data-slide-to="3">Blogger</button>
                                                <button class="nwhmextd onlybackwht" id="hmsldbtn4" data-target="#carouselExampleIndicators" data-slide-to="4">Agency</button>
                                            </div>
                                            <div class="nwwbfeature-boxes nwhmextwhlbx" style="display: none;">
                                                <div class="row">
                                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12 nwhmextdpotr">
                                                        <p class="nwhmextdp"><</p>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10">Small business owner</h2>
                                                        <p class="nwhmexthd2 nwacolc pad-bot-20">Who are looking to improve their online visibility and increase traffic <br>to their website.</p>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 m-t-15 m-b-30">
                                                                <div class="pad-bot-20">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">Without Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Some point should <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Some point should <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Some point should <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Some point should <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;be here</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15" style="margin-left: -20px;">
                                                                <div class="pad-bot-40 m-t-60">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">With Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Some point should be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Some point should be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Some point should be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Some point should be here</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Some point should be here</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="m-t-20 m-l-20">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <img src="admin_assets/assets/images/userimage.png">
                                                                        </div>
                                                                        <div class="col-lg-7 pad-top-10" style="margin-left: -10px">
                                                                            <h4 class="nwacolc">Andrew Kozic</h4>
                                                                            <p class="nwhmextceo nwacolc">CEO and Founder at Perfomance</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                    </h6>
                                                                    <br>
                                                                    <p class="nwhmextsmp nwacolc"> EasySEO is a game changer! It has revolutionized the way we create content, and has saved us so much time and effort. <br> Highly recommended!</p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center m-b-25">
                                                            <img src="admin_assets/assets/images/orngdots.png" alt="" style="cursor: pointer;">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-sm-12 col-12 nwhmextdpotr">
                                                        <p class="nwhmextdp">></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                                                </ol>
                                                <div class="carousel-inner nwhmextwhlbx onlybackwht">
                                                    <div class="carousel-item active">
                                                    <img class="d-block w-100" src="admin_assets/assets/images/black.jpg" alt="First slide" style="visibility: hidden;">
                                                    <div class="carousel-caption d-none d-md-block" style="width: 83%;
    margin-left: -70px;"> 
                                                    <div class="row">
                                                    <!-- <div class="col-lg-1 col-md-1 col-sm-12 col-12 nwhmextdpotr">
                                                        <p class="nwhmextdp"><</p>
                                                    </div> -->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h2 class="nwhmexthd1 nwacolc pad-top-10">E-Commerce and Marketplace sellers</h2>
                                                        <p class="nwhmexthd2 nwacolc pad-bot-10">Who are looking to boost their online visibility and drive more sales.</p>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 m-t-15 m-b-30 onlybackwht">
                                                                <div class="pad-bot-20">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">Without Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Struggling with ranking well <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;in search results and  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;keywords.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Limited SEO knowledge <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;hampers optimization efforts.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Generating targeted traffic <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;and increasing sales is  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;a struggle.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> It’s hard to get impressions <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;for product listings.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 onlybackwht" style="margin-left: -20px;">
                                                                <div class="pad-bot-40 m-t-60">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">With Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> easyseo unlocks higher  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;rankings and generates more  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;sales. </p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Advanced keyword  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;research optimizes visibility. </p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Find the correct keywords  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;to rank products. </p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> No need to spend time  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;writing good titles  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;and descriptions. </p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Faster product uploads with  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;easyseo features. </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="m-t-20 m-l-20">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <img src="admin_assets/assets/images/sld1.png">
                                                                        </div>
                                                                        <div class="col-lg-7 pad-top-10" style="margin-left: -10px">
                                                                            <h4 class="nwacolc">William Johnson</h4>
                                                                            <p class="nwhmextceo nwacolc">CEO and Founder at Perfomance</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                    </h6>
                                                                    <br>
                                                                    <p class="nwhmextsmp nwacolc"> Easyseo is a must-have for eBay and Etsy sellers! The keyword suggestion feature boosts visibility and sales. It's perfect for multi-platform success! </p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center m-b-25" style="display: none;">
                                                            <img src="admin_assets/assets/images/orngdots.png" alt="" style="cursor: pointer;">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-1 col-md-1 col-sm-12 col-12 nwhmextdpotr">
                                                        <p class="nwhmextdp">></p>
                                                    </div> -->
                                                </div>
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img class="d-block w-100" src="admin_assets/assets/images/black.jpg" alt="Second slide" style="visibility: hidden;">
                                                    <div class="carousel-caption d-none d-md-block" style="width: 83%;
    margin-left: -70px;"> 
                                                    <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h2 class="nwhmexthd1 nwacolc pad-top-10">Freelancers or workers offering online services</h2>
                                                        <p class="nwhmexthd2 nwacolc pad-bot-20">Who are looking to establish a strong online presence and attract <br> clients in their niche.</p>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 m-t-15 m-b-30 onlybackwht">
                                                                <div class="pad-bot-20">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">Without Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Struggled to get clients <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;as a freelancer due to  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;poor rankings.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Low engagement and  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;conversions on social media  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;content.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Difficult to increase sales <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;and increasing sales is  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;for posting services online.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> It’s hard to stand out <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;if you’re one of many.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 onlybackwht" style="margin-left: -20px;">
                                                                <div class="pad-bot-40 m-t-60">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">With Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Improved rankings and  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;attracted more clients.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Generated blog ideas and <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;drove website traffic.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Templates and editor enhance <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;your online presence.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Increase the services  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;provided with the help <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;of easyseo features.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Write catchy and SEO <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;optimized portfolios & gigs.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="m-t-20 m-l-20">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <img src="admin_assets/assets/images/sld2.png">
                                                                        </div>
                                                                        <div class="col-lg-7 pad-top-10" style="margin-left: -10px">
                                                                            <h4 class="nwacolc">Oleksandr Petrovych</h4>
                                                                            <p class="nwhmextceo nwacolc">CEO and Founder at Perfomance</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                    </h6>
                                                                    <br>
                                                                    <p class="nwhmextsmp nwacolc"> Easyseo is my secret weapon on Fiverr! The keyword suggestions and templates saved me time and boosted my gig performance. It's been crucial to my success on Fiverr!</p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center m-b-25" style="display: none;">
                                                            <img src="admin_assets/assets/images/orngdots.png" alt="" style="cursor: pointer;">
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img class="d-block w-100" src="admin_assets/assets/images/black.jpg" alt="Third slide" style="visibility: hidden;">
                                                    <div class="carousel-caption d-none d-md-block" style="width: 83%;
    margin-left: -70px;"> 
                                                    <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h2 class="nwhmexthd1 nwacolc pad-top-10">Website owners or SEO service providers</h2>
                                                        <p class="nwhmexthd2 nwacolc pad-bot-20">Who are looking to drive targeted traffic to their website and <br>increase their online visibility.</p>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 m-t-15 m-b-30 onlybackwht">
                                                                <div class="pad-bot-20">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">Without Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> SEO takes a lot of time <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;and research.</p> 
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Need to pay for several  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;platforms to find the  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;right keywords.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Limited SEO knowledge <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;makes it hard to see <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;results.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Difficult to be sure if <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;the work is good enough.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 onlybackwht" style="margin-left: -20px;">
                                                                <div class="pad-bot-40 m-t-60">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">With Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> SEO time decreases by  90%,<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; giving time for your business.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> One platform covers all the <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;needs of online business.</p> 
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> No need to spend money <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;on an SEO agency.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Our SEO score gives the  <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;confidence that the content <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;is good to go.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> You can expect faster organic <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;growth than regular work.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="m-t-20 m-l-20">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <img src="admin_assets/assets/images/sld3.png">
                                                                        </div>
                                                                        <div class="col-lg-7 pad-top-10" style="margin-left: -10px">
                                                                            <h4 class="nwacolc">Alexander Schmidt</h4>
                                                                            <p class="nwhmextceo nwacolc">CEO and Founder at Perfomance</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                    </h6>
                                                                    <br>
                                                                    <p class="nwhmextsmp nwacolc"> Easyseo revolutionized my self-taught SEO journey! The editor, SEO score, and keyword suggestion features are invaluable. My website's rankings and organic traffic have soared!</p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center m-b-25" style="display: none;">
                                                            <img src="admin_assets/assets/images/orngdots.png" alt="" style="cursor: pointer;">
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img class="d-block w-100" src="admin_assets/assets/images/black.jpg" alt="Third slide" style="visibility: hidden;">
                                                    <div class="carousel-caption d-none d-md-block" style="width: 83%;
    margin-left: -70px;"> 
                                                    <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h2 class="nwhmexthd1 nwacolc pad-top-10">Bloggers or content writers</h2>
                                                        <p class="nwhmexthd2 nwacolc pad-bot-20">Who are looking to boost their online visibility and attract more readers.</p>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 m-t-15 m-b-30 onlybackwht">
                                                                <div class="pad-bot-20">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">Without Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Content struggles to get <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;noticed by search engines in<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;limited traffic and visibility. </p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Couldn’t gauge the SEO <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;effectiveness of the content.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Missed out on using relevant<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;keywords that could have <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;boosted the SEO performance.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Takes a lot of time to <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;write a full blog post.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 onlybackwht" style="margin-left: -20px;">
                                                                <div class="pad-bot-40 m-t-60">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">With Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Blogs get noticed quickly by<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;by search engines, driving<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;more traffic and visibility.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> easyseo suggestions give <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;content that attracts readers</p> 
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> The keyword research <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;provides relevant keywords.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> The SEO score system <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;measures the effectiveness.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Save a lot of time by <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;writing good and attractive <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;content manually.</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="m-t-20 m-l-20">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <img src="admin_assets/assets/images/sld4.png">
                                                                        </div>
                                                                        <div class="col-lg-7 pad-top-10" style="margin-left: -10px">
                                                                            <h4 class="nwacolc">Samantha Taylor</h4>
                                                                            <p class="nwhmextceo nwacolc">CEO and Founder at Perfomance</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                    </h6>
                                                                    <br>
                                                                    <p class="nwhmextsmp nwacolc"> Your platform worked wonders for my blog! Templates and SEO score propelled visibility. I highly recommend it to bloggers craving more views!</p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center m-b-25" style="display: none;">
                                                            <img src="admin_assets/assets/images/orngdots.png" alt="" style="cursor: pointer;">
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                    <img class="d-block w-100" src="admin_assets/assets/images/black.jpg" alt="Third slide" style="visibility: hidden;">
                                                    <div class="carousel-caption d-none d-md-block" style="width: 83%;
    margin-left: -70px;"> 
                                                    <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <h2 class="nwhmexthd1 nwacolc pad-top-10">SEO agency or Marketing agency</h2>
                                                        <p class="nwhmexthd2 nwacolc pad-bot-20">Who are looking to deliver exceptional SEO services and drive <br>
                                                        significant results for their clients.</p>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 m-t-15 m-b-30 onlybackwht">
                                                                <div class="pad-bot-20">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">Without Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Missing out on relevant <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;keywords SEO performance <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;for client websites. </p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Manual keyword research <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;consumes time without<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;easyseo’s efficient tools.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Paying for multiple tools<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;for all team members.</p> 
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconno.svg" alt=""> Limited in time and can’t <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;acquire more clients.</p> 
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 nwhmextdv m-b-15 onlybackwht" style="margin-left: -20px;">
                                                                <div class="pad-bot-40 m-t-60">
                                                                    <h2 class="nwhmexthd1 nwacolc pad-bot-10 pad-top-10 m-l-12">With Easyseo</h2>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Relevant keywords and <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;improve SEO performance.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Efficient tools streamline <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;keyword research, saving time.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> All team members work on <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;one subscription.</p>
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Work faster, increase earnings <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; by getting more customers.</p> 
                                                                    <p class="nwhmextsmp nwacolc"><img src="admin_assets/assets/images/iconyes.svg" alt=""> Increase our website traffic <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;and keep on Google rank.<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="m-t-20 m-l-20">
                                                                    <div class="row">
                                                                        <div class="col-lg-5">
                                                                            <img src="admin_assets/assets/images/sld5.png">
                                                                        </div>
                                                                        <div class="col-lg-7 pad-top-10" style="margin-left: -10px">
                                                                            <h4 class="nwacolc">David Brown</h4>
                                                                            <p class="nwhmextceo nwacolc">CEO and Founder at Perfomance</p>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <h6>
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                        <img alt="Star Icon"
                                                                            src="{{asset('front')}}/images/star-icon.svg">
                                                                    </h6>
                                                                    <br>
                                                                    <p class="nwhmextsmp nwacolc"> This website is a game-changer for our agency! Its fast and effective solutions attract more clients and deliver exceptional results, improving rankings and organic traffic.</p>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-center m-b-25" style="display: none;">
                                                            <img src="admin_assets/assets/images/orngdots.png" alt="" style="cursor: pointer;">
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon nwhmextdp" aria-hidden="true"><</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon nwhmextdp"  style="margin-left: -50px;" aria-hidden="true">></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="row" style="display: none;">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="row m-t-100">
                                                        <div class="col-lg-12 p-l-20 p-r-20">
                                                            <div class="row bsnsonr nwwbcontact-box2" >
                                                                <div class="col-lg-5">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man1.svg"
                                                                        id="bsnsadvntgimg1">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man1.png"
                                                                        id="bsnsadvntgimg2" style="display: none;">
                                                                </div>
                                                                <div class="col-lg-7 ensr nwwbensr">
                                                                    <h2 class="col-white nwwbmrktnmngr"
                                                                        id="bsnsadvntg1a"><b> Small business <br> owners
                                                                        </b></h2>
                                                                    <p class="atrct" id="bsnsadvntg1b">Small business
                                                                        owners, who are looking to improve their online
                                                                        visibility and increase traffic to their
                                                                        website. Entrepreneurs who are just starting out
                                                                        and want to ensure that their website is
                                                                        optimized for search engines to attract
                                                                        customers.</p>
                                                                    <a class="hdrbtn" href="{{route('register')}}"
                                                                        id="bsnsadvntg1c"> Start free > </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-lg-12 p-l-20 p-r-20">
                                                            <div class="row bsnsonr nwwbcontact-box2">
                                                                <div class="col-lg-5">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man3.svg"
                                                                        id="bsnsadvntgimg3">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man3.png"
                                                                        id="bsnsadvntgimg4" style="display: none;">
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <h2 class="col-white nwwbmrktnmngr"
                                                                        id="bsnsadvntg1d"><b> Bloggers & <br>
                                                                            Influencers </b></h2>
                                                                    <p class="atrct" id="bsnsadvntg1e">Bloggers who need
                                                                        to optimize their content for search engines but
                                                                        lack the time or expertise to do so manually.
                                                                        Content creators who want to ensure that their
                                                                        video
                                                                        or audio content is discoverable by search
                                                                        engines.</p>
                                                                    <a class="hdrbtn" href="{{route('register')}}"
                                                                        id="bsnsadvntg1f"> Start free > </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                    <div class="row">
                                                        <div class="col-lg-12 p-l-20 p-r-20">
                                                            <div class="row bsnsonr nwwbcontact-box2" id="bsnsadvntg3">
                                                                <div class="col-lg-5">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man2.svg"
                                                                        id="bsnsadvntgimg5">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man2.png"
                                                                        id="bsnsadvntgimg6" style="display: none;">
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <h2 class="col-white nwwbmrktnmngr"
                                                                        id="bsnsadvntg1g"><b> Marketing managers </b>
                                                                    </h2>
                                                                    <p class="atrct" id="bsnsadvntg1h">Marketing
                                                                        managers who want to streamline their SEO
                                                                        efforts and generate high-quality content at
                                                                        scale. Social media managers who want to ensure
                                                                        that the content they share on social media is
                                                                        optimized for search engines.</p>
                                                                    <a class="hdrbtn" href="{{route('register')}}"
                                                                        id="bsnsadvntg1i"> Start free > </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-lg-12 p-l-20 p-r-20">
                                                            <div class="row bsnsonr nwwbcontact-box2" id="bsnsadvntg4">
                                                                <div class="col-lg-5">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man4.svg"
                                                                        id="bsnsadvntgimg7">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man4.png"
                                                                        id="bsnsadvntgimg8" style="display: none;">
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <h2 class="col-white nwwbmrktnmngr"
                                                                        id="bsnsadvntg1j"><b> SEO specialists </b></h2>
                                                                    <p class="atrct" id="bsnsadvntg1k">SEO specialists
                                                                        are responsible for optimizing websites for
                                                                        search engines. They could use an AI-powered SEO
                                                                        tool to automate certain tasks and improve the
                                                                        efficiency of their work.</p>
                                                                    <a class="hdrbtn" href="{{route('register')}}"
                                                                        id="bsnsadvntg1l"> Start free > </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-lg-12 p-l-20 p-r-20">
                                                            <div class="row bsnsonr nwwbcontact-box2" id="bsnsadvntg5">
                                                                <div class="col-lg-5">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man5.svg"
                                                                        id="bsnsadvntgimg9">
                                                                    <img class="mnimg" alt="Icon"
                                                                        src="{{asset('front')}}/images/man5.png"
                                                                        id="bsnsadvntgimg10" style="display: none;">
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <h2 class="col-white nwwbmrktnmngr"
                                                                        id="bsnsadvntg1m"><b> Digital <br> marketing
                                                                            <br> agencies</b></h2>
                                                                    <p class="atrct" id="bsnsadvntg1n">Digital marketing
                                                                        agencies that need to produce SEO-friendly
                                                                        content for their clients on a regular basis.
                                                                        E-commerce website owners who want to optimize
                                                                        their product pages and improve their conversion
                                                                        rates.</p>
                                                                    <a class="hdrbtn" href="{{route('register')}}"
                                                                        id="bsnsadvntg1o"> Start free > </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </section>
                                <section class="pad-top-40 pad-bot-20 bxs">
                                    <div class="container">
                                        <div class="block-element text-center m-b-10">
                                            <h3 class="title-text1" id="bxswht"> What Our <span
                                                    class="col-orange bnr-fnt"> Happy User </span> Says: </h3>
                                        </div>
                                        <div class="block-element">
                                            <div class="custom-slider2 no-arrows dots-2"><!-- custom-slider1 no-arrows dots-1 -->
                                                <div class="testimonial-box">
                                                    <div class="hmnwtbbck">
                                                        <h6>
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                        </h6>
                                                        <p class="nwacolc"> <a href="{{route('web.home')}}" class="nwacolc">easyseo.ai</a> is a game changer!
                                                            It has revolutionized the way we create content, and has
                                                            saved us so much time and effort. Highly recommended! </p>
                                                        <h4 class="nwacolc">
                                                            <img src="{{asset('front')}}/images/avatar-new-1.png">
                                                            Andrew Kozic
                                                            <span class="nwacolc"> CEO and Founder at Perfomance </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="testimonial-box">
                                                    <div class="hmnwtbbck">
                                                        <h6>
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                        </h6>
                                                        <p class="nwacolc"> As a busy marketer, <a href="{{route('web.home')}}" class="nwacolc">easyseo.ai</a>
                                                            has been a godsend. It's incredibly user-friendly and
                                                            produces high-quality content with ease. I can't imagine
                                                            going back to the old ways.</p>
                                                        <h4 class="nwacolc">
                                                            <img src="{{asset('front')}}/images/avatar-new-2.png">
                                                            Brian Hartman
                                                            <span class="nwacolc"> CEO and Founder at Perfomance </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="testimonial-box">
                                                    <div id="bxswht3">
                                                        <h6>
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                        </h6>
                                                        <p class="col-white" id="bxswht3a"> <a href="{{route('web.home')}}" class="nwacolc">easyseo.ai</a> is the future of
                                                            content creation. It's efficient, effective, and allows us
                                                            to focus on the bigger picture of our marketing strategy.
                                                            Our team is loving it! </p>
                                                        <h4 id="bxswht3b">
                                                            <img src="{{asset('front')}}/images/avatar-new-3.png">
                                                            Arthur Isaksson
                                                            <span id="bxswht3c"> CEO and Founder at Perfomance </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="testimonial-box">
                                                    <div id="bxswht4">
                                                        <h6>
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                            <img alt="Star Icon"
                                                                src="{{asset('front')}}/images/star-icon.svg">
                                                        </h6>
                                                        <p class="col-white" id="bxswht4a"> <a href="{{route('web.home')}}" class="nwacolc">easyseo.ai</a> is a game changer!
                                                            It has revolutionized the way we create content, and has
                                                            saved us so much time and effort. Highly recommended! </p>
                                                        <h4 id="bxswht4b">
                                                            <img src="{{asset('front')}}/images/avatar-new-4.png">
                                                            Andrew Kozic
                                                            <span id="bxswht4c"> CEO and Founder at Perfomance </span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <section class="pad-top-100">
                                        <div class="container">
                                            <div class="row align-items-center">
                                                <!-- Image Column Starts Here -->
                                                <div
                                                    class="col-md-5 col-lg-5 col-sm-12 col-12 order-lg-2 order-md-2 order-sm-1 order-1">
                                                    <div class="custom-image1 nwwbhmcustom-image1">
                                                        <img alt="Robotic Infographics"
                                                            src="{{asset('front')}}/images/seo.svg">
                                                    </div>
                                                </div>
                                                <!-- Image Column Ends Here -->
                                                <!-- Detail Textual Column Starts Here -->
                                                <div
                                                    class="col-md-7 col-lg-7 col-sm-12 col-12 order-lg-1 order-md-1 order-sm-2 order-2">
                                                    <div class="detail-text">
                                                        <h3 class="col-white" id="getwht"> Get
                                                            <span class="col-orange bnr-fnt"> actionable clicks </span>
                                                            with AI and improve your SEO for search <br class="dn"><a href="{{route('web.home')}}" class="col-orange bnr-fnt">easyseo.ai!</a>
                                                        </h3>
                                                        <p class="col-white" id="getwht1">Easily bring AI in your
                                                            workflow to improve & create SEO content, wherever you are.
                                                        </p>
                                                        <a href="{{route('register')}}"
                                                            class="custom-btn4 nwwbhmgtstrt"> Get Start </a>
                                                    </div>
                                                </div>
                                                <!-- Detail Textual Column Ends Here -->
                                            </div>
                                        </div>

                                        <section class="pad-top-40 acrdion nwwbpdngtp">
                                            <div class="container">
                                                <div class="block-element text-center m-b-50">
                                                    <h3 class="title-text1" id="gotwht"> Got questions <span
                                                            class="col-orange bnr-fnt"> about easy.ai</span>? <br
                                                            class="dn"> We've got
                                                        answers. </h3>
                                                </div>
                                                <div class="block-element">
                                                    <div id="accordion" class="myaccordion">
                                                        <div class="card accordion-block">
                                                            <button
                                                                class="d-flex align-items-center justify-content-between btn btn-link collapsed hmaep"
                                                                data-toggle="collapse" data-target="#collapseTwo"
                                                                aria-expanded="false" aria-controls="collapseTwo"
                                                                id="gotwht2">
                                                                <span id="gotwht2a">What exactly is easyseo.ai?</span>
                                                                <span class="faq-icons">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/plus-icon.png"
                                                                        id="gotwht2e">
                                                                    <img alt="Minus" class="minus-icon"
                                                                        src="{{asset('front')}}/images/minus-icon.png"
                                                                        id="gotwht2f">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/blkplus.png"
                                                                        id="gotwht2c" style="display: none;">
                                                                </span>
                                                            </button>
                                                            <div id="collapseTwo" class="collapse"
                                                                aria-labelledby="headingTwo" data-parent="#accordion">
                                                                <div class="card-body" id="gotwht2d">
                                                                    <p class="tas nwhstas" id="gotwht2b"> easyseo.ai is the world's best AI writing platform for creating SEO-optimized content that drives organic Google traffic to your website. You can increase traffic, sales, and revenue tenfold by strategically placing keywords, internal links, and external links in your generated content. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card accordion-block">
                                                            <button
                                                                class="d-flex align-items-center justify-content-between btn btn-link hmaep"
                                                                data-toggle="collapse" data-target="#collapseOne"
                                                                aria-expanded="false" aria-controls="collapseOne"
                                                                id="gotwht1">
                                                                <span id="gotwht1a">The AI output: is it unique?</span>
                                                                <span class="faq-icons">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/plus-icon.png"
                                                                        id="gotwht1e">
                                                                    <img alt="Minus" class="minus-icon"
                                                                        src="{{asset('front')}}/images/minus-icon.png"
                                                                        id="gotwht1f">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/blkplus.png"
                                                                        id="gotwht1c" style="display: none;">
                                                                </span>
                                                            </button>
                                                            <div id="collapseOne" class="collapse"
                                                                aria-labelledby="headingOne" data-parent="#accordion">
                                                                <div class="card-body" id="gotwht1d">
                                                                    <p class="tas nwhstas" id="gotwht1b"> Yes, the output generated by our AI is entirely original and passes all standard plagiarism checks. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card accordion-block">
                                                            <button
                                                                class="d-flex align-items-center justify-content-between btn btn-link collapsed hmaep"
                                                                data-toggle="collapse" data-target="#collapseThree"
                                                                aria-expanded="false" aria-controls="collapseThree"
                                                                id="gotwht3" id="gotwht3a">
                                                                <span id="gotwht3a">When will I be able to access easyseo.ai?</span>
                                                                <span class="faq-icons">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/plus-icon.png"
                                                                        id="gotwht3e">
                                                                    <img alt="Minus" class="minus-icon"
                                                                        src="{{asset('front')}}/images/minus-icon.png"
                                                                        id="gotwht3f">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/blkplus.png"
                                                                        id="gotwht3c" style="display: none;">
                                                                </span>
                                                            </button>
                                                            <div id="collapseThree" class="collapse"
                                                                aria-labelledby="headingThree" data-parent="#accordion">
                                                                <div class="card-body" id="gotwht3d">
                                                                    <p class="tas nwhstas" id="gotwht3b"> After completing your order, you will have immediate access. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card accordion-block">
                                                            <button
                                                                class="d-flex align-items-center justify-content-between btn btn-link collapsed hmaep"
                                                                data-toggle="collapse" data-target="#collapse4"
                                                                aria-expanded="false" aria-controls="collapseTwo"
                                                                id="gotwht4">
                                                                <span id="gotwht4a">How does easyseo.ai help e-commerce
                                                                    teams save time <br> and money?</span>
                                                                <span class="faq-icons">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/plus-icon.png"
                                                                        id="gotwht4e">
                                                                    <img alt="Minus" class="minus-icon"
                                                                        src="{{asset('front')}}/images/minus-icon.png"
                                                                        id="gotwht4f">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/blkplus.png"
                                                                        id="gotwht4c" style="display: none;">
                                                                </span>
                                                            </button>
                                                            <div id="collapse4" class="collapse"
                                                                aria-labelledby="headingTwo" data-parent="#accordion">
                                                                <div class="card-body" id="gotwht4d">
                                                                    <p class="tas nwhstas" id="gotwht4b"> Because of our artificial intelligence solution that does the research, brainstorming, and writing for you, your team will spend less time creating and distributing content across your channels. Some easyseo.ai users claim to have saved a significant amount of time while increasing clicks and conversions by more than 1000%. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card accordion-block">
                                                            <button
                                                                class="d-flex align-items-center justify-content-between btn btn-link collapsed hmaep"
                                                                data-toggle="collapse" data-target="#collapse5"
                                                                aria-expanded="false" aria-controls="collapseThree"
                                                                id="gotwht5">
                                                                <span id="gotwht5a">Who can benefit from easyseo.ai?</span>
                                                                <span class="faq-icons">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/plus-icon.png"
                                                                        id="gotwht5e">
                                                                    <img alt="Minus" class="minus-icon"
                                                                        src="{{asset('front')}}/images/minus-icon.png"
                                                                        id="gotwht5f">
                                                                    <img alt="Plus" class="plus-icon"
                                                                        src="{{asset('front')}}/images/blkplus.png"
                                                                        id="gotwht5c" style="display: none;">
                                                                </span>
                                                            </button>
                                                            <div id="collapse5" class="collapse"
                                                                aria-labelledby="headingThree" data-parent="#accordion">
                                                                <div class="card-body" id="gotwht5d">
                                                                    <p class="tas nwhstas" id="gotwht5b"> easyseo.ai is primarily for content creators, whether they are marketers, entrepreneurs, agencies, or students. <a href="{{route('web.home')}}" style="color: #fff;">easyseo.ai</a> does not require you to be a professional writer. <br>easyseo.ai AI-generated, SEO-optimized content is also used by thousands of professional writers because it helps them brainstorm new ideas, saves them time, increases productivity, and thus generates more revenue. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>


                                        <!-- Pricing Packages Section Starts Here -->
                                        <section class="prc pad-top-40 nwwbpdngtp">
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
                                                                    <span class="billmonth" id="writewhtbtn2">Billed
                                                                        monthly</span>
                                                                </div>
                                                                <div class="col-lg-2 col-md-2 col-sm-4 col-4">
                                                                    <label class="switch2">
                                                                        <input type="checkbox" id="toggleyearly" checked>
                                                                        <span class="slider2 round2"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-lg-5 col-md-5 col-sm-4 col-4">
                                                                    <span class="billyear col-orange"
                                                                        id="writewhtbtn3">Billed yearly</span>
                                                                </div>
                                                                <div class="block-element text-center m-b-10">
                                                                    <p class="tac col-white font-size-30"
                                                                        id="menuitemwht"><b>Save up to 20% with yearly
                                                                            billing </b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="block-element">
                                                            <div class="row align-items-center"
                                                                style="width: 100%; height: auto;">
                                                                <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                                                                    <div class="pricing-box" id="prcngwht1">
                                                                        <h2 class="col-white col-lg-12 cntntm"
                                                                            id="prcngwht1a"> Basic </h2>
                                                                        <div class="pricing-box-head">
                                                                            <div class="pricing-icon">
                                                                                <img
                                                                                    src="{{asset('front')}}/images/dollar-icon.svg">
                                                                            </div>
                                                                            <div class="pricing-title">
                                                                                <h5 class="col-white d-f j-c-e"
                                                                                    id="prcngwht1b"><b> 7 Days <br> free
                                                                                        trial </b></h5>
                                                                                <p id="prcngwht1c">
                                                                                    to 5,000 words </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pricing-detail">
                                                                            <h4 class="col-white" id="prcngwht1d"> Plan
                                                                                Includes </h4>
                                                                            <ul>
                                                                                <li id="prcngwht1e"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    SEO score</li>
                                                                                <li id="prcngwht1e1"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    60+ templates </li>
                                                                                <li id="prcngwht1e2"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    Live chat support </li>
                                                                                <li id="prcngwht1e3"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    20+ languages </li>
                                                                                <li class="pad-bot-40" id="cpywht2a">
                                                                                    <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    Ezchat </li>
                                                                                    <br><br><br>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="pricing-btn">
                                                                            <a href="{{route('web.pricing')}}"
                                                                                class="custom-btn2" id="prcngwht1f"> <u>
                                                                                    View All Details</u> </a>
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
                                                                        <h2 class="col-white col-lg-12 cntntm pad-bot-20"
                                                                            id="prcngwht21achk"> Premium </h2>
                                                                        <div class="pricing-box-head">
                                                                            <div class="pricing-icon">
                                                                                <img
                                                                                    src="{{asset('front')}}/images/dollar-icon.svg">
                                                                            </div>
                                                                            <div class="pricing-title">
                                                                                <h4 class="col-white"
                                                                                    id="solo_proprice2"> $19.90/Mon
                                                                                </h4>
                                                                                <p class="tas" id="solo_protoken2">
                                                                                    20,000 words</p>
                                                                                <p class="tas" id="solo_proreport">10
                                                                                    reports</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="package-price w-100 text-center mb-4"
                                                                            id="professional">
                                                                            <h4 id="solo_proprice"> $ 19.90 </h4>
                                                                            <div>
                                                                                <div class="demo">
                                                                                    <div class="range-slider">
                                                                                        <input type="range"
                                                                                            id="solo_proplan"
                                                                                            value="@if($words == '20000' || $words < '20000'){{ 0 }}@elseif ($words == '50000'){{ 1 }}@elseif ($words == '200000'){{ 2 }}@elseif ($words == '500000'){{ 3 }}@endif"
                                                                                            min="0" steps="1" max="3">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <h5 class="font-size-10" id="solo_protoken">
                                                                                20,000 words</h5>
                                                                        </div>
                                                                        <div class="pricing-detail">
                                                                            <h4 class="col-white tac" id="prcngwht26">
                                                                                Plan Includes </h4>
                                                                            <ul>
                                                                                <li id="prcngwht27"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    60+ templates </li>
                                                                                <li id="prcngwht28"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    Al Article Writer </li>
                                                                                <li id="prcngwht29"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    Keyword Generati </li>
                                                                                <li id="prcngwht221"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    SEO Score improvement </li>
                                                                                <li id="prcngwht222"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    20+ languages </li>
                                                                                <li id="prcngwht223"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    Ezchat </li>
                                                                                <li id="prcngwht224"> <img
                                                                                        src="{{asset('front')}}/images/tickpurple.svg">
                                                                                    Live chat support </li>

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
                                                                                class="custom-btn3"> Current Plan </a>
                                                                            --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-lg-4 col-sm-12 col-12 m-b-40">
                                                                    <div class="pricing-box" id="prcngwht3">
                                                                        <h2 class="col-white col-lg-12 cntntm"
                                                                            id="prcngwht3a"> Enterprise </h2>
                                                                        <div class="pricing-box-head">
                                                                            <div class="pricing-icon">
                                                                                <img
                                                                                    src="{{asset('front')}}/images/dollar-icon.svg">
                                                                            </div>
                                                                            <div class="pricing-title tas">
                                                                                <h4 class="col-white" id="prcngwht3b">
                                                                                    $119.80/Mon </h4>
                                                                                <p id="prcngwht3c"> 300 000 words <br>
                                                                                    10 reports </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="pricing-detail">
                                                                            <h4 class="col-white" id="prcngwht3d"> Plan
                                                                                Includes </h4>
                                                                            <ul>
                                                                                <li id="prcngwht3e"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    latest AI models </li>
                                                                                <li id="prcngwht3f"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    60+ templates </li>
                                                                                <li id="prcngwht3g"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    Keyword Generation </li>
                                                                                <li id="prcngwht3h"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    SEO Score improvement </li>
                                                                                <li id="prcngwht3i"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    Al Article Writer </li>
                                                                                <li id="cpywht2b"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    Ezchat </li>
                                                                                <li id="cpywht1a"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    20+ languages </li>
                                                                                <li id="cpywht1b"> <img
                                                                                        src="{{asset('front')}}/images/tickorange.svg">
                                                                                    Live chat support </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="pricing-btn">
                                                                            <a  href="{{route('web.pricing')}}" class="custom-btn2"
                                                                                id="prcngwht3j"><u> View All Details
                                                                                </u></a>
                                                                            <a href="mailto:sales@easyseo.ai" class="custom-btn3"> Contact us </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </section>
                                        <!-- Pricing Packages Section Ends Here -->
                                    </section>
                                    <!--Info Detail Section Starts Here -->
                                    <!-- Image-box Section Starts Here  -->
                                    <section id="prcngwht1">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-8 col-lg-8 col-sm-6 col-12">
                                                    <p class="tls col-white pad-bot-30 font-size-40" id="writewht1a">
                                                        <b>Our latest <span class="col-orange font-size-40">blog</span>
                                                            topics: </b></p>
                                                </div>
                                                <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                                                    <a class="col-white font-size-15 m-t-20 tae d-f j-c-e dn"
                                                        id="writewht1b" href="{{route('web.blog.all')}}"><u>See all
                                                            topics</u></a>
                                                </div>
                                            </div>
                                            <div class="block-element">
                                                <div class="row" style="display: none !important;">
                                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 p-l-25 p-r-25 tls dn">
                                                        <div class="feature-boxes nwwbfeature-boxes" id="writewht1">
                                                            <img class="pad-bot-20" alt="Icon"
                                                                src="{{asset('front')}}/images/Imge6.svg">
                                                            <p class="pad-bot-20 p-l-20 p-r-20"
                                                                id="writewht2a"><span
                                                                    class="blkchn">Engineering</span>&nbsp; &nbsp;
                                                                &nbsp; 5 min read</p>
                                                            <h4 class="p-l-20 p-r-20 font-size-20"
                                                                id="writewht2b">What is a Decentralized Autonomous
                                                                Organization ? </h4>
                                                            <p class="pad-bot-30 font-size-15 font-weight-lighter p-l-20 p-r-20 col-grey"
                                                                id="writewht3a">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Suspendisse varius enim in eros. </p>
                                                            <a class="hdrbtn m-b-20 m-l-25" href="{{route('login')}}"
                                                                id="writewht3b"> Read more > </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 p-l-25 p-r-25 tls dn">
                                                        <div class="feature-boxes nwwbfeature-boxes" id="writewht2">
                                                            <img class="pad-bot-20" alt="Icon"
                                                                src="{{asset('front')}}/images/Imge5.svg">
                                                            <p class="col-white pad-bot-20 p-l-20 p-r-20"
                                                                id="writewht1c"><span class="blkchn">Blockchain
                                                                </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                                                            <h4 class="col-white p-l-20 p-r-20 font-size-20"
                                                                id="writewht2c">Guide to buy <br> cryptocurrency safely:
                                                                <br> September 2022 </h4>
                                                            <p class="pad-bot-30 font-size-15 font-weight-lighter col-white p-l-20 p-r-20 col-grey"
                                                                id="prcngwht">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Suspendisse varius enim in eros. </p>
                                                            <a class="hdrbtn m-b-20 m-l-25" href="{{route('login')}}"
                                                                id="writewht3c"> Read more > </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-lg-4 col-sm-6 col-12 p-l-25 p-r-25 tls">
                                                        <div class="feature-boxes nwwbfeature-boxes" id="writewht3">
                                                            <img class="pad-bot-20" alt="Icon"
                                                                src="{{asset('front')}}/images/Imge7.svg">
                                                            <p class="col-white pad-bot-20 p-l-20 p-r-20" id="hm1"><span
                                                                    class="blkchn">Crypto</span>&nbsp; &nbsp; &nbsp; 5
                                                                min read</p>
                                                            <h4 class="col-white p-l-20 p-r-20 font-size-20" id="hm2">
                                                                Crypto state of play : September 2022 </h4>
                                                            <p class="pad-bot-30 font-size-15 font-weight-lighter col-white p-l-20 p-r-20 col-grey"
                                                                id="hm3">Lorem ipsum dolor sit amet, consectetur
                                                                adipiscing elit. Suspendisse varius enim in eros. </p>
                                                            <a class="hdrbtn m-b-20 m-l-25" href="{{route('login')}}"
                                                                id="hm4"> Read more > </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @forelse ($blogs as $blog)
                                                    <div
                                                        class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                                                        <div class="feature-boxes nwwbfeature-boxes ftr-bx">
                                                            <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon"
                                                                src="{{ check_file($blog->image) }}">
                                                            <p class="pad-bot-20 p-l-20 p-r-20 blkchnpara">
                                                                <span class="blkchn">{{ $blog->category->name }}
                                                                </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                                                                <a class="p-l-20 p-r-20 font-size-20 nwacolc" href="{{ route('web.blog.details',$blog->slug) }}"> {{ $blog->title }} </a>
                                                             <p
                                                                class="pad-bot-15 font-size-15 font-weight-lighter p-l-20 p-r-20 lrm">
                                                                {{Str::limit(strip_tags($blog->description,150))}} </p>
                                                            <a class="hdrbtn hdrbtns m-b-20 m-l-25 nwacolc"
                                                                href="{{ route('web.blog.details',$blog->slug) }}"> Read
                                                                more > </a>
                                                        </div>
                                                    </div>
                                                    <br class="onlymob">
                                                    @empty
                                                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 p-5">
                                                        <h3 class="text-light text-center" id="writewht1a"> No Blog
                                                            Found </h3>
                                                    </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Search-box Section Starts Here  -->

                                    </section>

                                </section>

                                <!-- Pricing Packages Section Ends Here -->
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<section>
    <div id="bsnsadvntg1"></div>
    <div id="bsnsadvntg2"></div>
    <div id="bxswht2"></div>
    <div id="bxswht2a"></div>
    <div id="bxswht2b"></div>
    <div id="bxswht2c"></div>
    <div id="bxswht1"></div>
    <div id="bxswht1a"></div>
    <div id="bxswht1b"></div>
    <div id="bxswht1c"></div>
    <div id="blgstayuptodate1"></div>
    <div id="cpywht2"></div>
    <div id="cpywht3"></div>
    <div id="menuitemwht"></div>
    <div id="menuitemwht5"></div>
    <div id="prcngwht22b"></div>
    <div id="prcngwht23c"></div>
    <div id="prcngwht24d"></div>
    <div id="prcngwht25"></div>
    <div id="prc1"></div>
    <div id="prc2"></div>
    <div id="prc3"></div>
    <div id="atmwtbckcolor"></div>
    <div id="blgstayuptodate"></div>
    <div id="soon21" style="display: none;"></div>
    <div id="soon22" style="display: none;"></div>
    <div id="soon23" style="display: none;"></div>
    <div id="chngabtboxshadow" style="display: none;"></div>
    <div id="chngabtboxshadow1" style="display: none;"></div>
    <div id="chngabtboxshadow2" style="display: none;"></div>
    <div id="chngabtboxshadow3" style="display: none;"></div>
    <div id="chngabtboxshadow4" style="display: none;"></div>
    <div id="chngabtboxshadow5" style="display: none;"></div>
    <div id="prcchecking1"></div>
    <div id="prcchecking2"></div>
    <div id="prcchecking3"></div>
    <div id="prcchecking4"></div>
    <div id="prcchecking5"></div>
    <div id="prcchecking6"></div>
    <div id="prcchecking7"></div>
    <div id="prcchecking8"></div>
    <div id="prcchecking9"></div>
    <div id="prcchecking10"></div>
    <div id="prcchecking11"></div>
    <div id="prcchecking12"></div>
    <div id="prcchecking13"></div>
    <div id="prcchecking14"></div>
    <div id="prcchecking15"></div>
    <div id="prcchecking16"></div>
    <div id="prcchecking17"></div>
    <div id="prcchecking18"></div>
    <div id="prcchecking19"></div>
    <div id="prcchecking20"></div>
    <div id="prcchecking21"></div>
    <div id="prcchecking22"></div>
    <div id="prcchecking23"></div>
    <div id="prcchecking24"></div>
    <div id="prcchecking25"></div>
    <div id="prcchecking26"></div>
    <div id="prcchecking27"></div>
    <div id="prcchecking28"></div>
    <div id="prcchecking29"></div>
    <div id="prcchecking30"></div>
    <div id="prcchecking31"></div>
    <div id="prcchecking32"></div>
    <div id="prcchecking33"></div>
    <div id="prcchecking34"></div>
    <div id="prcchecking35"></div>
    <div id="prcchecking36"></div>
    <div id="prcchecking37"></div>
    <div id="prcchecking38"></div>
    <div id="prcchecking39"></div>
    <div id="prcchecking40"></div>
    <div id="prcwttick1"></div>
    <div id="prcwttick2"></div>
    <div id="prcwttick3"></div>
    <div id="prcwttick4"></div>
    <div id="prcwttick5"></div>
    <div id="prcwttick6"></div>
    <div id="prcwttick7"></div>
    <div id="prcwttick8"></div>
    <div id="prcwttick9"></div>
    <div id="prcwttick10"></div>
    <div id="prcwttick11"></div>
    <div id="prcwttick12"></div>
    <div id="prcwttick13"></div>
    <div id="prcwttick14"></div>
    <div id="prcwttick15"></div>
    <div id="prcwttick16"></div>
    <div id="prcwttick17"></div>
    <div id="prcwttick18"></div>
    <div id="prcwttick19"></div>
    <div id="prcwttick20"></div>
    <div id="prcwttick21"></div>
    <div id="prcwttick22"></div>
    <div id="prcwttick23"></div>
    <div id="prcwttick24"></div>
    <div id="prcwttick25"></div>
    <div id="prcwttick26"></div>
    <div id="prcwttick27"></div>
    <div id="prcwttick28"></div>
    <div id="prcwttick29"></div>
    <div id="prcwttick30"></div>
    <div id="prcwttick31"></div>
    <div id="prcwttick32"></div>
    <div id="prcwttick33"></div>
    <div id="prcwttick34"></div>
    <div id="prcwttick35"></div>
    <div id="prcwttick36"></div>
    <div id="prcwttick37"></div>
    <div id="prcwttick38"></div>
    <div id="prcwttick39"></div>
    <div id="prcwttick40"></div>
    <div id="prcwttick41"></div>
    <div id="prcwttick42"></div>
    <div id="prcwttick43"></div>
    <div id="prcwttick44"></div>
    <div id="prcwttick45"></div>
    <div id="prcwttick46"></div>
    <div id="tblpricbckcolor"></div>
    <div id="tblpricbckcolor1"></div>
    <div id="tblpricbckcolor2"></div>
</section>
@endsection
@section('js')
{{-- <script>
     $(document).ready(function () {
        var packageToggle = 1;
        var isLogin = $('#is-login').val();
        var loggedEmail = $('#logged-email').val();
        var current = $('#buy-plan').data('current');



        const toggleyearly = document.getElementById('toggleyearly');
        const solo_proprice = document.getElementById('solo_proprice');
        const solo_proprice2 = document.getElementById('solo_proprice2');


        soloyearlyplan();
        solo_proprice.classList.add('solo_proprice_y');
        solo_proprice2.classList.add('solo_proprice2_y');
        solo_proprice.classList.remove('solo_proprice');
        solo_proprice2.classList.remove('solo_proprice2');


        // solo_proplan.classList.add('solo_proplan_y');
        toggleyearly.addEventListener('click', function() {
           const checkingd =  document.getElementById("solo_proplan");
           checkingd.setAttribute("style", "background: linear-gradient(to right,  #e3bfff  0%,  #e3bfff  ' + value + '%, #e3bfff ' + value + '%, #e3bfff 100%);");
            if (solo_proprice.classList.contains('solo_proprice_y')) {
                solomonthlyplan();
                packageToggle = 0;
                solo_proprice.classList.remove('solo_proprice_y');
                solo_proprice.classList.add('solo_proprice');
                solo_proprice2.classList.add('solo_proprice2');
                solo_proprice2.classList.remove('solo_proprice2_y');
            } else {
                soloyearlyplan();
                packageToggle = 1;
                solo_proprice.classList.add('solo_proprice_y');
                solo_proprice2.classList.add('solo_proprice2_y');
                solo_proprice.classList.remove('solo_proprice');
                solo_proprice2.classList.remove('solo_proprice2');
            }
            console.log(packageToggle);
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
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < 20000){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > 20000){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&exfo=742&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                $('#buy-plan').attr('href',Newhref);
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
            // document.getElementById("solo_proplan"), function() {
            //     // var value = (this.value-this.min)/(this.max-this.min)*100
            //     this.style.display = 'none !important';
            // };
            //  document.getElementById("solo_proplan").oninput = function() {
            //     var value = (this.value-this.min)/(this.max-this.min)*100
            //     this.style.background = 'linear-gradient(to right,  #F47300 0%,  #F47300 ' + value + '%, #e3bfff ' + value + '%, #e3bfff 100%)';
            // };


            if (current == 20000) {
                $('#buy-plan').html('Current Plan');
                Newhref = `javascript:void(0);`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current < 20000){
                $('#buy-plan').html('Upgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }

            if(current > 20000){
                $('#buy-plan').html('Downgrade Plan');
                Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&exfo=742&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                $('#buy-plan').attr('href',Newhref);
                return false;
            }
        };

        $("input#solo_proplan").on('change', function() {
            var value = $(this).val();
            $('#level').val(value);
            // var current = $('#buy-plan').data('current');
            if (value == 0) {
                $('#solo_proprice').html('$24.90');
                $('.solo_proprice_y').html('$19.90');
                $('#solo_proprice2').html('$24.90/Mon');
                $('.solo_proprice2_y').html('$19.90/Mon');
                $('#solo_protoken').html('20,000 words');
                $('#solo_protoken2').html('20,000 words');
                $('#solo_proreport').html('10 reports');


                if (current == 20000) {
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 20000){
                    $('#buy-plan').html('Upgrade Plan');

                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current > 20000){
                    $('#buy-plan').html('Downgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84335&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84432&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
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

                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82640&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;

                if (current == 50000) {
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current > 50000){
                    $('#buy-plan').html('Downgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 50000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84429&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84433&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
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

                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82641&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                // $('#buy-plan').attr('href',Newhref);

                if (current == 200000) {
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current > 200000){
                    $('#buy-plan').html('Downgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 200000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84430&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84434&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
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

                // Newhref = `https://store.payproglobal.com/checkout?products[1][id]=82642&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}`;
                $('#buy-plan').attr('href',Newhref);

                if (current == 500000) {
                    $('#buy-plan').html('Current Plan');
                    Newhref = `javascript:void(0);`;
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current > 500000){
                    $('#buy-plan').html('Downgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }

                if(current < 500000){
                    $('#buy-plan').html('Upgrade Plan');
                    if(packageToggle == 0){
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84431&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }else{
                        Newhref = `https://store.payproglobal.com/checkout?products[1][id]=84435&page-template=16802&use-test-mode=false&secret-key=htYBPBo@nV&ORDER_CUSTOM_FIELDS=x-user=${loggedEmail}&exfo=742`;
                    }
                    $('#buy-plan').attr('href',Newhref);
                    return false;
                }
            }
        });
    });
</script> --}}
<script>
    function detailFunction(value) {
      value;
    }
    $('#carouselExampleIndicators').on('slid.bs.carousel', function() {
        var activeSlideIndex = $('.carousel-item.active').index();
        var targetButton0 = $('#hmsldbtn0');
        var targetButton1 = $('#hmsldbtn1');
        var targetButton2 = $('#hmsldbtn2');
        var targetButton3 = $('#hmsldbtn3');
        var targetButton4 = $('#hmsldbtn4');
        targetButton0.removeClass('nwhmextdactv');
        targetButton1.removeClass('nwhmextdactv');
        targetButton2.removeClass('nwhmextdactv');
        targetButton3.removeClass('nwhmextdactv');
        targetButton4.removeClass('nwhmextdactv');
        if (activeSlideIndex === 0) {
            targetButton0.addClass('nwhmextdactv');
        }
        if (activeSlideIndex === 1) {
            targetButton1.addClass('nwhmextdactv');
        }
        if (activeSlideIndex === 2) {
            targetButton2.addClass('nwhmextdactv');
        }
        if (activeSlideIndex === 3) {
            targetButton3.addClass('nwhmextdactv');
        }
        if (activeSlideIndex === 4) {
            targetButton4.addClass('nwhmextdactv');
        }
    });
    window.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('pg0');
        element.classList.add('pghovered');
    });
     $(document).ready(function () {
        var targetButton0 = $('#hmsldbtn0');
        targetButton0.addClass('nwhmextdactv');
        var packageToggle = 1;
        var isLogin = $('#is-login').val();
        var loggedEmail = $('#logged-email').val();
        var current = $('#buy-plan').data('current');
        var planCode = $('#buy-plan').data('plancode');

        var monthlyCode = ['P20','P50','P200','P500'];
        var yearlyCode = ['P20-year','P50-year','P200-year','P500-year'];

        var slideIndex = 0;

        const toggleyearly = document.getElementById('toggleyearly');
        const solo_proprice = document.getElementById('solo_proprice');
        const solo_proprice2 = document.getElementById('solo_proprice2');

        soloyearlyplan();
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
                    // $('#buy-plan').html('Downgrade Plan');
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
