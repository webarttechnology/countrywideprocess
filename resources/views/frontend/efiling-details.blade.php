
<x-header-component />
    <section class="minbody">
     <div class="efilingpg">
         
        <div class="pgmincontent pt-4">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset($value->image) }}"></div>
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="contentbox wow bounceInDown" data-wow-delay=".6s">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="index.php" class="text-secondary"><img src="{{asset('/design/images/logo-icon.png')}}" width="40px"> Countrywide Process</a></li>
                                     <li class="breadcrumb-item"><a href="services.php" class="text-secondary">Blog</a></li>
                                     <li class="breadcrumb-item fw-bold"><a href="pricing.php">{{ $value->name }}</a></li>
                                 </ol>
                             </nav>
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">{{ $value->name }}</h1>
                            
                             <?= htmlspecialchars_decode($value->details) ?>
                             <div class="srvcntbox border shadow p-4 text-center mt-4">
                                 <p>To create your account and start {{ $value->name }} today, <a href="#" class="text-theme fw-bold">click here</a>. <br />Already have an account? <a href="#" class="text-theme fw-bold">click here</a> to {{ $value->name}} now.</p>

                                 <p class="fw-bold">Or</p>

                                 <p><b>Contact us directly with your question :</b><br />
                                 <?= htmlspecialchars_decode($company[0]->	address) ?>
                                 <b>Email:</b> {{ $company[0] ->email_id }}<br />
                                 <b>Phone:</b> {{ $company[0]->mobile_no }}</p>
                             </div>
                             <x-frontend.pricelist />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>


 <div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('agent') }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url(/design/images/agents-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">Agents</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="{{ URL::to('contact-us') }}">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url(/design/images/company-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">Contact Us</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
<x-footer-component />