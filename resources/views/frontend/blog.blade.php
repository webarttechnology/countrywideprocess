
<x-header-component />
 
 <section class="minbody">
     <div class="blogpg">
        <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
         <div class="pgmincontent pt-4 px-3 pb-0">
             <div class="container-fluid">
                 <div class="row justify-content-center">
                     @foreach($blog as $item)
                        <div class="col-md-3">
                            <div class="blogthumb">
                                <div class="image"><img src="{{ asset($item->image) }}"></div>
                                <div class="content">
                                    <h4 class="text-uppercase"><a href="{{ URL::to('/blog/'.$item->slug_value) }}" class="text-black">{{ $item->name }}</a></h4>
                                    <div class="srvcbtns clearfix d-inline-block">
                                        <a href="{{ URL::to('/blog/'.$item->slug_value) }}" class="readmorebtn"><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach
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