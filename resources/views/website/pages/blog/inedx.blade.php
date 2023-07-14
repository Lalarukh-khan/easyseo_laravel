@extends('layouts.web_main')
@section('css')
<meta name="description" content="Read the latest easyseo.ai blogs.">
<meta property="og:url" content="https://www.easyseo.ai/blog" />
<meta name="twitter:title" content="Easyseo.ai | Blogs">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@Easyseo.ai">
<meta name="twitter:creator" content="@Easyseo.ai">
<meta name="twitter:description" content="Read the latest easyseo.ai blogs.">
<meta property="twitter:url" content="https://www.easyseo.ai/blog"/>
<meta property="og:url" content="https://www.easyseo.ai/blog" />
<meta property="og:title" content="Easyseo.ai | Blogs" />
<meta property="og:type" content="article" />
<meta property="og:description" content="Read the latest easyseo.ai blogs." />
<meta property="og:site_name" content="easyseo.ai">
<meta property="og:locale" content="en_US">

<style>
    .ajax-loader{
        display: flex;
        justify-content: center;
    }
    .ajax-loader img{
        width: 300px;
    }
</style>
@endsection
@section('content')

<!-- News and Insight Section Starts here  -->
<section class="abtbsnss pad-top-40 bg-secblgs gvngblack" id="writewht1">
<div> <!-- class="bluebgbig" -->
    <div class="row" style="width: 100%; height: auto;">
        <div class="col-lg-4 col-md-3 col-sm-12 col-12"></div>
        <div class="blg col-lg-4 col-md-6 col-sm-12 col-12">
            <span class="font-size-20" id="writewhtbtn1">Blog <img alt="Icon" src="{{asset('front')}}/images/stars.svg"id="bsnsadvntgimg5"></span>
            <p class="col-white instnws"  id="writewhtbtn2"> News and <span class="font-size-45 col-orange instnwsspn newsinsights">insights</span> </p>
            <p class="font-size-15 font-weight-light col-white blk" id="writewhtbtn3">Learn about AIs, SEO, Marketing, and E-commerce businesses. <br class="nomob">Discover our latest product updates, partnership announcements, <br class="nomob">user stories, and more</p>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-12 col-12"></div>
    </div>
<!-- List Section Starts Here  -->
<div class="pad-top-20 pad-bot-40">
    <div class="container">
        <!-- <div class="ajax-loader d-none">
            <img src="{{asset("front/images/blog-loader.svg")}}" alt="">
        </div> -->
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-12"></div>
            <div class="blgul col-lg-10 col-md-10 col-sm-12 col-12 dn">
                <ul class="row" id="prcngwht3" style="text-align: center !important;">
                    <li class="nwwbliviewall checktheclass" onclick="addactvbtn(this)"><a class="nav-link font-weight-light nwacolc" role="tab" href="javascript:void(0)" data-id="all">View all</a></li>
                    <!-- <li><a class="col-white font-size-15 font-weight-light" href="#" role="button"id="writewht1b">Crypto</a></li>-->
                    @foreach ($categories as $cat)
                    <li class="checktheclass" onclick="addactvbtn(this)">
                        <a class="nav-link font-size-15 font-weight-light nwacolc" data-toggle="tab" href="javascript:void(0)" role="tab" data-id="{{ $cat->hashid }}">{{ $cat->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-12"></div>
        </div>
    </div>
</div>
<!--   List Section Ends Here  -->
<!-- Passport Section Starts Here  -->
<div class="pad-bot-60 dc" style="display: none;">
    <div class="container">
        <div class="row chatgpt">
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                <div class="row">
                    <img class="inf" alt="Robotic Infographics" src="{{asset('front')}}/images/dice.svg">
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 psprt"  id="blgstayuptodate1">
                <div class="row" id="amzngwht">
                    <div class="col-lg-12 pad-top-15 p-l-40 p-r-55 technology" >
                        <div class="row">
                            <p class="col-white pad-top-15 pad-bot-10" id="hm1"><img alt="Robotic Infographics" src="{{asset('front')}}/images/ai.svg">&nbsp; &nbsp; &nbsp; 5 min read</p>
                            <p class="col-white pad-bot-10 font-size-35 l-h-1 psprtchat nwwbpsprtchat" id="writewht3c"><b>Your passport to the ChatGPT4 economy</b></h2>
                            <p class="col-white font-size-15 m-b-20 font-weight-lighter pad-bot-40 blks nwwbblks"  id="prcngwht">If you’ve read this far and you’re wondering what “web3” is exactly, this is one of those need-to-knows, and it’s pretty simple. We’ll explain more below, but in short web3 is the next era of the internet in which blockchain technology will play a central role.</p>
                            <a class= "hdrbtn m-b-20 dn" href="{{route('login')}}"id="prcngwht1a" > Read more > </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br class="onlymob">
<!-- Passport Section Ends Here  -->
<!-- Image-box Section Starts Here  -->
<section class="bg-subscribe" id="prcngwht1">
    <div class="container">
        <div class="block-element">
            <div class="row" style="display: none !important;">
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                    <div class="feature-boxes nwwbfeature-boxes ftr-bx" id="amzngwht3">
                        <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon" src="{{asset('front')}}/images/laptop.svg">
                        <p class="col-white pad-bot-20 p-l-20 p-r-20 blkchnpara"  id="prcngwht1b"><span class="blkchn">Blockchain </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                        <h4 class="col-white p-l-20 p-r-20 font-size-20"  id="prcngwht1c">A beginner’s guide to blackchain for engineers </h4>
                        <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20 lrm"  id="prcngwht1d">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros. </p>
                        <a class= "hdrbtn hdrbtns m-b-20 m-l-25" href="{{route('login')}}"id="prcngwht3e"> Read more > </a>
                    </div>
                </div>
                <br class="onlymob">
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20">
                    <div class="feature-boxes nwwbfeature-boxes ftr-bx ftr-bxs" id="amzngwht4">
                        <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon" src="{{asset('front')}}/images/imge3.svg">
                        <p class="col-white pad-bot-20 p-l-20 p-r-20 blkchnpara" id="prcngwht3f"><span class="blkchn">People </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                        <h4 class="col-white p-l-20 p-r-20 font-size-20" id="prcngwht3g">How to secure have your <br class="onlytab"> crypto wallet </h4>
                        <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20 lrm"  id="prcngwht3h">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros. </p>
                        <a class= "hdrbtn hdrbtns m-b-20 m-l-25" href="{{route('login')}}"id="prcngwht3i"> Read more > </a>
                    </div>
                </div>
                <br class="onlymob">
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20">
                    <div class="feature-boxes nwwbfeature-boxes ftr-bx ftr-bxs" id="amzngwht5">
                        <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon" src="{{asset('front')}}/images/imge4.svg">
                        <p class="col-white pad-bot-20 p-l-20 p-r-20 blkchnpara" id="prcngwht1e1"> <span class="blkchn">NFT </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                        <h4 class="col-white p-l-20 p-r-20 font-size-20" id="prcngwht1e2">New NFT projects to watch : December 2022 </h4>
                        <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20 lrm" id="prcngwht1e3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros. </p>
                        <a class= "hdrbtn hdrbtns m-b-20 m-l-25" href="{{route('login')}}"id="prcngwht1f"> Read more > </a>
                    </div>
                </div>
                <br class="onlymob">
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 m-b-30 p-l-20 p-r-20 dn">
                    <div class="feature-boxes nwwbfeature-boxes" id="amzngwht6">
                        <img class="pad-bot-20 nwwbblkchnimg" alt="Icon" src="{{asset('front')}}/images/Imge6.svg">
                        <p class="col-white pad-bot-20 p-l-20 p-r-20" id="prcngwht22b"><span class="blkchn">Engineering </span> &nbsp; &nbsp; &nbsp; 5 min read</p>
                        <h4 class="col-white p-l-20 p-r-20 font-size-20" id="prcngwht23c">What is a Decentralized Autonomous Organization ? </h4>
                        <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20" id="prcngwht26">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros. </p>
                        <a class= "hdrbtn m-b-20 m-l-25" href="{{route('login')}}"id="prcngwht27"> Read more > </a>
                    </div>
                </div>
                <br class="onlymob">
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 m-b-30 p-l-20 p-r-20 dn">
                    <div class="feature-boxes nwwbfeature-boxes" id="amzngwht7">
                        <img class="pad-bot-20 nwwbblkchnimg" alt="Icon" src="{{asset('front')}}/images/Imge7.svg">
                        <p class="col-white pad-bot-20 p-l-20 p-r-20" id="prcngwht29"><span class="blkchn">Crypto</span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                        <h4 class="col-white p-l-20 p-r-20 font-size-20" id="prcngwht221">Crypto currency state of play : September 2022 </h4>
                        <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20" id="prcngwht222">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros. </p>
                        <a class= "hdrbtn m-b-20 m-l-25" href="{{route('login')}}"id="prcngwht223"> Read more > </a>
                    </div>
                </div>
                <br class="onlymob">
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 m-b-30 p-l-20 p-r-20 dn">
                    <div class="feature-boxes nwwbfeature-boxes" id="amzngwht8">
                        <img class="pad-bot-20 nwwbblkchnimg" alt="Icon" src="{{asset('front')}}/images/Imge5.svg">
                        <p class="col-white pad-bot-20 p-l-20 p-r-20" id="prcngwht224"><span class="blkchn">Blockchain</span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                        <h4 class="col-white p-l-20 p-r-20 font-size-20" id="prcngwht3a">Guide to buy cryptocurrency safe ly: September 2022 </h4>
                        <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros. </p>
                        <a class= "hdrbtn m-b-20 m-l-25" href="{{route('login')}}"id="prcngwht3c"> Read more > </a>
                    </div>
                </div>
            </div>

            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                            <div class="feature-boxes nwwbfeature-boxes ftr-bx" id="amzngwht3">
                                <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon" src="{{ check_file($blog->image) }}">
                                <p class="pad-bot-20 p-l-20 p-r-20 blkchnpara"  id="prcngwht1b"><span class="blkchn">{{ $blog->category->name }} </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                                <a class="p-l-20 p-r-20 font-size-20 nwacolc blgtthgt" id="prcngwht1c"  href="{{ route('web.blog.details',$blog->slug) }}"> {{ $blog->title }} </a>
                                <p class="pad-bot-15 font-size-15 font-weight-lighter p-l-20 p-r-20 lrm"  id="prcngwht1d">{{Str::limit(strip_tags($blog->description,150))}} </p>
                                <a class= "hdrbtn hdrbtns m-b-20 m-l-25 nwacolc"  href="{{ route('web.blog.details',$blog->slug) }}"> Read more > </a>
                            </div>
                        </div>
                        <br class="onlymob">
                        @empty
                        <div class="col-md-12 col-lg-12 col-sm-12 col-12 p-5">
                            <h3 class="text-light text-center" id="writewht1a"> No Blog Found </h3>
                        </div>
                        @endforelse
                </div>

                <div class="block-element d-flex align-items-center justify-content-center">
                    @if (!empty($blogs))
                    {{ $blogs->withQueryString()->links('vendor.pagination.blogs') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br class="onlymob">
    <br class="onlymob">
    <!-- Search-box Section Starts Here  -->
<section class="bg-sec8 pad-bot-60 bgsec8" id="writewht2">
    <div id="atmtwht">
        <div class="container" >
            <div class="row b-1-white bord" id="blgstayuptodate">
                <div class="col-md-6 col-lg-7 col-sm-6 col-12 bg-secblg p-l-100 bgsecblg" id="bxswht1">
                    <h2 class="col-white pad-top-60 styup" id="prcngwht3d">Stay up to date !</h2>
                    <p class="col-white pad-top-10" id="atmtwhtt1">Subscribe to our newsletter to get inbox notifications.</p>
                </div>
                <div class="col-md-6 col-lg-5 col-sm-6 col-12 pad-top-80 pad-bot-80 sbscrbeml">
                    <p class="col-white m-l-20 dn"  id="atmtwhtt1a">Sign up to our newsletter ↓</p>
                    <form class="m-l-20">
                        <input  class="sbscrb" type="email" id="atmwtbckcolor2" name="email" placeholder="Enter your email">
                        <button class="sbscrbbtn" type="submit"  id="atmwtbckcolor">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
<!-- Image-box Section Ends Here  -->
</div>
</section>
<!-- News and Insight Section Ends here  -->

<section>
    <div id="cpywht2"></div>
    <div id="cpywht3"></div>
    <div id="writewht2a"></div>
    <div id="writewht2b"></div>
    <div id="writewht3a"></div>
    <div id="writewht3b"></div>
    <div id="writewht1a"></div>
    <div id="writewht1c"></div>
    <div id="writewht1b"></div>
    <div id="solo_proprice2"></div>
    <div id="solo_protoken2"></div>
    <div id="solo_proreport"></div>
    <div id="solo_proprice"></div>
    <div id="gotwht2"></div>
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
    <div id="cpywht1a"></div>
    <div id="cpywht1b"></div>
    <div id="cpywht2a"></div>
    <div id="cpywht2b"></div>
    <div id="hmamazonimg1"></div>
    <div id="hmamazonimg2"></div>
    <div id="hmamazonimg3"></div>
    <div id="hmamazonimg4"></div>
    <div id="hm2"></div>
    <div id="hm3"></div>
    <div id="hm4"></div>
    <div id="prc1"></div>
    <div id="writewht2c"></div>
    <div id="prc2"></div>
    <div id="prc3"></div>
    <div id="atmwtbckcolor"></div>
    <div id="atmwtbckcolor2"></div>
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
    <div id="prcngwht27"></div>
    <div id="atmtwhtt2"></div>
    <div id="prcngwht28"></div>
    <div id="prcngwht29"></div>
    <div id="prcngwht221"></div>
    <div id="prcngwht222"></div>
    <div id="prcngwht223"></div>
    <div id="prcngwht224"></div>
    <div id="prcngwht1e1"></div>
    <div id="prcngwht1f"></div>
    <div id="prcngwht2"></div>
    <div id="writewht3"></div>
    <div id="prcngwht1e"></div>
    <div id="prcngwht3a"></div>
    <div id="prcngwht3b"></div>
    <div id="prcngwht3c"></div>
    <div id="prcngwht3d"></div>
    <div id="prcngwht3e"></div>
    <div id="prcngwht3f"></div>
    <div id="prcngwht3g"></div>
    <div id="prcngwht3h"></div>
    <div id="prcngwht3i"></div>
    <div id="prcngwht3j"></div>
    <div id="bxswht2"></div>
    <div id="bxswht3"></div>
    <div id="bxswht4"></div>
    <div id="gotwht"></div>
    <div id="getwht"></div>
    <div id="getwht1"></div>
    <div id="bxswht1a"></div>
    <div id="bxswht1b"></div>
    <div id="bxswht1c"></div>
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
    <div id="prcngwht21achk"></div>
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
    <div id="amzngwht2"></div>
    <div id="amzngwht3"></div>
    <div id="amzngwht5"></div>
    <div id="amzngwht9"></div>
    <div id="amzngwht10"></div>
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
    <div id="atmtwhtt"></div>
    <div id="atmtwhtt1"></div>
    <div id="atmtwhtt1a"></div>
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
<!-- <div class="col-md-5 col-lg-5 col-sm-6 col-12">
                <form>
                    <input  class="sbscrb" type="email" id="email" name="email" placeholder="Enter your email">
                    <button class="sbscrbbtn" type="submit">Subscribe</button>
                </form>
            </div>

<section class="page-banner-sec">
    <div class="container">
        <div class="page-banner-text wow fadeInUp m-b-50" data-wow-delay="0.4s">
           <h3 class="col-white"> Our <span class="col-orange"> Blog </span>  </h3>
           <p> We strive to create simple and easy to understand prices, where you get most value for the money. </p>
        </div>
        <div class="blog-search-form wow fadeInUp" data-wow-delay="0.6s">
            <input type="text" placeholder="Search anything" id="searchInput">
            <button type="button" class="submit-btn3" id="searchBtn"> Search </button>
        </div>
     </div>
</section>
<section class="pad-top-100 pad-bot-60 bg-black1 bg-sec5">
    <div class="container">
        <div class="block-element text-center m-b-40 wow fadeInUp" data-wow-delay="0.3s">
            <h3 class="title-text1"> Latest Trending <span class="col-orange"> Articles </span> </h3>
        </div>
        <div class="block-element m-b-50">
            <div class="tabs-handler">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="javascript:void(0)" role="tab"
                            data-id="all">All</a>
                    </li>

                    @foreach ($categories as $cat)
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="javascript:void(0)" role="tab"
                            data-id="{{ $cat->hashid }}">{{ $cat->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="block-element">
            <div class="tabs-all-content">
                <div class="tab-content">
                    <div class="ajax-loader d-none">
                        <img src="{{asset("front/images/blog-loader.svg")}}" alt="">
                    </div>
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="block-element">
                            <div class="row blog-row justify-content-center">
                                @forelse ($blogs as $blog)
                                <div class="col-md-4 col-lg-4 col-sm-6 col-12">
                                    <div class="blog-box">
                                        <div class="blog-image-box">
                                            <img src="{{ check_file($blog->image) }}">
                                        </div>
                                        <div class="blog-desc">
                                            <h3> {{ $blog->title }} </h3>
                                            <ul class="custom-list3">
                                                <li> <img src="{{asset('front')}}/images/calendar-icon.svg"> {{
                                                    $blog->created_at->format('M d, Y') }}</li>

                                            </ul>
                                            <a href="{{ route('web.blog.details',$blog->slug) }}" class="blog-btn1">
                                                Read More <img src="{{asset('front')}}/images/arrow-icon1.png"> </a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12 col-lg-12 col-sm-12 col-12 p-5">
                                    <h3 class="text-light text-center"> No Blog Found </h3>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="block-element d-flex align-items-center justify-content-center">

                            @if (!empty($blogs))
                            {{ $blogs->withQueryString()->links('vendor.pagination.blogs') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> -->
@endsection
@section('js')
<script>
    function addactvbtn(button) {
        var prelements = document.getElementsByClassName('checktheclass');
        for (var i = 0; i < prelements.length; i++) {
            prelements[i].classList.remove('nwwbliviewall');
        }
        button.classList.add("nwwbliviewall");  
    }
    function detailFunction(value) {
      value;
    }
    window.addEventListener('DOMContentLoaded', function() {
        var element = document.getElementById('pg1');
        element.classList.add('pghovered');
    });
    $('body').on('click','.nav-link',function(){
        $('#searchInput').val('');
        $tab = $(this);
        id = $tab.data('id');
        $('#tabs-1').empty();
        loader(true);
        $param = {
            'category_id':id,
        }
        $.ajax({
            type: "get",
            url: "{{ route('web.blog.get_by_cat') }}",
            data: $param,
            success: function (data) {
                $('#tabs-1').empty();
                loader(false);
                if (data.status == true) {
                    $('#tabs-1').html(data.res);
                }
            }
        });
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        $('.pagination li').removeClass('active');
        $(this).parent('li').addClass('active');
        var url = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];

        getData(page,url);
    });

    function getData(page,url) {
        $('#tabs-1').empty();
        loader(true);
        $.ajax(
        {
            url: url,
            type: 'get',
            datatype: 'json',
            success: function (data) {
                loader(false);
                if (data.status == true) {
                    $('#tabs-1').html(data.res);
                }
            }
        });
    }

    $(document).on('click','#searchBtn',function(){
        let searchInput = $('#searchInput');
        let currentCat = $('.nav-link.active').data('id');
        // if (searchInput.val() == '') {
        //     return false;
        // }
        $('#tabs-1').empty();
        loader(true);
        $param = {
            'category_id':currentCat,
            'searchValue':searchInput.val()
        }
        $.ajax({
            type: "get",
            url: "{{ route('web.blog.get_by_cat') }}",
            data: $param,
            success: function (data) {
                loader(false);
                if (data.status == true) {
                    $('#tabs-1').html(data.res);
                }
            }
        });

    });

    function loader(status){
        if (status) {
            $('.ajax-loader').removeClass('d-none');
            return false;
        }
        $('.ajax-loader').addClass('d-none');
    }
</script>
@endsection