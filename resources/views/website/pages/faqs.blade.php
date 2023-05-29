@extends('layouts.web_main')
@section('content')
<!-- Page Banner Section Starts Here -->
<section class="page-banner-sec">
    <div class="container">
       <div class="page-banner-text wow fadeInUp" data-wow-delay="0.4s">
          <h3 class="col-white"> Got questions about <span class="col-orange"> easy.ai? </span> <br/> We've got answers.  </h3>
          <p> Our FAQ covers some of the most commonly asked questions about our service. If you can't find the answer to your question here, feel free to contact us. </p>
       </div>
    </div>
 </section>
 <!-- Page Banner Section Ends Here -->
 <!-- Faqs Content Starts Here -->
 <section class="pad-top-80 pad-bot-60 bg-sec1">
    <div class="container">
       <div class="block-element text-center m-b-50 wow fadeInUp" data-wow-delay="0.3s">
          <h3 class="title-text1"> Frequently <span class="col-orange"> Asked </span> Question  </h3>
       </div>
       <div class="block-element">
          <div id="accordion" class="myaccordion">
             <!-- Accordion 1 Starts Here -->
             <div class="card accordion-block wow fadeInUp" data-wow-delay="0.4s">
                <button class="d-flex align-items-center justify-content-between btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What is easy.ai?
                <span class="faq-icons">
                <img class="plus-icon" src="{{asset('front')}}/images/plus-icon.png">
                <img class="minus-icon" src="{{asset('front')}}/images/minus-icon.png">
                </span>
                </button>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                   <div class="card-body">
                      <p> easy.ai is free for small teams. For growing teams that need to track more vendors and contract renewals, easy.ai offers paid plans. </p>
                   </div>
                </div>
             </div>
             <!-- Accordion 1 Ends Here -->
             <!-- Accordion 2 Starts Here -->
             <div class="card accordion-block wow fadeInUp" data-wow-delay="0.5s">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                How can easy.ai help businesses save money?
                <span class="faq-icons">
                <img class="plus-icon" src="{{asset('front')}}/images/plus-icon.png">
                <img class="minus-icon" src="{{asset('front')}}/images/minus-icon.png">
                </span>
                </button>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                   <div class="card-body">
                      <p> easy.ai is free for small teams. For growing teams that need to track more vendors and contract renewals, easy.ai offers paid plans. </p>
                   </div>
                </div>
             </div>
             <!-- Accordion 2 Ends Here -->
             <!-- Accordion 3 Starts Here -->
            <div class="card accordion-block wow fadeInUp" data-wow-delay="0.6s">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Is easy.ai secure?
                <span class="faq-icons">
                <img class="plus-icon" src="{{asset('front')}}/images/plus-icon.png">
                <img class="minus-icon" src="{{asset('front')}}/images/minus-icon.png">
                </span>
                </button>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                   <div class="card-body">
                      <p> easy.ai is free for small teams. For growing teams that need to track more vendors and contract renewals, easy.ai offers paid plans. </p>
                   </div>
                </div>
             </div>
             <!-- Accordion 3 Starts Here -->
             <!-- Accordion 4 Starts Here -->
             <div class="card accordion-block wow fadeInUp" data-wow-delay="0.7s">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapseTwo">
                How can easy.ai help businesses save money?
                <span class="faq-icons">
                <img class="plus-icon" src="{{asset('front')}}/images/plus-icon.png">
                <img class="minus-icon" src="{{asset('front')}}/images/minus-icon.png">
                </span>
                </button>
                <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                   <div class="card-body">
                      <p> easy.ai is free for small teams. For growing teams that need to track more vendors and contract renewals, easy.ai offers paid plans. </p>
                   </div>
                </div>
             </div>
             <!-- Accordion 4 Ends Here -->
             <!-- Accordion 5 Starts Here -->
             <div class="card accordion-block wow fadeInUp" data-wow-delay="0.8s">
                <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapseThree">
                Is easy.ai secure?
                <span class="faq-icons">
                <img class="plus-icon" src="{{asset('front')}}/images/plus-icon.png">
                <img class="minus-icon" src="{{asset('front')}}/images/minus-icon.png">
                </span>
                </button>
                <div id="collapse5" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                   <div class="card-body">
                      <p> easy.ai is free for small teams. For growing teams that need to track more vendors and contract renewals, easy.ai offers paid plans. </p>
                   </div>
                </div>
             </div>
             <!-- Accordion 5 Starts Here -->
          </div>
       </div>
    </div>
 </section>
 <!-- Faqs Content Ends Here -->
@endsection
