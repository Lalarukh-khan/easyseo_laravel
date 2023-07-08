@extends('layouts.web_main')
@section('css')
    <meta name="description" content="{{ $data->meta_description }}">
	<meta property="og:url" content="{{ route('web.blog.details',$data->slug) }}" />
    <meta name="twitter:title" content="Easyseo.ai | {{ $data->title }}">
    <meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@Easyseo.ai">
	<meta name="twitter:creator" content="@Easyseo.ai">
	<meta name="twitter:description" content="{{ $data->meta_description }}">
	<meta property="twitter:url" content="{{ route('web.blog.details',$data->slug) }}"/>
	<meta property="og:url" content="{{ route('web.blog.details',$data->slug) }}" />
	<meta property="og:title" content="Easyseo.ai | {{ $data->title }}" />
	<meta property="og:type" content="article" />
	<meta property="og:description" content="{{ $data->meta_description }}" />
	<meta property="og:site_name" content="easyseo.ai">
	<meta property="og:locale" content="en_US">
    <style>
        .blacktextcnvrtrdt{
            color: black !important;
        }
    </style>
@endsection
@section('content')
<!-- Page Banner Section Starts Here -->
<section class="abtbsnss pad-top-40 bg-secblgs gvngblack" id="writewht1">
    <div class="container">
        <div class="row" style="width: 100%; height: auto;">
            <div class="blg col-lg-12 col-md-12 col-sm-12 col-12">
                <span class="font-size-20" id="writewhtbtn1">Blog <img alt="Icon" src="{{asset('front')}}/images/stars.svg"id="bsnsadvntgimg5"></span>
                <p class="col-white instnws"  id="writewhtbtn2"> {{ $data->title }} </p>
            </div>
        </div>
        <div class="block-element m-b-50 m-t-50"> 
            <div class="blog-detail-image">
                <img class="nwwbbldtimg" src="{{ check_file($data->image) }}">
            </div>
            <div class="blog-detail-text text-light" id="writewhtbtn2">
                <h2 id="sub1tt" class="nwacolc"></h2>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <p class="dateblg nwacolc" id="dateblg"></p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <p class="dateblg nwacolc">{{ $data->category->name }}</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <p class="dateblg1 nwacolc">{{ $data->auther }}</p> 
                    </div>
                </div>
                <br>
                <p id="fp1"></p>
            </div>
            <br><br><br><br><br>
            <div class="container-fluid bgdtbckimg">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-6 col-6">
                            <h3 class="nwacolc">Recent Posts</h3>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-6">
                            <p style="text-align: right;">
                                <a class="nwacolc" href="{{ route('web.blog.all') }}">
                                    <u>View all</u>
                                </a>
                            </p>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        @forelse ($latestblogs as $latestblog)
                            <div class="col-md-6 col-lg-6 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                                <div class="feature-boxes nwwbfeature-boxes ftr-bx">
                                    <br>
                                    <a class="p-l-20 p-r-20 font-size-30 nwacolc" href="{{ route('web.blog.details',$latestblog->slug) }}"> {{ $latestblog->title }} </a>
                                    <br><br>
                                    <div class="row" style="padding-left: 20px;">
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                            <p class="dateblg nwacolc">{{ $latestblog->created_at->format('d F Y') }}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <p class="dateblg1 nwacolc">{{ $data->category->name }}</p> 
                                        </div>
                                    </div>
                                    <br>
                                    <p class="pad-bot-15 font-size-15 font-weight-lighter p-l-20 p-r-20 lrm">{{Str::limit(strip_tags($latestblog->description), 300, '...')}} </p>
                                </div>
                            </div>
                            <br class="onlymob">
                            @empty
                            <div class="col-md-12 col-lg-12 col-sm-12 col-12 p-5">
                                <h3 class="text-light text-center"> No Blog Found </h3>
                            </div>
                        @endforelse
                    </div>
            </div>
            <div id="sp1" class="blog-detail-text  text-light nwacolc"></div>
            <div id="img1" class="blog-detail-text  text-light text-center"></div>
            <div id="sp2" class="blog-detail-text  text-light nwacolc"></div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div id="sp3" class="blog-detail-text  text-light nwacolc" style="text-align: justify;"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div id="img2" class="blog-detail-image"></div>
                </div>
            </div>
            <div id="sp4" class="blog-detail-text text-light nwacolc"></div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div id="img3" class="blog-detail-image"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div id="lastp" class="blog-detail-text  text-light nwacolc" style="text-align: justify;"></div>
                </div>
            </div>
            <br><br>
            <div class="block-element text-left m-t-40 m-b-40">
                <h3 class="title-text1" id="writewhtbtn3"> Featured posts</h3>
            </div>
            <div class="block-element m-b-50">
                <div class="row">
                    @foreach ($relevant_blogs as $blog)
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 p-l-20 engn">
                                <div class="feature-boxes nwwbfeature-boxes ftr-bx">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                            <img class="blkchnimg nwwbblkchnimg" alt="Icon" src="{{ check_file($blog->image) }}">
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                            <a class="p-l-20 p-r-20 font-size-30 font-weight-bolder nwacolc pad-top-20" href="{{ route('web.blog.details',$blog->slug) }}"> {{ $blog->title }} </a>
                                            <br><br>
                                            <div class="row p-l-20">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                                    <p class="blgdtwhtr"></p>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-10 col-10">
                                                    <p class="blgdtwhrc">{{ $blog->category->name }}</p>
                                                </div>
                                            </div>
                                            <br>
                                            <p class="pad-bot-15 font-size-15 font-weight-lighter p-l-20 p-r-20 lrm">{{Str::limit(strip_tags($latestblog->description), 250, '...')}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br class="onlymob">
                    @endforeach

                </div>
            </div>

            <br><br><br><br>
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
                                            

            <div class="row">
                                                    @forelse ($latestblogs2 as $latestblog2)
                                                    <div
                                                        class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                                                        <div class="feature-boxes nwwbfeature-boxes ftr-bx">
                                                            <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon"
                                                                src="{{ check_file($latestblog2->image) }}">
                                                            <p class="pad-bot-20 p-l-20 p-r-20 blkchnpara">
                                                                <span class="blkchn">{{ $latestblog2->category->name }}
                                                                </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                                                                <a class="p-l-20 p-r-20 font-size-20 nwacolc" href="{{ route('web.blog.details',$latestblog2->slug) }}"> {{ $latestblog2->title }} </a>
                                                             <p
                                                                class="pad-bot-15 font-size-15 font-weight-lighter p-l-20 p-r-20 lrm">
                                                                {{Str::limit(strip_tags($latestblog2->description,150))}} </p>
                                                            <a class="hdrbtn hdrbtns m-b-20 m-l-25 nwacolc"
                                                                href="{{ route('web.blog.details',$latestblog2->slug) }}"> Read
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
    <div style="display: none;" id="wholedesc">{!!  $data->description  !!}</div>
    <div  style="display: none;" id="blgdate">{{ $data->created_at}} </div>
</section>
<section>
    <div id="cpywht2"></div>
    <div id="cpywht3"></div>
    <div id="writewht2"></div>
    <div id="writewht1a"></div>
    <div id="writewht3"></div>
    <div id="writewht1b"></div>
    <div id="writewht2a"></div>
    <div id="writewht2b"></div>
    <div id="prcngwht3"></div>
    <div id="writewht1c"></div>
    <div id="writewht2c"></div>
    <div id="writewht3c"></div>
    <div id="prcngwht2"></div>
    <div id="amzngwht3achk"></div>
    <div id="writewht3a"></div>
    <div id="writewht3b"></div>
    <div id="prcngwht1"></div>
    <div id="prcngwht"></div>
    <div id="bsnsadvntg3"></div>
    <div id="bxswht1"></div>
    <div id="prcngwht3f"></div>
    <div id="bxswht2"></div>
    <div id="prcngwht3g"></div>
    <div id="bxswht3"></div>
    <div id="prcngwht3h"></div>
    <div id="prcngwht1e1"></div>
    <div id="prcngwht1e2"></div>
    <div id="bsnsadvntg1"></div>
    <div id="bsnsadvntg1o"></div>
    <div id="prcngwht1e3"></div>
    <div id="blankCheckbox"></div>
    <div id="prcngwht21achk"></div>
    <div id="blankCheckbox"></div>
    <div id="prcngwht22b"></div>
    <div id="blankCheckbox"></div>
    <div id="prcngwht23c"></div>
    <div id="blankCheckbox"></div>
    <div id="prcngwht26"></div>
    <div id="bsnsadvntg2"></div>
    <div id="solo_proprice2"></div>
    <div id="solo_protoken2"></div>
    <div id="solo_proreport"></div>
    <div id="solo_proprice"></div>
    <div id="menuitemwht"></div>
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
    <div id="blgstayuptodate1"></div>
    <div id="hmamazonimg1"></div>
    <div id="hmamazonimg2"></div>
    <div id="hmamazonimg3"></div>
    <div id="hmamazonimg4"></div>
    <div id="hm1"></div>
    <div id="hm2"></div>
    <div id="hm3"></div>
    <div id="hm4"></div>
    <div id="prc1"></div>
    <div id="prc2"></div>
    <div id="prc3"></div>
    <div id="atmwtbckcolor"></div>
    <div id="atmwtbckcolor2"></div>
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
    <div id="prcngwht1a"></div>
    <div id="prcngwht1b"></div>
    <div id="prcngwht1c"></div>
    <div id="prcngwht1d"></div>
    <div id="prcngwht1e"></div>
    <div id="prcngwht3e"></div>
    <div id="prcngwht27"></div>
    <div id="prcngwht28"></div>
    <div id="prcngwht29"></div>
    <div id="prcngwht221"></div>
    <div id="prcngwht222"></div>
    <div id="prcngwht223"></div>
    <div id="prcngwht224"></div>
    <div id="prcngwht1e1"></div>
    <div id="prcngwht1f"></div>
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
    <div id="atmtwht"></div>
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
<script>
    var wholedesc = document.getElementById("wholedesc");
    const content = wholedesc.innerHTML;
    const ttword = '</h5>';
    const fpword = '</p>';
    const spword = '<img';
    const imgword = '">';
    const sp2word = '<h5><strong';
    const ttindex = content.indexOf(ttword);
    if (ttindex !== -1) {
        const tttrimmedContent = content.substring(0, ttindex + ttword.length);
        document.getElementById("sub1tt").innerHTML = tttrimmedContent;
    }
    var rstindex = content.indexOf(fpword);
    if (rstindex !== -1) {
        var trimmedContent = content.substring(rstindex + fpword.length).trim();
        const fpindex = trimmedContent.indexOf(fpword);
        const fptrimmedContent = trimmedContent.substring(0, fpindex + fpword.length);
        const spremainingContent = trimmedContent.slice(fpindex + fpword.length);
        const spindex = spremainingContent.indexOf(spword);
        const sptrimmedContent = spremainingContent.substring(0, spindex);
        const imgremainingContent = spremainingContent.slice(spindex + spword.length);
        const imgindex = imgremainingContent.indexOf(imgword);
        const imgtrimmedContent = "<img " + imgremainingContent.substring(0, imgindex + imgword.length);
        const sp2remainingContent = imgremainingContent.slice(imgindex + imgword.length);
        const sp2index = sp2remainingContent.indexOf(sp2word);
        const sp2trimmedContent = sp2remainingContent.substring(0, sp2index);
        const sp3remainingContent = sp2remainingContent.slice(sp2index + sp2word.length);
        const sp3index = sp3remainingContent.indexOf(spword);
        const sp3trimmedContent = "<h5><strong" + sp3remainingContent.substring(0, sp3index);
        const img2remainingContent = sp3remainingContent.slice(sp3index + spword.length);
        const img2index = img2remainingContent.indexOf(imgword);
        const imgstart = "<img class='nwwbbldtimg'";
        const img2trimmedContent = imgstart + img2remainingContent.substring(0, img2index + imgword.length);
        const sp4remainingContent = img2remainingContent.slice(img2index + imgword.length);
        const sp4index = sp4remainingContent.indexOf(spword);
        const sp4trimmedContent =  sp4remainingContent.substring(0, sp4index);
        const img3remainingContent = sp4remainingContent.slice(sp4index + spword.length);
        const img3index = img3remainingContent.indexOf(imgword);
        const img3trimmedContent = imgstart + img3remainingContent.substring(0, img3index + imgword.length);
        const lastremainingContent = img3remainingContent.slice(img3index + imgword.length);
        document.getElementById("fp1").innerHTML = fptrimmedContent;
        document.getElementById("sp1").innerHTML = sptrimmedContent;
        document.getElementById("img1").innerHTML = imgtrimmedContent;
        document.getElementById("sp2").innerHTML = sp2trimmedContent;
        document.getElementById("sp3").innerHTML = sp3trimmedContent;
        document.getElementById("img2").innerHTML = img2trimmedContent;
        document.getElementById("sp4").innerHTML = sp4trimmedContent;
        document.getElementById("img3").innerHTML = img3trimmedContent;
        document.getElementById("lastp").innerHTML = lastremainingContent;
    }
    function convertDateFormat(dateString) {
        var date = new Date(dateString);
        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var day = date.getDate();
        var monthIndex = date.getMonth();
        var year = date.getFullYear();
        var monthName = monthNames[monthIndex];
        return day + ' ' + monthName + ' ' + year;
    }
    var dateString = document.getElementById("blgdate").textContent;
    var formattedDate = convertDateFormat(dateString);
    document.getElementById("dateblg").innerHTML = formattedDate;

    // console.log("Here's the desc: "+content);
</script>
<script>
    var spans = document.getElementsByTagName("span");
    var ems = document.getElementsByTagName("em");
    var strongs = document.getElementsByTagName("strong");

    for (var i = 0; i < spans.length; i++) {
    spans[i].style.color = "white"; // Replace "red" with the desired color
    spans[i].style.fontSize = "18px";
    }
    for (var i = 0; i < ems.length; i++) {
    ems[i].style.color = "white"; // Replace "red" with the desired color
    spans[i].style.fontSize = "18px";
    }
    for (var i = 0; i < strongs.length; i++) {
    strongs[i].style.color = "white"; // Replace "red" with the desired color
    spans[i].style.fontSize = "18px";
    }
    function detailFunction(value) {
        var spans = document.getElementsByTagName("span");
        var ems = document.getElementsByTagName("em");
        var strongs = document.getElementsByTagName("strong");

        for (var i = 0; i < spans.length; i++) {
            spans[i].classList.toggle('blacktextcnvrtrdt');
        }
        for (var i = 0; i < ems.length; i++) {
            ems[i].classList.toggle('blacktextcnvrtrdt');
        }
        for (var i = 0; i < strongs.length; i++) {
            strongs[i].classList.toggle('blacktextcnvrtrdt');
        }
    }
</script>
<!-- Page Banner Section Ends Here -->
@endsection
