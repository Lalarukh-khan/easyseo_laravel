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
            <div class="card checked nwcard">
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
