<x-header-component />
<section class="minbody">
    <div class="pricingpg">
        
        <div class="pgmincontent pt-0">
            <div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('/design/images/pricing-img.jpg') }}"></div>
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}" class="text-secondary"><img src="{{ asset('/design/images/logo-icon.png') }}" width="40px"> Countrywide Process</a></li>
                                    <li class="breadcrumb-item"><a href="{{ URL::to('/services') }}" class="text-secondary">Services</a></li>
                                    <li class="breadcrumb-item fw-bold"><a href="{{ URL::to('/calculator') }}">Calculate Price</a></li>
                                </ol>
                            </nav>
                            <div class="accordion" id="accordionExample">
                            @php  $serviceDtailsId = Session::get('serviceId')  @endphp
                           
                                @foreach($service as $item)
                                    
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $loop -> index + 1 }}">
                                    <a class="{{ $item ->id ==$serviceDtailsId?'accordion-button':'accordion-button collapsed' }} " data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop -> index + 1 }}" aria-expanded="{{ $item ->id ==$serviceDtailsId?'true':'false' }}" aria-controls="collapse{{ $loop -> index + 1 }}">{{$item->name }}</a>
                                    </h2>
                                    <div id="collapse{{ $loop -> index + 1 }}" class="{{ $item ->id ==$serviceDtailsId?'accordion-collapse collapse show':'accordion-collapse collapse' }} " aria-labelledby="heading0" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Pricing Item</th>
                                                            <th>Pricing Zone</th>
                                                            <th>Pricing level</th>
                                                            <th>Amount</th>                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($price as $amount)
                                                          @if($amount -> service_master_id == $item -> id)
                                                            <tr>
                                                                <td>{{ $amount ->priceitem -> name }}</td>
                                                                <td>{{ $amount ->pricezone -> name }}</td>
                                                                <td>{{ $amount ->pricelevel -> name }}</td>
                                                                <td>{{ "$".number_format($amount ->amount, 2) }}</td>
                                                            </tr>
                                                           @endif
                                                        @endforeach
                                                      
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>


                           
<div class="content-main-arrow left ng-scope" ng-controller="BackwardNavigationCtrl" ng-show="prevLink">
    <a class="content-arrow-trigger" href="{{ URL::to('services/'.$efile->slug_value) }}">
        <div class="info-wrapper">
            <div background-image-size="thumb" background-image="prevLink.imageItem" class="thumb ng-isolate-scope" style="background-image: url(/design/images/e-fill-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
            <strong>Previous</strong>
            <span class="ng-binding">E-Filing</span>
        </div>
        <div class="pointer"></div>
    </a>
</div>
<div class="content-main-arrow right ng-scope" ng-controller="ForwardNavigationCtrl" ng-show="nextLink">
    <a class="content-arrow-trigger"  href="{{ URL::to('testimonials') }}">
        <div class="info-wrapper">
            <div class="thumb ng-isolate-scope" style="background-image: url(design/images/testimo-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
            <strong>Next</strong>
            <span class="ng-binding">Testimonial</span>
        </div>
        <div class="pointer"></div>
    </a>
</div>


<x-footer-component />