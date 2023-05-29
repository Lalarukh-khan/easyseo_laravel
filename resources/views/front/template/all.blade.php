@extends('layouts.front')
@section('after-css')
<style>
    .our-page-btn a {
        border-radius: 8px;
        background: #fff;
        margin: 0px 0px 10px 3px;
        padding: 5px 16px;
        box-shadow: none;
        font-size: 14px;
        font-weight: 800 !important;
        border: 2px solid #F47300;
    }

    .our-page-btn a:hover {
        box-shadow: 0px 5px 20px 0 rgb(0 0 0 / 10%);
        transition: all .4s ease;
    }


    .card-overlay {
        position: absolute !important;
        top: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 100% !important;
        border-radius: 12px !important;
        width: 100% !important;
        opacity: 0 !important;
        /* background-color: wheat !important; */
        transition: .5s ease !important;
    }

    .card:hover .card-overlay {
        opacity: 0.5 !important;
        display: block;
    }

    .card:hover {
        box-shadow: 0px 10px 25px 0 rgb(0 0 0 / 15%);
        transition: all .4s ease;
    }
</style>
@endsection
@section('content')
<!--breadcrumb-->
<!-- <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class='bx bx-home-alt'></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Templates</li>
            </ol>
        </nav>
    </div>
</div> -->
<!--end breadcrumb-->
@include('components.flash-message')
<form action="{{ route('user.template.search') }}">
    <div class="flex-grow-1 search-bar">
        <div class="input-group">
            <button class="btn btn-search nwbtn-search" type="button"><i class="lni lni-search-alt"></i></button>
            <input type="text" name="search" class="form-control" id="nwtempsearchbar" placeholder="What do you want to create?" />
        </div> 
    </div> 
</form>
<br>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="our-page-btn">
            <a href="javascript:;" class="template-category btn nwbg-primary text-light" data-id="all">All templates</a>
            @foreach ($categories as $cat)
            <a href="javascript:;" class="template-category btn" data-id="{{$cat->id}}">{{$cat->name}}</a>
            @endforeach
        </div>
    </div>
</div>
<br>

<div class="row response-row nwtmmainrow">
    @forelse ($categories as $cat)
    @if ($cat->templates()->count() > 0)

    <div class="row append_cat_{{$cat->id}}">
        <div class="col-lg-12 col-md-12 m-2">
            <h3 class="nwtmpcatname">{{$cat->name}} 
                {{-- <span class="nwtmpcatcount">{{$cat->templates()->count()}}</span> --}}
            </h3>
        </div>
        @foreach ($cat->templates as $k => $val)
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
            <a href="{{route('user.template.make',$val->hashid)}}">
                <!-- <div class="card checked nwcard" style="border-radius: 15px; min-height: 250px;"> -->
                <div class="card checked nwcard" >
                    {{-- <img src="{{check_file($val->icon,'user')}}" class="mt-4 ml-3 nwtempcatimg" width="50px" alt="template logo"
                        style="margin-left: 15px;"> --}}
                    <img src="{{asset($val->icon)}}" class="mt-4 ml-3 nwtempcatimg" width="50px" alt="template logo"
                        style="margin-left: 15px;">
                    <div class="card-body text-dark">
                        <h5 class="card-title nwcard-title">{{$val->name}}</h5>
                        <p class="card-text nwcard-text">{{Str::limit($val->description,150,$end='...')}}</p>
                    </div>
                </div>
            </a>
        </div>
        {{-- @if ($k == 3)
        <div class="col-md-12 col-lg-12">
            <a style="float: right;" class="load-more" href="javascript:;" data-id="{{$cat->id}}">Load
                More</a>
        </div>
        @break
        @endif --}}
        @endforeach
    </div>
    @endif

    @empty
    <div class="row mt-5 p-5">
        <div class="col-xl-12 col-lg-12 mb-4 col-md-12 col-sm-12 mt-5" style="padding: 6rem!important;">
            <center>
                <h4 class="text-dark">Templates Not Found</h4>
            </center>
        </div>
    </div>
    @endforelse
</div>
@endsection
@section('page-scripts')
<script>
    // load by click on category btn
    $('.template-category').click(function(e){
        e.preventDefault();
        if ($(this).hasClass('nwbg-primary') && $(this).hasClass('text-light')) return false

        var param = {'category':$(this).data('id')};
        $('.template-category').removeClass('nwbg-primary');
        $('.template-category').removeClass('text-light');

        $(this).addClass('nwbg-primary');
        $(this).addClass('text-light');

        getAjaxRequests("{{route('user.template.all')}}", param, 'get',true, function(res) {
            if (res.status) $('.response-row').html(res.res_view);
        });
    })

    // on click load more text
    $('body').on('click','.load-more',function(e){
        e.preventDefault();
        var catId = $(this).data('id');
        var param = {'category_id':catId};

        getAjaxRequests("{{route('user.template.load_more_by_cat')}}", param, 'get',true, function(res) {
            if (res.status) $('.append_cat_'+catId).html(res.res_view);
        });
    })
</script>
@endsection
