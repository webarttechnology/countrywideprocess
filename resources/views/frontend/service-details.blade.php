
<x-header-component />
 @foreach($service as $key =>  $value)
    @if($value['slug_value'] == $slug_name)
    @php  $serviceDtailsId = Session::forget('serviceId');  @endphp
    @php Session::put('serviceId',$value->id) @endphp
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
                                     <li class="breadcrumb-item"><a href="{{ URL::to('/') }}" class="text-secondary"><img src="{{asset('/design/images/logo-icon.png')}}" width="40px"> Countrywide Process</a></li>
                                     <li class="breadcrumb-item"><a href="{{ URL::to('/services') }}" class="text-secondary">Services</a></li>
                                     <li class="breadcrumb-item fw-bold" style="color:blue">{{ $value->name }}</li>
                                 </ol>
                             </nav>
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">{{ $value->name }}</h1>
                            
                             <?= htmlspecialchars_decode($value->details) ?>
                             <div class="srvcntbox border shadow p-4 text-center mt-4">
                                 <p>To create your account and start {{ $value ->name}} today, <a href="{{ URL::to('register') }}" class="text-theme fw-bold">click here</a>. <br />Already have an account? <a href="{{ URL::to('login') }}" class="text-theme fw-bold">click here</a> to {{ $value -> name}} now.</p>

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

@if($key != 0)
<div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('services/'.$service[$key -1]->slug_value) }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url({{'/'.$service[$key-1] -> image}}); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">{{ $service[$key -1] -> name }}</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
@endif

@if($key < $max_length-1)
<div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="{{ url('services/'. $service[$key+1] -> slug_value)}}">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url({{'/'.$service[$key+1] -> image }}); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">{{ $service[$key+1] -> name }}</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
@endif
@endif
 @endforeach
<x-footer-component />