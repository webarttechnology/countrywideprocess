
<x-header-component />
 
 <section class="minbody">
     <div class="testimopg">
         <div class="testimonialimg wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/testimonial-img.jpg') }}"></div>
         <div class="pgmincontent pt-4">
             <div class="container">
                 <div class="row justify-content-start">
                     <div class="col-md-6">
                         <div class="contentbox pb-5 wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Testimonials</h1>
                             @foreach($testimonials as $item)
                                <div class="testimo border-bottom mb-3 py-2 ps-5">
                                    <p><?= htmlspecialchars_decode($item->details) ?></p>
                                    <h5><i class="icofont-pen-alt-2 pe-2 text-theme"></i> {{ $item->author_name }}</h5>
                                </div>
                             @endforeach
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>
<div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('pricing') }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url(/design/images/procing-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">Pricing</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="{{ URL::to('agent') }}">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url(/design/images/agents-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">Agents</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<x-footer-component />