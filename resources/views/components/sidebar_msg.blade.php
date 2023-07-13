@if(session()->get('package-title-sidebar'))
<div class="nwsidebar-footer-top">
    <img src="{{asset('front')}}/assets/images/sft.svg" alt="" class="nwsdftimage">
    <h4 class="nwsdfttxt">{!! session()->get('package-title-sidebar') !!}</h4>
    <p class="nwsdfttxtsm">{!! session()->get('package-msg-sidebar') !!}</p>
    <a href="{{route('user.billing.all')}}" class="nwsdftbtn">View Details</a>
</div>
@endif
