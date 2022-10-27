<x-header-component />
<section class="minbody pymntbody">
    <div class="pricingpg progresspg">
        <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
        <div class="pgmincontent pt-5">
            <div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/step-bg.jpg') }}"></div>
            <div class="container-fluid">
                <div class="row justify-content-end align-items-center">
                    <div class="col-md-12 col-lg-8">
                        <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                            <div class="row justify-content-center align-content-center">
                                <div class="col-md-9">
                                    <div class="thnkyoubx text-center">
                                        <h3 class="text-capitalize fs-3 fw-bold-600 mb-3">Thank you for shopping with us</h3>
                                        <p class="mb-3">your order with <span class="fw-bold-600 text-theme-red">Transaction Id: {{ $tranjuctionId }}</span> has been placed succesfully.</p>
                                        <div class="btnsec">
                                            <a href="{{ url('/') }}" class="btn btn-primary d-block fs-5 fw-bold text-center text-uppercase w-100 mt-3">Back to Home</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer-component />
    <script type="text/javascript">
    var totalSteps = $(".steps li").length;
    $(".submit").on("click", function(){
    return false;
    });
    $(".steps li:nth-of-type(1)").addClass("active");
    $(".myContainer .form-container:nth-of-type(1)").addClass("active");
    $(".form-container").on("click", ".next", function() {
    $(".steps li").eq($(this).parents(".form-container").index() + 1).addClass("active");
    $(this).parents(".form-container").removeClass("active").next().addClass("active flipInX");
    });
    $(".form-container").on("click", ".back", function() {
    $(".steps li").eq($(this).parents(".form-container").index() - totalSteps).removeClass("active");
    $(this).parents(".form-container").removeClass("active flipInX").prev().addClass("active flipInY");
    });
    /*=========================================================
    *     If you won't to make steps clickable, Please comment below code
    =================================================================*/
    $(".steps li").on("click", function() {
    var stepVal = $(this).find("span").text();
    $(this).prevAll().addClass("active");
    $(this).addClass("active");
    $(this).nextAll().removeClass("active");
    $(".myContainer .form-container").removeClass("active flipInX");
    $(".myContainer .form-container:nth-of-type("+ stepVal +")").addClass("active flipInX");
    });
    </script>