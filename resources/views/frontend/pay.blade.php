<x-header-component />
<section class="minbody">
    <div class="pricingpg progresspg">
        <!--  <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="images/contact-us-banner.jpg"></div> -->
        <div class="pgmincontent pt-0 pymntfrm">
            <div class="priceimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset('design/images/step-bg.jpg') }}"></div>
            <div class="container-fluid">
                <div class="row justify-content-end align-items-center">
                    <div class="col-md-12 col-lg-8">
                        <div class="contentbox pb-5 px-3 wow bounceInDown" data-wow-delay=".6s">
                            <h5 class="mb-4 text-center text-capitalize fs-3">Complete your payment</h5>
                            <span id="error_msg" class="text-danger"></span>
                            <form action="{{ URL::to('pay') }}" method="post" onsubmit=" return valid(); ">
                             @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2" id="fname" name="fname" placeholder="First Name">
                                <input type="hidden" name="record_id" id="record_id" value="{{ $record_id }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2" id="lname" name="lname" placeholder="Last Name">
                            </div>
                            <div class="col-md-12">
                                 <input type="text" class="form-control mb-3" id="company" name="company" placeholder="Company">
                            </div>
                            <div class="col-md-12">
                                 <input type="email" class="form-control mb-3" id="email_id" name="email_id" placeholder="Email ID">
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control mb-2" id="address" name="address" placeholder="Address">
                            </div>
                            
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2" id="city" name="city" placeholder="City">
                            </div>
                            
                            <div class="col-md-6">
                            <input type="text" class="form-control mb-2" id="country" name="country" placeholder="Country" Value="USA">
                            </div>
                            <div class="col-md-4">
                            <input type="text" class="form-control mb-2" id="state" name="state" placeholder="State">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control mb-2" id="pincode" name="pincode" placeholder="ZIP Code">
                            </div>    
                            <div class="col-md-4">
                            <input type="number" class="form-control mb-2" name="amount" id="amount" value="{{ $amount }}.00" readonly >
                            </div>   
                                          

                             <div class="col-md-4">
                                 <input type="text" class="form-control mb-3" id="cardnumber" name="cardnumber" onkeypress="vaildcardnumber()" placeholder="Card number">
                                 <span id="card_error" style="color:red;"></span>
                            </div>


                             <div class="col-md-3">
                                 <select class="form-select mb-2" type="number" name="expiry_month" id="expiry_month">
                                    <option disabled="">Expiry Month</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            </div>
                             <div class="col-md-3">
                                 <select class="form-select mb-2" type="number" name="expiry_year" id="expiry_year">
                                    <option disabled="">Expiry year</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                    <option>2032</option>
                                    <option>2033</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                 <input type="text" class="form-control mb-3" id="csv_code" name="csv_code" placeholder="CSV Code">
                            </div>
                                                        <div class="col-md-12">
                                <input type="submit" class="btn btn-primary d-block fs-5 fw-bold text-center text-uppercase w-100 mt-3" value="Send Request">
                            </div>
                         
                        </div>
                    </form>
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



function valid(){
    if($("#fname").val() == ''){
            $("#error_msg").html("Fast Name must be required!");
            $("#fname").focus();
            return false;
        }else if($("#lname").val() == ''){
            $("#error_msg").html("Last Name must be required!");
            $("#lname").focus();
            return false;
        }else if($("#company").val() == ''){
            $("#error_msg").html("Company Name must be required!");
            $("#company").focus();
            return false;
        }else if($("#email_id").val() == ''){
            $("#error_msg").html("Email Id must be required!");
            $("#email_id").focus();
            return false;
        }else if($("#address").val() == ''){           
            $("#error_msg").html("Address must be required!");
            $("#address").focus();
            return false;           
        }else if($("#city").val() == ''){          
           $("#error_msg").html("City must be required!");
           $("#city").focus();
           return false;     
        }else if($("#country").val() == ''){
            $("#error_msg").html("Country must be required!");
            $("#country").focus();
            return false;
        }else if($("#state").val() == ''){
            $("#error_msg").html("State must be required!");
            $("#state").focus();
            return false;
        }else if($("#pincode").val() == ''){
            $("#error_msg").html("Pincode must be required!");
            $("#pincode").focus();
            return false;
        }else if($("#cardnumber").val() == ''){
            $("#error_msg").html("Card Number must be required!");
            $("#cardnumber").focus();
            return false;
        }else if($("#expiry_month").val() == ''){
            $("#error_msg").html("Card Expiry Month must be required!");
            $("#expiry_month").focus();
            return false;
        }else if($("#expiry_year").val() == ''){
            $("#error_msg").html("Card Expiry Year must be required!");
            $("#expiry_year").focus();
            return false;
        }else if(isNaN($('#cardnumber').val()) ){
            $('#card_error').html("Card Number must be a Number");
            return false;
        }else if(($('#cardnumber').val().length != 16) ){
            $('#card_error').html("Card Number must be 16 digit");
            $("#cardnumber").focus();
            return false;
        }else if($("#csv_code").val() == ''){
            $("#error_msg").html("CSV Code must be required!");
            $("#csv_code").focus();
            return false;
        }
}

function vaildcardnumber(){
  
    cardno =$('#cardnumber').val();
     // alert('ok');
    if(isNaN(cardno) ){
        $('#card_error').html("Card Number must be a string");
        return false;
    }
}
</script>