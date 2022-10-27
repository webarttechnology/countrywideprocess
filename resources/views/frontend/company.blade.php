
<x-header-component />
 
 <section class="minbody">
     <div class="companypg">
         
         <div class="pgmincontent pt-4">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset($company[0]->image) }}"></div>
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="cmpnycontentbox wow bounceInDown" data-wow-delay=".6s">
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">Our Mission</h1>
                           
                            <p><?= htmlspecialchars_decode($company[0]->ourmission_details) ?></p>

                            <div class="text-center cmpnylogo py-5"><img src="{{ asset($company[0]->logo) }}" class="mt-5"></div>
                            
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>
<div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('services') }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url(/design/images/services-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">Services</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="{{ URL::to('services/'.$efile->slug_value) }}">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url(/design/images/e-fill-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">E-Filing</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<x-footer-component />