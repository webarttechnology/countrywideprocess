<x-header-component />
<section class="minbody">
    <div class="srvcpg">
        <div class="pgmincontent pt-4">
            <div class="container-fluid">
                <div class="row justify-content-center g-0">
                    @foreach($service as $item)
                        <div class="col-md-4">
                            <div class="srvcthumb border-end border-bottom clearfix wow fadeInUp" data-wow-delay=".4s">
                                <div class="image overflow-hidden">
                                    <a href="{{ URL::to('/services/'.$item->slug_value) }}"><img src="{{ asset($item->image) }}" class="w-100 h-100"></a>
                                    <div class="iconimg"><a href="{{ URL::to('/services/'.$item->slug_value) }}"><img src="{{ asset($item->logo) }}"></a></div>
                                </div>
                                <div class="content">
                                    <h4 class="text-uppercase"><a href="{{ URL::to('/services/'.$item->slug_value) }}" class="text-black">{{ $item ->name }}</a></h4>
                                    <div class="srvcbtns clearfix d-inline-block">
                                        <a href="{{ URL::to('/services/'.$item->slug_value) }}" class="readmorebtn"><span>Read More</span></a>
                                    </div>
                                    <div class="srvcbtns clearfix d-inline-block">
                                        <a href="{{ URL::to('calculator') }}" class="readmorebtn"><span>Pricing</span></a>
                                    </div>
                                    <div class="srvcbtns clearfix d-inline-block">
                                        <a href="#" class="readmorebtn"><span>Order Now</span></a>
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


<div class="content-main-arrow left ng-scope" ng-controller="BackwardNavigationCtrl" ng-show="prevLink">
    <a class="content-arrow-trigger" href="{{ URL::to('/') }}">
        <div class="info-wrapper">
            <div background-image-size="thumb" background-image="prevLink.imageItem" class="thumb ng-isolate-scope" style="background-image: url(/design/images/bg1.jpg); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
            <strong>Previous</strong>
            <span class="ng-binding">Home</span>
        </div>
        <div class="pointer"></div>
    </a>
</div>
<div class="content-main-arrow right ng-scope" ng-controller="ForwardNavigationCtrl" ng-show="nextLink">
    <a class="content-arrow-trigger"  href="{{ URL::to('company') }}">
        <div class="info-wrapper">
        <div class="thumb ng-isolate-scope" style="background-image: url(/design/images/company-menu-img.jpg); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
            <strong>Next</strong>
            <span class="ng-binding">Company</span>
        </div>
        <div class="pointer"></div>
    </a>
</div>


<x-footer-component />