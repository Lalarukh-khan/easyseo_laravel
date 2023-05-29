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

<div class="card nwhlcard overflow-hidden">
                <!-- Help Center Header -->
                <div class="help-center-header d-flex flex-column justify-content-center align-items-center">
                  <h3 class="text-center">Hello, how can we help?</h3>
                  <div class="input-wrapper my-3 input-group input-group-merge">
                    <span class="input-group-text nwinput-group-text" id="basic-addon1" 
                      ><i class="bx bx-search-alt bx-xs text-muted"></i
                    ></span>
                    <input style="border-left: 0px solid #fff important; font-size: 18px;"
                      type="text"
                      class="form-control form-control-lg"
                      placeholder="Find anything (features, payment or reset password)"
                      aria-label="Search"
                      aria-describedby="basic-addon1"
                    />
                  </div>
                  <p class="text-center px-3 mb-0 nwhltext-center">Common troubleshooting topics: eCommerce, Blogging to payment</p>
                </div>
                <!-- /Help Center Header -->

                <!-- Popular Articles -->
                <div class="help-center-popular-articles py-5">
                  <div class="container-xl">
                    <h4 class="text-center mt-2 mb-4 nwhlpplrarticals">Popular Articles</h4>
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="row mb-3">
                          <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card border">
                              <div class="card-body text-center">
                                <img
                                  class="mb-3"
                                  src="{{asset('admin_assets')}}/assets/images/rocket.png"
                                  height="60"
                                  alt="Help center articles"
                                />
                                <h5 class="nwhlpplrarticals">Getting Started</h5>
                                <p style="color: grey !important; font-size: 16px;">Whether you're new or you're a power user, this article will…</p>
                                <a class="btn btn-label-primary" href="#">Read More</a>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4 mb-md-0 mb-4">
                            <div class="card border">
                              <div class="card-body text-center">
                                <img
                                  class="mb-3"
                                  src="{{asset('admin_assets')}}/assets/images/cube.png"
                                  height="60"
                                  alt="Help center articles"
                                />
                                <h5 class="nwhlpplrarticals">First Steps</h5>
                                <p style="color: grey !important; font-size: 16px;">Are you a new customer wondering how to get started?</p>
                                <a class="btn btn-label-primary" href="#">Read More</a>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="card border">
                              <div class="card-body text-center">
                                <img
                                  class="mb-3"
                                  src="{{asset('admin_assets')}}/assets/images/desktop.png"
                                  height="60"
                                  alt="Help center articles"
                                />
                                <h5 class="nwhlpplrarticals">Add External Content</h5>
                                <p style="color: grey !important; font-size: 16px;">This article will show you how to expand the functionality of...</p>
                                <a class="btn btn-label-primary" href="#">Read More</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Popular Articles -->

                <!-- Knowledge Base -->
                <div class="help-center-knowledge-base py-5">
                  <div class="container-xl">
                    <h4 class="text-center mb-4 nwhlpplrarticals">Knowledge Base</h4>
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="row">
                          <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                  <span class="badge bg-label-success p-2 rounded me-2"
                                    ><i class="bx bx-cart bx-sm"></i
                                  ></span>
                                  <h5 class="fw-semibold mt-3 ms-1 nwhlpplrarticals">eCommerce</h5>
                                </div>
                                <ul>
                                  <li class="text-primary nwhltext-primary py-1">
                                    <a href="./pages-help-center-categories.html">Pricing Wizard</a>
                                  </li>
                                  <li class="text-primary nwhltext-primary pb-1">
                                    <a href="./pages-help-center-categories.html">Square Sync</a>
                                  </li>
                                </ul>
                                <p class="mb-0 fw-semibold nwhltext-primary">
                                  <a href="javascript:void(0);">56 articles</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                  <span class="badge bg-label-info p-2 rounded me-2"
                                    ><i class="bx bx-laptop bx-sm"></i
                                  ></span>
                                  <h5 class="fw-semibold mt-3 ms-1 nwhlpplrarticals">Building Your Website</h5>
                                </div>
                                <ul>
                                  <li class="text-primary py-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">First Steps</a>
                                  </li>
                                  <li class="text-primary pb-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Add Images</a>
                                  </li>
                                </ul>
                                <p class="mb-0 fw-semibold nwhltext-primary">
                                  <a href="javascript:void(0);">111 articles</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                  <span class="badge bg-label-primary p-2 rounded me-2"
                                    ><i class="bx bx-user bx-sm"></i
                                  ></span>
                                  <h5 class="fw-semibold mt-3 ms-1 nwhlpplrarticals">Your Account</h5>
                                </div>
                                <ul>
                                  <li class="text-primary py-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Insights</a>
                                  </li>
                                  <li class="text-primary pb-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Manage Your Orders</a>
                                  </li>
                                </ul>
                                <p class="mb-0 fw-semibold nwhltext-primary">
                                  <a href="javascript:void(0);">29 articles</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                  <span class="badge bg-label-danger p-2 rounded me-2"
                                    ><i class="bx bx-world bx-sm"></i
                                  ></span>
                                  <h5 class="fw-semibold mt-3 ms-1 nwhlpplrarticals">Domains and Email</h5>
                                </div>
                                <ul>
                                  <li class="text-primary py-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Access to Admin Account</a>
                                  </li>
                                  <li class="text-primary pb-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Send Email From an Alias</a>
                                  </li>
                                </ul>
                                <p class="mb-0 fw-semibold nwhltext-primary">
                                  <a href="javascript:void(0);">22 articles</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                  <span class="badge bg-label-warning p-2 rounded me-2"
                                    ><i class="bx bx-mobile-alt bx-sm"></i
                                  ></span>
                                  <h5 class="fw-semibold mt-3 ms-1 nwhlpplrarticals">Mobile Apps</h5>
                                </div>
                                <ul>
                                  <li class="text-primary py-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Getting Started with the App</a>
                                  </li>
                                  <li class="text-primary pb-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Getting Started with Android</a>
                                  </li>
                                </ul>
                                <p class="mb-0 fw-semibold nwhltext-primary">
                                  <a href="javascript:void(0);">24 articles</a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 mb-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="d-flex align-items-center mb-2">
                                  <span class="badge bg-label-secondary p-2 rounded me-2"
                                    ><i class="bx bx-envelope bx-sm"></i
                                  ></span>
                                  <h5 class="fw-semibold mt-3 ms-1 nwhlpplrarticals">Email Marketing</h5>
                                </div>
                                <ul>
                                  <li class="text-primary py-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">Getting Started</a>
                                  </li>
                                  <li class="text-primary pb-1 nwhltext-primary">
                                    <a href="./pages-help-center-categories.html">How does this work?</a>
                                  </li>
                                </ul>
                                <p class="mb-0 fw-semibold nwhltext-primary">
                                  <a href="javascript:void(0);">27 articles</a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Knowledge Base -->

                <!-- Keep Learning -->
                <div class="help-center-keep-learning py-5">
                  <div class="container-xl">
                    <h4 class="text-center mb-5 nwhlpplrarticals">Keep Learning</h4>
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="row">
                          <div class="col-md-4 mb-md-0 mb-4 text-center">
                            <img
                              src="{{asset('admin_assets')}}/assets/images/laptop.png"
                              class="mb-2"
                              height="50"
                              alt="Help center blog"
                            />
                            <h5 class="my-3 nwhlpplrarticals">Blogging</h5>
                            <p class="mb-1" style="color: grey !important; font-size: 16px;">
                              Expert tips and tools to improve your website or online store using our blog.
                            </p>
                            <a
                              href="./pages-help-center-categories.html"
                              class="d-flex align-items-center justify-content-center mt-2"
                            >
                              <span class="align-middle me-1 nwhllearnmore">Learn More</span>
                              <i class="bx bx-right-arrow-circle scaleX-n1-rtl nwhllearnmore"></i>
                            </a>
                          </div>
                          <div class="col-md-4 mb-md-0 mb-4 text-center">
                            <img
                              src="{{asset('admin_assets')}}/assets/images/bulb.png"
                              class="mb-2"
                              height="50"
                              alt="Help center inspiration"
                            />
                            <h5 class="my-3 nwhlpplrarticals">Inspiration Center</h5>
                            <p class="mb-1" style="color: grey !important; font-size: 16px;">Inspiration from experts to help you start and grow your big ideas.</p>
                            <a
                              href="./pages-help-center-categories.html"
                              class="d-flex align-items-center justify-content-center mt-2"
                            >
                              <span class="align-middle me-1 nwhllearnmore">Learn More</span>
                              <i class="bx bx-right-arrow-circle scaleX-n1-rtl nwhllearnmore"></i
                            ></a>
                          </div>
                          <div class="col-md-4 text-center">
                            <img
                              src="{{asset('admin_assets')}}/assets/images/community.png"
                              class="mb-2"
                              height="50"
                              alt="Help center inspiration"
                            />
                            <h5 class="my-3 nwhlpplrarticals">Community</h5>
                            <p class="mb-1" style="color: grey !important; font-size: 16px;">A group of people living in the same place or having a particular.</p>
                            <a
                              href="./pages-help-center-categories.html"
                              class="d-flex align-items-center justify-content-center mt-2"
                            >
                              <span class="align-middle me-1 nwhllearnmore">Learn More</span>
                              <i class="bx bx-right-arrow-circle scaleX-n1-rtl nwhllearnmore nwhllearnmore"></i
                            ></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Keep Learning -->

                <!-- Help Area -->
                <div class="help-center-contact-us help-center-bg-alt">
                  <div class="container-xl">
                    <div class="row justify-content-center py-5 my-3">
                      <div class="col-md-8 col-lg-6 text-center">
                        <h4 class="nwhlpplrarticals">Still need help?</h4>
                        <p class="mb-4"  style="color: grey !important; font-size: 16px;">
                          Our specialists are always happy to help. Contact <br />
                          us during standard business hours or email us 24/7
                          <br />
                          and we'll get back to you.
                        </p>
                        <div class="d-flex justify-content-center flex-wrap gap-4">
                          <a href="javascript:void(0);" class="btn btn-label-primary">Visit our community</a>
                          <a href="javascript:void(0);" class="btn btn-label-primary">Contact us</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Help Area -->
              </div>

@endsection
@section('page-scripts')
<script>
    // new PerfectScrollbar('.chat-content');
</script>
@endsection
