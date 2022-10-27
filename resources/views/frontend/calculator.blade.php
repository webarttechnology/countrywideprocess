<x-header-component />

<section class="minbody">
    <div class="pricingpg">
        
        <div class="pgmincontent pt-0">
            <div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('/design/images/pricing-img.jpg')}}"></div>
            <div class="container-fluid">
                <div class="row justify-content-end">
                    <div class="col-md-8">
                        <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}" class="text-secondary"><img src="{{ asset('/design/images/logo-icon.png') }}" width="40px"> Countrywide Process</a></li>
                                    <li class="breadcrumb-item"><a href="{{ URL::to('services') }}" class="text-secondary">Services</a></li>
                                    <li class="breadcrumb-item fw-bold"><a href="{{ URL::to('calculator') }}">Calculate Price</a></li>
                                </ol>
                            </nav>


                            
                            <div id="calcu" class="calculetorbox border shadow p-4 text-center mt-5">
                                <h1 class="display-6 fw-bold mt-0 py-0 mb-5">Pricing Calculator</h1>

                                <div class="row justify-content-between align-items-center">
                                    <div class="col-md-4">
                                        <div class="calcuoptn">
                                            <select id='selService' name="service_master_id" class="form-select" onchange="getItemName()">
                                                <option selected>Select Your Service</option>
                                                @foreach($service as $item)
                                                    <option value="{{ $item ->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="selItemBlock"></div>
                                           <div id="seljobsizeBlock"></div>
                                            <div id="selCourtBlock"></div>                                                                                     
                                            
                                            <button style="display:none" type="button" id="goButton" class="btn w-100 text-white text-uppercase" onclick="getPrice()">Go!</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h4>Starting at Price:</h4>
                                        <h1 class="display-4 fw-bold" id="priceList">$0.00</h1>
                                        <button type="button" class="btn w-100 text-white text-uppercase">Place Order</button>                                        
                                    </div>
                                  
                                </div>
                            </div>
                            @php  $serviceDtailsId = Session::forget('serviceId');  @endphp
                            <x-frontend.pricelist />
                            
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
            <div background-image-size="thumb" background-image="prevLink.imageItem" class="thumb ng-isolate-scope" style="background-image: url('/design/images/e-fill-menu-img.jpg'); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
            <strong>Previous</strong>
            <span class="ng-binding">E-Filing</span>
        </div>
        <div class="pointer"></div>
    </a>
</div>
<div class="content-main-arrow right ng-scope" ng-controller="ForwardNavigationCtrl" ng-show="nextLink">
    <a class="content-arrow-trigger"  href="{{ URL::to('testimonials') }}">
        <div class="info-wrapper">
            <div class="thumb ng-isolate-scope" style="background-image: url('/design/images/testimo-menu-img.jpg'); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
            <strong>Next</strong>
            <span class="ng-binding">Testimonial</span>
        </div>
        <div class="pointer"></div>
    </a>
</div>

<x-footer-component />
<script>

    function getItemName(){
       var service =$('#selService').val();
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price-zone/item') }}",
            data: {
                serviceId: service,
            },
            success: function(response){
                $('#selItemBlock').html(response);
            }
        });
    }

    function getpricezone(){
        var service =$('#selService').val();
        var item =$('#selItem').val();
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price-level/zone') }}",
            data: {
                serviceId: service,
                item_id:item
            },
            success: function(response){
                $('#seljobsizeBlock').html(response);
            }
       });
    }


    function getpricelevel(){
        var service =$('#selService').val();
        var item =$('#selItem').val();
        var zone =$('#seljobsize').val();
        $.ajax({
            type:"GET",
            url: "{{ URL::to('admin/price/level') }}",
            data: {
                serviceId: service,
                item_id:item,
                zone_id:zone
            },
            success: function(response){
                $("#goButton").show();
                $('#selCourtBlock').html(response);
            }
       });
    }


    function getPrice(){
        var service_id = $('#selService').val();
        var item = $('#selItem').val(); 
        var jobsize = $('#selCourt').val();
        var pzone = $('#seljobsize').val();
      //  alert(jobsize);
        $.ajax({
            type:"GET",
            url: "{{ URL::to('/calculator/price') }}",
            data: {
                serviceId: service_id,
                itemName: item,
                jobsize: jobsize,
                pzone: pzone
            },
            success: function(response){
                $('#priceList').html(response);
            }
       });
    }
</script>

