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
@endsection
@section('content')
<!-- Page Banner Section Starts Here -->
<section class="abtbsnss pad-top-40 bg-secblgs gvngblack" id="writewht1">
    <div class="container">
        <div class="block-element m-b-50 m-t-50">
            <h1 class="col-white m-b-50" id="writewhtbtn1">{{ $data->title }}</h1>
            <div class="blog-detail-image">
                <img class="nwwbbldtimg" src="{{ check_file($data->image) }}">
            </div>
            <div class="blog-detail-text text-light" style="text-align: justify;" id="writewhtbtn2">
                    {!!  $data->description  !!}
            </div>
        </div>
        
        <div class="block-element text-left m-t-40 m-b-40 wow fadeInUp" data-wow-delay="0.3s">
            <h3 class="title-text1" id="writewhtbtn3"> Relevant <span class="col-orange"> Blogs </span> </h3>
        </div>
        <div class="block-element">
            <div class="row">
                @foreach ($relevant_blogs as $blog)
                <div class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                            <div class="feature-boxes nwwbfeature-boxes ftr-bx" id="amzngwht3">
                                <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon" src="{{ check_file($blog->image) }}">
                                <p class="col-white pad-bot-20 p-l-20 p-r-20 blkchnpara"  id="prcngwht1b"><span class="blkchn">{{ $blog->category->name }} </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                                <h4 class="col-white p-l-20 p-r-20 font-size-20"  id="prcngwht1c"> {{ $blog->title }} </h4>
                                <p class="pad-bot-15 font-size-15 font-weight-lighter col-white p-l-20 p-r-20 lrm"  id="prcngwht1d">{{Str::limit($blog->description,150,$end='...')}} </p>
                                <a class= "hdrbtn hdrbtns m-b-20 m-l-25"  href="{{ route('web.blog.details',$blog->slug) }}" id="writewht1c"> Read more > </a>
                            </div>
                        </div>
                        <br class="onlymob">
                @endforeach

            </div>
        </div>
    </div>
</section>
<section>
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
    var spans = document.getElementsByTagName("span");
    var ems = document.getElementsByTagName("em");
    var strongs = document.getElementsByTagName("strong");

    for (var i = 0; i < spans.length; i++) {
    spans[i].style.color = "white"; // Replace "red" with the desired color
    }
    for (var i = 0; i < ems.length; i++) {
    ems[i].style.color = "white"; // Replace "red" with the desired color
    }
    for (var i = 0; i < strongs.length; i++) {
    strongs[i].style.color = "white"; // Replace "red" with the desired color
    }

</script>
<!-- Page Banner Section Ends Here -->
@endsection
