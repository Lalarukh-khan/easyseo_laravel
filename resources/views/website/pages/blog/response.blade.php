            <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="col-md-6 col-lg-4 col-sm-6 col-12 p-l-20 p-r-20 m-b-20 engn">
                            <div class="feature-boxes nwwbfeature-boxes ftr-bx" id="amzngwht3">
                                <img class="pad-bot-20 blkchnimg nwwbblkchnimg" alt="Icon" src="{{ check_file($blog->image) }}">
                                <p class="pad-bot-20 p-l-20 p-r-20 blkchnpara"  id="prcngwht1b"><span class="blkchn">{{ $blog->category->name }} </span>&nbsp; &nbsp; &nbsp; 5 min read</p>
                                <a class="p-l-20 p-r-20 font-size-20 nwacolc" id="prcngwht1c"  href="{{ route('web.blog.details',$blog->slug) }}"> {{ $blog->title }} </a>
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